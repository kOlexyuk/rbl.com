<?php

namespace app\modules\guid\models;

use app\modules\guid\models\Service;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ServiceSearch represents the model behind the search form of `app\modules\guid\models\Service`.
 */
class ServiceSearch extends Service
{

    public $serviceAreaName;
    public $service_area_name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'service_area_id'], 'integer'],
            [['name', 'note', 'service_area_name'], 'safe'],
            [['name', 'note', 'service_area_name'], 'string'],
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
        $query = Service::find();//->innerJoinWith('fk-service_item-service_id', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

       $query->innerJoin('service_area','service_area.id=service.service_area_id');



        // grid filtering conditions
        $query->andFilterWhere([
            'service.id' => $this->id,
            'service.service_area_id' => $this->service_area_id,
        ]);

        $query->andFilterWhere(['like', 'service.name', $this->name])
            ->andFilterWhere(['like', 'service.note', $this->note])
            ->andFilterWhere(['like', 'service_area.name', $this->serviceAreaName]);

//        $query->groupBy(['service.id','service.service_area_id', 'service.name','service.note', 'service_area.name']);
//        $query->select(['service.id','service.service_area_id', 'service.name','service.note', 'service_area.name as service_area_name']);
        return $dataProvider;
    }
}
