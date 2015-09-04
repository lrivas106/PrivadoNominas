<?php

namespace backend\models\seguridad;

use Yii;

/**
 * This is the model class for table "operacionxrol".
 *
 * @property integer $idrol
 * @property integer $idoperacion
 *
 * @property Rol $idrol0
 * @property Operacion $idoperacion0
 */
class Operacionxrol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacionxrol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrol', 'idoperacion'], 'required'],
            [['idrol', 'idoperacion'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrol' => Yii::t('app', 'Idrol'),
            'idoperacion' => Yii::t('app', 'Idoperacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdrol0()
    {
        return $this->hasOne(Rol::className(), ['idrol' => 'idrol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdoperacion0()
    {
        return $this->hasOne(Operacion::className(), ['idoperacion' => 'idoperacion']);
    }
}
