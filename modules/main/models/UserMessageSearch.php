<?php


namespace app\modules\main\models;

use app\modules\user\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "user_messages".
 *
 * @property int $id
 * @property int $user_id_from
 * @property int $user_id_to
 * @property int $created_at
 * @property int $checked_at
 * @property int $status status of moderation, (0-new,1-aproved,2-declined)
 * @property string $admin_comment admin_comment  of moderation
 * @property int $is_review
// * @property int $user_name_from
// * @property int $user_name_to
 * @property User $userIdTo
 * @property User $userIdFrom
 */
class UserMessageSearch extends Model
{
    public $id;
    public  $user_id_from;
    public  $user_id_to;
    public  $is_review;
//    public  $user_name_from;
//    public  $user_name_to;
    public  $created_at;
    public  $checked_at;
    public  $status;  // status of moderation, (0-new,1-aproved,2-declined)
    public  $admin_comment; //admin_comment  of moderation
    public  $message; //admin_comment  of moderation
    public $date_from;
    public $date_to;
    public $date_from_chk;
    public $date_to_chk;


   /*
     виды переписок:
   1. admin видит все  по польхователю
   2. user_id_to видит от всех  кто ему писал
   3. userIdFrom  видит переиску с конкретным специалистом

    */

    public function rules()
    {
        return [
            [['id', 'status','user_id_from','user_id_to', 'is_review'], 'integer'],
//            [['user_name_from','user_name_to'] , 'string'],
            [['message', 'admin_comment', 'state', 'is_review'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d H:i'],
        ];
    }


   public function search($params){
       $query = UserMessages::find();

       $dataProvider = new ActiveDataProvider([
           'query' => $query,
           'sort' => [
               'defaultOrder' => ['id' => SORT_DESC],
           ]
       ]);

       $this->load($params);

       if (!$this->validate()) {
           $query->where('0=1');
           return $dataProvider;
       }

       $query->andFilterWhere([
           'user_messages.id' => $this->id,
           'user_messages.status' => $this->status,
           'user_id_from'=>$this->user_id_from,
           'user_id_to'=>$this->user_id_to,
            'is_review'=>$this->is_review,
       ]);
       $query
           ->andFilterWhere(['>=', 'created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
           ->andFilterWhere(['<=', 'created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null])
           ->andFilterWhere(['>=', 'checked_at', $this->date_from_chk ? strtotime($this->date_from_chk . ' 00:00:00') : null])
           ->andFilterWhere(['<=', 'checked_at', $this->date_to_chk ? strtotime($this->date_to_chk . ' 23:59:59') : null]);
       return $dataProvider;
   }





}