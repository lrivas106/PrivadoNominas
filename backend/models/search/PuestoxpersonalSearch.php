<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Puestoxpersonal;

/**
 * PuestoxpersonalSearch represents the model behind the search form about `backend\models\Puestoxpersonal`.
 */
class PuestoxpersonalSearch extends Puestoxpersonal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetalle', 'idpersonal', 'idpuesto', 'idcontrato', 'iddepartamento', 'estado'], 'integer'],
            [['base'], 'number'],
            [['codusuario', 'fechageneracion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Puestoxpersonal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'iddetalle' => $this->iddetalle,
            'idpersonal' => $this->idpersonal,
            'idpuesto' => $this->idpuesto,
            'base' => $this->base,
            'idcontrato' => $this->idcontrato,
            'iddepartamento' => $this->iddepartamento,
            'estado' => $this->estado,
            'fechageneracion' => $this->fechageneracion,
        ]);

        $query->andFilterWhere(['like', 'codusuario', $this->codusuario]);

        return $dataProvider;
    }
}
