<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "formapago".
 *
 * @property integer $idformapago
 * @property string $nombre
 * @property integer $estado
 *
 * @property Controldepago[] $controldepagos
 */
class Formapago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formapago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idformapago' => Yii::t('app', 'Idformapago'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControldepagos()
    {
        return $this->hasMany(Controldepago::className(), ['idformapago' => 'idformapago']);
    }
}
