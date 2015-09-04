<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Detallexpago;

/**
 * DetallexpagoSearch represents the model behind the search form about `backend\models\Detallexpago`.
 */
class DetallexpagoSearch extends Detallexpago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetalle', 'idexpediente', 'idpersonal'], 'integer'],
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
        $query = Detallexpago::find();

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
            'idexpediente' => $this->idexpediente,
            'idpersonal' => $this->idpersonal,
            'fechageneracion' => $this->fechageneracion,
        ]);

        $query->andFilterWhere(['like', 'codusuario', $this->codusuario]);

        return $dataProvider;
    }
}
