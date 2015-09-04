<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aportexdetalle".
 *
 * @property integer $iddetalle
 * @property integer $idaporte
 * @property double $monto
 * @property string $codusuario
 * @property string $fechageneracion
 *
 * @property Detallexpago $iddetalle0
 * @property Aporte $idaporte0
 * @property UsuarioOld $codusuario0
 */
class Aportexdetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aportexdetalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetalle', 'idaporte', 'codusuario', 'fechageneracion'], 'required'],
            [['iddetalle', 'idaporte'], 'integer'],
            [['idaporte','iddetalle'], 'unique', 'targetAttribute' => ['idaporte', 'iddetalle']],
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
            'iddetalle' => Yii::t('app', 'Id-detalle'),
            'idaporte' => Yii::t('app', 'Aporte'),
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
    public function getIdaporte0()
    {
        return $this->hasOne(Aporte::className(), ['idaporte' => 'idaporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodusuario0()
    {
        return $this->hasOne(UsuarioOld::className(), ['codusuario' => 'codusuario']);
    }
}
