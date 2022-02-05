<?php

namespace app\modules\guid\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service_item".
 *
 * @property int $id
 * @property string $name
 * @property int|null $service_id
 * @property string|null $note
 *
 * @property ServiceArea $serviceArea
 */
class Service extends \yii\db\ActiveRecord
{

    public  $service_area;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','service_area_id'], 'required'],
            [['service_area_id'], 'integer'],
            [['note'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['name'], 'unique'],
            [['service_area_id'], 'exist', 'skipOnError' => true
                , 'targetClass' => ServiceArea::className(), 'targetAttribute' => ['service_area_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'service_area_id' => Yii::t('app', 'Service Area'),
            'note' => Yii::t('app', 'Note'),
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceArea()
    {
        return $this->hasOne(ServiceArea::className(), ['id' => 'service_area_id']);
    }

    /* Геттер для названия service */
    public function getServiceAreaName() {
        return $this->serviceArea->name;
    }

    public static function getServiceList($limit = null)
    {
        $query = Service::find();
        $query = $query->leftJoin('service_lang',"service_lang.id=service.id and lang = '".substr(Yii::$app->language,0,2)."'")

            ->select(["service.id"," coalesce(`service_lang`.`name`,`service`.`name` ) as `name`"]);
        if($limit)
            $query = $query->limit($limit);
        return ArrayHelper::map($query ->all(), 'id', 'name');
    }

    public static function getServiceListWithCount($limit = null)
    {
      //  $query = Service::find();
//        $query = $query->leftJoin('service_lang',"service_lang.id=service.id and lang = '".substr(Yii::$app->language,0,2)."'")
//            ->leftJoin('user_service',"user_service.service_id = service.id")
//            ->leftJoin('user',"user_service.user_id = user.id")
//            ->where("user.id > 1"  )
//            ->groupBy(["service.id", "coalesce(`service_lang`.`name`,`service`.`name` )"])
//            ->orderBy("count(distinct user_service.id) desc")
//            ->select(["service.id"," concat(coalesce(`service_lang`.`name`,`service`.`name` ), ' (' , count(distinct user_service.id), ')' ) as `name`"]);

        $sql = "SELECT `service`.`id`,  concat(coalesce(`service_lang`.`name`,`service`.`name` )
                , ' (' , count(distinct user_service.id), ')' ) as `name_cnt` 
                , count(distinct user_service.id) as  `cnt` 
                , coalesce(`service_lang`.`name`,`service`.`name` ) as `name`
                , `service`.photo
                FROM `user_service`
                inner JOIN `service` ON user_service.service_id = service.id 
                inner JOIN `user` ON user_service.user_id = user.id 
                LEFT JOIN `service_lang` ON service_lang.id=service.id and lang = 'ru' 
                WHERE user.id > 1 and user.status = 1
                GROUP BY `service`.`id`, coalesce(`service_lang`.`name`,`service`.`name` ) 
                ORDER BY count(distinct user_service.id) DESC; ";
        if($limit) {
          //  $query = $query->limit($limit);
            $sql .= ' LIMIT '.$limit;
        }
        $sql .= ";";

        return self::findBySql($sql)->asArray()->all();

       // return ArrayHelper::map($query ->all(), 'id', 'name');
        //return ArrayHelper::map(self::findBySql($sql)->all(), 'id', 'name');
    }
}
