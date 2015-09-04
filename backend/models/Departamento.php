<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $iddepartamento
 * @property string $nombre
 * @property string $estado
 *
 * @property Puestoxpersonal[] $puestoxpersonals
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 60],
            [['estado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddepartamento' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuestoxpersonals()
    {
        return $this->hasMany(Puestoxpersonal::className(), ['iddepartamento' => 'iddepartamento']);
    }
}
