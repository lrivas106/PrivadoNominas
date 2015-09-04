<?php

namespace backend\models\views;

use Yii;

/**
 * This is the model class for table "vexpedientepago".
 *
 * @property integer $idexpediente
 * @property integer $idtipoexpediente
 * @property string $tipoexpediente
 * @property string $concepto
 * @property integer $idtipopago
 * @property string $tipopago
 * @property string $fechageneracion
 * @property string $periodoinicio
 * @property string $periodofin
 * @property double $aportes
 * @property double $descuentos
 * @property double $total
 * @property integer $idetapa
 * @property string $etapapago
 * @property string $fechapago
 * @property integer $idformapago
 * @property string $formapago
 */
class Vexpedientepago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vexpedientepago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexpediente', 'idtipoexpediente', 'idtipopago', 'idetapa', 'idformapago'], 'integer'],
            [['idtipoexpediente', 'tipoexpediente', 'concepto', 'tipopago', 'fechageneracion', 'periodoinicio', 'periodofin', 'etapapago', 'idformapago', 'formapago'], 'required'],
            [['fechageneracion', 'periodoinicio', 'periodofin', 'fechapago'], 'safe'],
            [['aportes', 'descuentos', 'total'], 'number'],
            [['tipoexpediente'], 'string', 'max' => 32],
            [['concepto'], 'string', 'max' => 512],
            [['tipopago', 'formapago'], 'string', 'max' => 100],
            [['etapapago'], 'string', 'max' => 56]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idexpediente' => Yii::t('app', 'Idexpediente'),
            'idtipoexpediente' => Yii::t('app', 'Idtipoexpediente'),
            'tipoexpediente' => Yii::t('app', 'Tipoexpediente'),
            'concepto' => Yii::t('app', 'Concepto'),
            'idtipopago' => Yii::t('app', 'Idtipopago'),
            'tipopago' => Yii::t('app', 'Tipopago'),
            'fechageneracion' => Yii::t('app', 'Fechageneracion'),
            'periodoinicio' => Yii::t('app', 'Periodoinicio'),
            'periodofin' => Yii::t('app', 'Periodofin'),
            'aportes' => Yii::t('app', 'Aportes'),
            'descuentos' => Yii::t('app', 'Descuentos'),
            'total' => Yii::t('app', 'Total'),
            'idetapa' => Yii::t('app', 'Idetapa'),
            'etapapago' => Yii::t('app', 'Etapapago'),
            'fechapago' => Yii::t('app', 'Fechapago'),
            'idformapago' => Yii::t('app', 'Idformapago'),
            'formapago' => Yii::t('app', 'Formapago'),
        ];
    }
}
