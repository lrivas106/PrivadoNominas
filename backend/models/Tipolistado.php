<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipolistado".
 *
 * @property integer $idtipolistado
 * @property string $nombre
 * @property string $estado
 *
 * @property Grupodepago[] $grupodepagos
 */
class Tipolistado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipolistado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
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
            'idtipolistado' => Yii::t('app', 'Idtipolistado'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupodepagos()
    {
        return $this->hasMany(Grupodepago::className(), ['idtipolistado' => 'idtipolistado']);
    }
}
