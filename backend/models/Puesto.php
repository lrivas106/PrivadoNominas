<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "puesto".
 *
 * @property integer $idpuesto
 * @property integer $nombre
 * @property string $descripcion
 * @property integer $estado
 *
 * @property Puestoxpersonal[] $puestoxpersonals
 */
class Puesto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'puesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            //[['nombre', 'estado'], 'integer'],
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpuesto' => Yii::t('app', 'ID'),
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
        return $this->hasMany(Puestoxpersonal::className(), ['idpuesto' => 'idpuesto']);
    }
}
