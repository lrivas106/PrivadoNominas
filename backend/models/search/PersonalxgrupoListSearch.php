<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Personalxgrupo;

/**
 * PersonalxgrupoListSearch represents the model behind the search form about `backend\models\Personalxgrupo`.
 */
class PersonalxgrupoListSearch extends Personalxgrupo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpersonal', 'idgrupo', 'estado'], 'integer'],
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
    public function search($params, $idexpediente=null)
    {

        $sql = "select * from personalxgrupo where idpersonal not in (select idpersonal from detallexpago  where idexpediente=".$idexpediente.") and estado=1";
        $query = Personalxgrupo::findBySql($sql); 

        //$query = Personalxgrupo::find();

         

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
            'idpersonal' => $this->idpersonal,
            'idgrupo' => $this->idgrupo,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
