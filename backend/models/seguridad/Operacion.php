<?php

namespace backend\models\seguridad;

use Yii;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $idoperacion
 * @property string $nombre
 *
 * @property Operacionxrol[] $operacionxrols
 * @property Rol[] $idrols
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idoperacion' => Yii::t('app', 'Idoperacion'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacionxrols()
    {
        return $this->hasMany(Operacionxrol::className(), ['idoperacion' => 'idoperacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdrols()
    {
        return $this->hasMany(Rol::className(), ['idrol' => 'idrol'])->viaTable('operacionxrol', ['idoperacion' => 'idoperacion']);
    }
}
