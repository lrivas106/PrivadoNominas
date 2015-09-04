<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Controldepago;

/**
 * ControldepagoSearch represents the model behind the search form about `backend\models\Controldepago`.
 */
class ControldepagoSearch extends Controldepago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexpediente', 'idmoneda', 'idformapago', 'idtipoexpediente', 'idetapa', 'idgrupo','idtipopago'], 'integer'],
            [['periodoinicio', 'periodofin', 'concepto', 'fechageneracion', 'fechaaprovacion', 'fechapago', 'usuario_genera', 'usuario_aprueba'], 'safe'],
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
        $query = Controldepago::find();

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
            'idexpediente' => $this->idexpediente,
            'idmoneda' => $this->idmoneda,
            'periodoinicio' => $this->periodoinicio,
            'periodofin' => $this->periodofin,
            'idformapago' => $this->idformapago,
            'idtipopago' => $this->idtipopago,
            'idtipoexpediente' => $this->idtipoexpediente,
            'idetapa' => $this->idetapa,
            'idgrupo' => $this->idgrupo,
            'fechageneracion' => $this->fechageneracion,
            'fechaaprovacion' => $this->fechaaprovacion,
            'fechapago' => $this->fechapago,
            'usuario_aprueba' => $this->usuario_aprueba,
        ]);

        $query->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'usuario_genera', $this->usuario_genera])->orderBy(['idexpediente'=>SORT_DESC]);

        return $dataProvider;
    }
}
