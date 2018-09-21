<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrganizationUnit;

/**
 * OrganizationUnitSearch represents the model behind the search form of `app\models\OrganizationUnit`.
 */
class OrganizationUnitSearch extends OrganizationUnit
{
    public $parentName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'report_to', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'short_name', 'unit_code', 'parentName'], 'safe'],
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
        $query = OrganizationUnit::find()->joinWith('parent');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'short_name',
                    'unit_code',
                    'parentName' => [
                        'asc' => [
                            'parent.name' => SORT_ASC,
                        ],
                        'desc' => [
                            'parent.name' => SORT_DESC,
                        ],
                        'label' => 'Report To',
                        'default' => SORT_ASC
                    ],
                    'status' => [
                        'label' => 'Active',
                        'default' => SORT_DESC
                    ]
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'report_to' => $this->report_to,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        // filter by parent name
        if (!empty($this->parentName)) {
            $query->andFilterWhere(['like', 'parent.name', $this->parentName]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'unit_code', $this->unit_code]);

        return $dataProvider;
    }
}
