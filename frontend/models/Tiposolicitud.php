<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tiposolicitud".
 *
 * @property integer $idtipo
 * @property string $nombre
 * @property integer $estado
 *
 * @property Solicitud[] $solicituds
 */
class Tiposolicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiposolicitud';
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
            'idtipo' => Yii::t('app', 'Idtipo'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['idtipo' => 'idtipo']);
    }
}
