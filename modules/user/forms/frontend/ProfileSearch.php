<?php


namespace app\modules\user\forms\frontend;


use app\modules\admin\rbac\Rbac;
use app\modules\user\models\User;
use app\modules\user\Module;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProfileSearch extends Model
{
    public $id;
    public $username;
    public $email;
    public $status;
    public $role;
    public $date_from;
    public $date_to;

    public $services;
    public $regions;
    public $service_areas;

//    public $zip;
//    public $address;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['username', 'email', 'role'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => Module::t('module', 'USER_CREATED'),
            'updated_at' => Module::t('module', 'USER_UPDATED'),
            'username' => Module::t('module', 'USER_USERNAME'),
            'email' => Module::t('module', 'USER_EMAIL'),
            'status' => Module::t('module', 'USER_STATUS'),
            'date_from' => Module::t('module', 'USER_DATE_FROM'),
            'date_to' => Module::t('module', 'USER_DATE_TO'),
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }


        $query->innerJoin('user_profile','user.id = user_profile.id');


        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'role' => $this->role,
        ]);

        $query
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['>=', 'created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }

    /**
     * @param null $id
     * @param null $status
     * @param null $region_ids
     * @param null $service_ids
     * @param null $service_area_ids
     * @return array|\yii\db\DataReader
     * @throws \yii\db\Exception
     */
    public static function getProfileList($id=null, $region_ids=null,$service_ids=null, $service_area_ids=null)
    {
        $id = ( $id==0 || $id == '' ? null : $id);
        $region_ids = ( $region_ids==0 || $region_ids == '' ? null : $region_ids);
        $service_area_ids = ( $service_area_ids==0 || $service_area_ids == '' ? null : $service_area_ids);
        $service_ids = ( $service_ids==0 || $service_ids == '' ? null : $service_ids);
        $status = User::STATUS_ACTIVE;
        $all_role = 0;

        if(Yii::$app->user->can(Rbac::PERMISSION_ADMIN_PANEL)){
            $all_role = 1;
            $status = null;
        }

         $sql = sprintf("call sp_search_profile('%s', %d, %d, '%s', '%s', '%s' ,%d );"
             , Yii::$app->language,$id, $status,$region_ids,$service_ids,$service_area_ids , $all_role);

        $command=Yii::$app->db->createCommand($sql);
         return  $command->queryAll();

    }


    public static function getProfile($id=null, $region_ids=null,$service_ids=null, $service_area_ids=null)
    {
        $id = ( $id==0 || $id == '' ? null : $id);
        $region_ids = ( $region_ids==0 || $region_ids == '' ? null : $region_ids);
        $service_area_ids = ( $service_area_ids==0 || $service_area_ids == '' ? null : $service_area_ids);
        $service_ids = ( $service_ids==0 || $service_ids == '' ? null : $service_ids);
        $status = User::STATUS_ACTIVE;
        $all_role = 0;

        if(Yii::$app->user->can(Rbac::PERMISSION_ADMIN_PANEL)){
            $all_role = 1;
            $status = null;
        }

        $sql = sprintf("call sp_search_profile('%s', %d, %d, '%s', '%s', '%s' ,%d );"
            , Yii::$app->language,$id, $status,$region_ids,$service_ids,$service_area_ids , $all_role);

        $command=Yii::$app->db->createCommand($sql);
        $profile =  $command->queryOne();
        if(!$profile )
             Yii::$app->user->getProfile();

        $profile =  $command->queryOne();

        return $profile;

    }


    public static function getFavoriteProfileList()
    {
        $sql = sprintf("call sp_favorite_profile('%s', %d);"
            , Yii::$app->language,Yii::$app->user->id);

        $command=Yii::$app->db->createCommand($sql);
        return  $command->queryAll();

    }
}