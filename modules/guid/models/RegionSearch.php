<?php


namespace app\modules\guid\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class RegionSearch extends Region
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
            [['name', ], 'safe'],
            [['name_ru', ], 'safe'],
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
        $query = Region::find();

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

        $query->leftJoin('region_lang',"region.id = region_lang.id  and region_lang.lang =:lang",[':lang'=>Yii::$app->language]); //Yii::$app->language
//        $query->leftJoin('service_lang',"service.id = service_lang.id  and service_lang.lang ='ru'",[':lang'=>Yii::$app->language]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'ifnull(region_lang.name,region.name)', $this->name]);

//       $query->select(['service.id', 'coalesce(service_lang.name,service.name) as name', 'coalesce(service_lang.note,service.note) as note']);
        $query->select(['region.id', 'coalesce(region_lang.name,region.name) as name',  'region_lang.name as name_ru']);

        return $dataProvider;
    }

}