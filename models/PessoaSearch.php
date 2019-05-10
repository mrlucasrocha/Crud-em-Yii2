<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pessoa;

/**
 * PessoaSearch represents the model behind the search form of `app\models\Pessoa`.
 */
class PessoaSearch extends Pessoa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pessoa_id'], 'integer'],
            [['pessoa_nome', 'pessoa_celular', 'pessoa_nascimento', 'pessoa_observacao'], 'safe'],
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
        $query = Pessoa::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'pessoa_id' => $this->pessoa_id,
            'pessoa_nascimento' => $this->pessoa_nascimento,
        ]);

        $query->andFilterWhere(['like', 'pessoa_nome', $this->pessoa_nome])
            ->andFilterWhere(['like', 'pessoa_celular', $this->pessoa_celular]);

        return $dataProvider;
    }
}
