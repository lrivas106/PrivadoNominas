<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "moneda".
 *
 * @property integer $idmoneda
 * @property string $nombre
 * @property string $etiqueta
 * @property integer $estado
 *
 * @property Controldepago[] $controldepagos
 */
class Moneda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'moneda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'etiqueta'], 'required'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['etiqueta'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmoneda' => Yii::t('app', 'Idmoneda'),
            'nombre' => Yii::t('app', 'Nombre'),
            'etiqueta' => Yii::t('app', 'Etiqueta'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControldepagos()
    {
        return $this->hasMany(Controldepago::className(), ['idmoneda' => 'idmoneda']);
    }
}
