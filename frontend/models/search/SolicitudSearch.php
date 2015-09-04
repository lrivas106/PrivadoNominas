<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Solicitud;

/**
 * SolicitudSearch represents the model behind the search form about `frontend\models\Solicitud`.
 */
class SolicitudSearch extends Solicitud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsolicitud', 'codempleado', 'idtipo', 'estado'], 'integer'],
            [['fecha', 'nombre', 'asunto', 'mensaje'], 'safe'],
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
        $query = Solicitud::find();

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
            'idsolicitud' => $this->idsolicitud,
            'fecha' => $this->fecha,
            'codempleado' => $this->codempleado,
            'idtipo' => $this->idtipo,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'mensaje', $this->mensaje]);

        return $dataProvider;
    }
}
