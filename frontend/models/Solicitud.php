<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $idsolicitud
 * @property string $fecha
 * @property string $nombre
 * @property integer $codempleado
 * @property string $asunto
 * @property integer $idtipo
 * @property string $mensaje
 * @property integer $estado
 *
 * @property Tiposolicitud $idtipo0
 * @property Personal $codempleado0
 * @property Estadosolicitud $estado0
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'nombre', 'asunto', 'idtipo', 'mensaje'], 'required'],
            [['fecha'], 'safe'],
            [['codempleado', 'idtipo', 'estado'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['asunto'], 'string', 'max' => 50],
            [['mensaje'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsolicitud' => Yii::t('app', 'Idsolicitud'),
            'fecha' => Yii::t('app', 'Fecha'),
            'nombre' => Yii::t('app', 'Nombre'),
            'codempleado' => Yii::t('app', 'Cógido de Empleado'),
            'asunto' => Yii::t('app', 'Asunto'),
            'idtipo' => Yii::t('app', 'Tipo de la Solicitud'),
            'mensaje' => Yii::t('app', 'Mensaje'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtipo0()
    {
        return $this->hasOne(Tiposolicitud::className(), ['idtipo' => 'idtipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodempleado0()
    {
        return $this->hasOne(Personal::className(), ['idpersonal' => 'codempleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estadosolicitud::className(), ['idestado' => 'estado']);
    }
}
