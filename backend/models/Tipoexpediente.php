<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipoexpediente".
 *
 * @property integer $idtipoexpediente
 * @property string $nombre
 * @property integer $estado
 *
 * @property Controldepago[] $controldepagos
 */
class Tipoexpediente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoexpediente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipoexpediente' => Yii::t('app', 'Idtipoexpediente'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControldepagos()
    {
        return $this->hasMany(Controldepago::className(), ['idtipoexpediente' => 'idtipoexpediente']);
    }
}
