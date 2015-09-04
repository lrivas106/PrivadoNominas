<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estadosolicitud".
 *
 * @property integer $idestado
 * @property string $nombre
 * @property integer $estado
 *
 * @property Solicitud[] $solicituds
 */
class Estadosolicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadosolicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 62]
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
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['estado' => 'idestado']);
    }
}
