<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etapapago".
 *
 * @property integer $idetapa
 * @property string $ nombre
 *
 * @property Controldepago[] $controldepagos
 */
class Etapapago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etapapago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 56]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idetapa' => Yii::t('app', 'Idetapa'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControldepagos()
    {
        return $this->hasMany(Controldepago::className(), ['idetapa' => 'idetapa']);
    }
}
