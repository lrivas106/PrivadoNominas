<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "personalxgrupo".
 *
 * @property integer $idpersonal
 * @property integer $idgrupo
 * @property integer $estado
 *
 * @property Personal $idpersonal0
 * @property Grupodepago $idgrupo0
 */
class Personalxgrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personalxgrupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpersonal', 'idgrupo', 'estado'], 'required'],
            [['idpersonal', 'idgrupo', 'estado'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpersonal' => Yii::t('app', 'Empleado'),
            'idgrupo' => Yii::t('app', 'Grupo'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpersonal0()
    {
        return $this->hasOne(Personal::className(), ['idpersonal' => 'idpersonal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdgrupo0()
    {
        return $this->hasOne(Grupodepago::className(), ['idgrupo' => 'idgrupo']);
    }
}
