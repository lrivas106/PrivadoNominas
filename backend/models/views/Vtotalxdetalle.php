<?php

namespace backend\models\views;

use Yii;

/**
 * This is the model class for table "vtotalxdetalle".
 *
 * @property integer $iddetalle
 * @property integer $idexpediente
 * @property integer $idpersonal
 * @property string $empleado
 * @property double $aportes
 * @property double $descuentos
 * @property double $total
 */
class Vtotalxdetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vtotalxdetalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetalle', 'idexpediente', 'idpersonal'], 'integer'],
            [['aportes', 'descuentos', 'total'], 'number'],
            [['empleado'], 'string', 'max' => 101]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalle' => Yii::t('app', 'Iddetalle'),
            'idexpediente' => Yii::t('app', 'Idexpediente'),
            'idpersonal' => Yii::t('app', 'Idpersonal'),
            'empleado' => Yii::t('app', 'Empleado'),
            'aportes' => Yii::t('app', 'Aportes'),
            'descuentos' => Yii::t('app', 'Descuentos'),
            'total' => Yii::t('app', 'Total'),
        ];
    }
}
