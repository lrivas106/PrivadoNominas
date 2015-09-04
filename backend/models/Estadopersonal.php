<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estadopersonal".
 *
 * @property integer $idestado
 * @property string $nombre
 * @property integer $estado
 *
 * @property Puestoxpersonal[] $puestoxpersonals
 */
class Estadopersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadopersonal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestado' => Yii::t('app', 'Idestado'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuestoxpersonals()
    {
        return $this->hasMany(Puestoxpersonal::className(), ['estado' => 'idestado']);
    }
}
