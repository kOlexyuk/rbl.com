<?php

namespace  app\modules\guid\models;


use app\modules\guid\models\ServiceArea;
use app\modules\guid\models\Service;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ServiceSearch represents the model behind the search form of `app\models\Service`.
 */
class ServiceAreaSearch extends ServiceArea
{
    public $id;
    public $name;
    public $name_ru;
    public $note;
    public $note_ru;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'note'], 'safe'],
            [['name_ru', 'note_ru'], 'safe'],
            [['name_ru'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = ServiceArea::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->leftJoin('service_area_lang',"service_area.id = service_area_lang.id  and service_area_lang.lang =:lang",[':lang'=>Yii::$app->language]); //Yii::$app->language
//        $query->leftJoin('service_lang',"service.id = service_lang.id  and service_lang.lang ='ru'",[':lang'=>Yii::$app->language]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'ifnull(service_area_lang.name,service_area.name)', $this->name])
            ->andFilterWhere(['like', 'ifnull(service_area_lang.note,service_area.note)', $this->note]);

//       $query->select(['service.id', 'coalesce(service_lang.name,service.name) as name', 'coalesce(service_lang.note,service.note) as note']);
        $query->select(['service_area.id', 'coalesce(service_area_lang.name,service_area.name) as name',  'service_area_lang.name as name_ru'
            , 'service_area.note',   'service_area_lang.note as note_ru']);

        return $dataProvider;
    }
}
