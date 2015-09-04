<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "controldepago".
 *
 * @property integer $idpago
 * @property integer $moneda
 * @property string $periodoinicio
 * @property string $periodofin
 * @property string $concepto
 * @property integer $idformapago
 * @property integer $idetiqueta
 * @property integer $idetapa
 * @property integer $idgrupo
 * @property string $fechageneracion
 * @property string $fechaaprovacion
 * @property string $fechapago
 * @property string $usuario_genera
 * @property string $usuario_aprueba
 *
 * @property Grupodepago $idgrupo0
 * @property Etiquetaplanilla $idetiqueta0
 * @property Etapapago $idetapa0
 * @property Usuario $usuarioGenera
 * @property Detallexpago[] $detallexpagos
 */
class Controldepago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'controldepago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmoneda', 'idformapago', 'idtipoexpediente','idtipopago',  'idetapa', 'idgrupo'], 'integer'],
            [['periodoinicio', 'periodofin', 'idtipopago' , 'idtipoexpediente', 'concepto', 'idformapago', 'idgrupo', 'fechageneracion', 'usuario_genera'], 'required'],
            [['periodoinicio', 'periodofin', 'fechageneracion'], 'safe'],
            [['concepto'], 'string', 'max' => 512],
            [['usuario_genera'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idexpediente' => Yii::t('app', 'No. Expediente'),
            'idmoneda' => Yii::t('app', 'Moneda'),
            'periodoinicio' => Yii::t('app', 'Del'),
            'periodofin' => Yii::t('app', 'Al'),
            'concepto' => Yii::t('app', 'Concepto por Expediente Abierto'),
            'idformapago' => Yii::t('app', 'Forma de pago'),
            'idtipoexpediente' => Yii::t('app', 'Tipo Expediente'),
            'idtipopago' => Yii::t('app', 'Tipo de Pago'),
            'idetapa' => Yii::t('app', 'Etapa Actual'),
            'idgrupo' => Yii::t('app', 'Grupo'),
            'fechageneracion' => Yii::t('app', 'Generado'),
            'fechaaprovacion' => Yii::t('app', 'Fecha de Aprovacion'),
            'fechapago' => Yii::t('app', 'Fecha de pago'),
            'usuario_genera' => Yii::t('app', 'Usuario Genera'),
            'usuario_aprueba' => Yii::t('app', 'Usuario Aprueba'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdgrupo0()
    {
        return $this->hasOne(Grupodepago::className(), ['idgrupo' => 'idgrupo']);
    }

   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdetapa0()
    {
        return $this->hasOne(Etapapago::className(), ['idetapa' => 'idetapa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioGenera()
    {
        return $this->hasOne(Usuario::className(), ['codusuario' => 'usuario_genera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallexpagos()
    {
        return $this->hasMany(Detallexpago::className(), ['idpago' => 'idpago']);
    }
}
