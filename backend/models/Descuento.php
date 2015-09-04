<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "descuento".
 *
 * @property integer $iddescuento
 * @property string $nombre
 * @property string $descripcion
 * @property integer $idvalor
 * @property double $cantidad
 * @property string $estado
 *
 * @property Valordecalulo $idvalor0
 * @property Descuentoxdetalle[] $descuentoxdetalles
 * @property Detallexpago[] $iddetalles
 */
class Descuento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'descuento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','estado','cantidad'], 'required'],
            [['descripcion'], 'string'],
            [['idvalor'], 'integer'],
            [['cantidad'], 'number'],
            [['nombre'], 'string', 'max' => 32],
            [['estado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddescuento' => Yii::t('app', 'Id'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'idvalor' => Yii::t('app', 'Valor'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdvalor0()
    {
        return $this->hasOne(Valordecalulo::className(), ['idvalor' => 'idvalor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescuentoxdetalles()
    {
        return $this->hasMany(Descuentoxdetalle::className(), ['iddescuento' => 'iddescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddetalles()
    {
        return $this->hasMany(Detallexpago::className(), ['iddetalle' => 'iddetalle'])->viaTable('descuentoxdetalle', ['iddescuento' => 'iddescuento']);
    }
}
