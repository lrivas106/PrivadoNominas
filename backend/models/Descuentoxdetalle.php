<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "descuentoxdetalle".
 *
 * @property integer $iddetalle
 * @property integer $iddescuento
 * @property double $monto
 * @property string $codusuario
 * @property string $fechageneracion
 *
 * @property Detallexpago $iddetalle0
 * @property Descuento $iddescuento0
 * @property Usuario $codusuario0
 */
class Descuentoxdetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'descuentoxdetalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetalle', 'iddescuento', 'codusuario', 'fechageneracion', 'monto'], 'required'],
            [['iddescuento','iddetalle'], 'unique', 'targetAttribute' => ['iddescuento', 'iddetalle']],
            //[['a1', 'a2'], 'unique', 'targetAttribute' => ['a1', 'a2']]
            [['iddetalle', 'iddescuento'], 'integer'],
            [['monto'], 'number'],
            [['fechageneracion'], 'safe'],
            [['codusuario'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalle' => Yii::t('app', 'Id-Detalle'),
            'iddescuento' => Yii::t('app', 'Descuento'),
            'monto' => Yii::t('app', 'Monto'),
            'codusuario' => Yii::t('app', 'Codusuario'),
            'fechageneracion' => Yii::t('app', 'Fechageneracion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddetalle0()
    {
        return $this->hasOne(Detallexpago::className(), ['iddetalle' => 'iddetalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddescuento0()
    {
        return $this->hasOne(Descuento::className(), ['iddescuento' => 'iddescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodusuario0()
    {
        return $this->hasOne(Usuario::className(), ['username' => 'codusuario']);
    }
}
