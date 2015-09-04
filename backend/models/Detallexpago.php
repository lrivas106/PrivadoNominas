<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detallexpago".
 *
 * @property integer $iddetalle
 * @property integer $idexpediente
 * @property integer $idpersonal
 * @property string $codusuario
 * @property string $fechageneracion
 *
 * @property Aportexdetalle[] $aportexdetalles
 * @property Aporte[] $idaportes
 * @property Descuentoxdetalle[] $descuentoxdetalles
 * @property Descuento[] $iddescuentos
 * @property Controldepago $idexpediente0
 * @property Personal $idpersonal0
 * @property Usuario $codusuario0
 */
class Detallexpago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallexpago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexpediente', 'idpersonal', 'codusuario', 'fechageneracion'], 'required'],
            [['idexpediente', 'idpersonal'], 'integer'],
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
            'iddetalle' => Yii::t('app', 'Iddetalle'),
            'idexpediente' => Yii::t('app', 'Idexpediente'),
            'idpersonal' => Yii::t('app', 'Idpersonal'),
            'codusuario' => Yii::t('app', 'Codusuario'),
            'fechageneracion' => Yii::t('app', 'Fechageneracion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAportexdetalles()
    {
        return $this->hasMany(Aportexdetalle::className(), ['iddetalle' => 'iddetalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdaportes()
    {
        return $this->hasMany(Aporte::className(), ['idaporte' => 'idaporte'])->viaTable('aportexdetalle', ['iddetalle' => 'iddetalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescuentoxdetalles()
    {
        return $this->hasMany(Descuentoxdetalle::className(), ['iddetalle' => 'iddetalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddescuentos()
    {
        return $this->hasMany(Descuento::className(), ['iddescuento' => 'iddescuento'])->viaTable('descuentoxdetalle', ['iddetalle' => 'iddetalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdexpediente0()
    {
        return $this->hasOne(Controldepago::className(), ['idexpediente' => 'idexpediente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpersonal0()
    {
        return $this->hasOne(Personal::className(), ['idpersonal' => 'idpersonal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodusuario0()
    {
        return $this->hasOne(Usuario::className(), ['codusuario' => 'codusuario']);
    }
}
