<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipopago".
 *
 * @property integer $idtipopago
 * @property string $nombre
 * @property string $estado
 *
 * @property Grupodepago[] $grupodepagos
 */
class Tipopago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipopago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','estado'], 'required'],
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
            'idtipopago' => Yii::t('app', 'Id'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupodepagos()
    {
        return $this->hasMany(Grupodepago::className(), ['idtipopago' => 'idtipopago']);
    }
}
