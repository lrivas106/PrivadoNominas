<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contrato".
 *
 * @property integer $idcontrato
 * @property string $nombre
 * @property string $descripcion
 * @property string $estado
 *
 * @property Puestoxpersonal[] $puestoxpersonals
 */
class Contrato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contrato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
            [['estado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcontrato' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuestoxpersonals()
    {
        return $this->hasMany(Puestoxpersonal::className(), ['idcontrato' => 'idcontrato']);
    }
}
