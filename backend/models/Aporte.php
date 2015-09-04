<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aporte".
 *
 * @property integer $idaporte
 * @property string $nombre
 * @property string $descripcion
 * @property integer $idvalor
 * @property double $cantidad
 * @property string $estado
 *
 * @property Valordecalculo $idvalor0
 * @property Aportexdetalle[] $aportexdetalles
 * @property Detallexpago[] $iddetalles
 */
class Aporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['idvalor'], 'integer'],
            [['cantidad'], 'number'],
            [['nombre'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idaporte' => Yii::t('app', 'Idaporte'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'idvalor' => Yii::t('app', 'Idvalor'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdvalor0()
    {
        return $this->hasOne(Valordecalculo::className(), ['idvalor' => 'idvalor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAportexdetalles()
    {
        return $this->hasMany(Aportexdetalle::className(), ['idaporte' => 'idaporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddetalles()
    {
        return $this->hasMany(Detallexpago::className(), ['iddetalle' => 'iddetalle'])->viaTable('aportexdetalle', ['idaporte' => 'idaporte']);
    }
}
