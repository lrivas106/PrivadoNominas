<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "puestoxpersonal".
 *
 * @property integer $iddetalle
 * @property integer $idpersonal
 * @property integer $idpuesto
 * @property double $base
 * @property integer $idcontrato
 * @property integer $iddepartamento
 * @property integer $estado
 * @property string $codusuario
 * @property string $fechageneracion
 * @property string $fechainicio
 * @property string $fechafin
 *
 * @property Personal $idpersonal0
 * @property Puesto $idpuesto0
 * @property Estadopersonal $estado0
 * @property Contrato $idcontrato0
 * @property Departamento $iddepartamento0
 * @property Usuario $codusuario0
 */
class Puestoxpersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'puestoxpersonal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpersonal', 'idpuesto', 'base', 'idcontrato', 'iddepartamento', 'codusuario', 'fechageneracion', 'fechainicio'], 'required'],
            [[ 'idpersonal', 'idpuesto', 'idcontrato', 'iddepartamento', 'estado'], 'integer'],
            [['base'], 'number'],
            [['fechageneracion', 'fechainicio', 'fechafin'], 'safe'],
            [['codusuario'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalle' => Yii::t('app', 'Iddetalle'),
            'idpersonal' => Yii::t('app', 'Empleado'),
            'idpuesto' => Yii::t('app', 'Puesto'),
            'base' => Yii::t('app', 'Sueldo Base'),
            'idcontrato' => Yii::t('app', 'Contrato'),
            'iddepartamento' => Yii::t('app', 'Departamento'),
            'estado' => Yii::t('app', 'Estado'),
            'codusuario' => Yii::t('app', 'Codusuario'),
            'fechageneracion' => Yii::t('app', 'Fechageneracion'),
            'fechainicio' => Yii::t('app', 'Inicio de Labores'),
            'fechafin' => Yii::t('app', 'Fin de Labores'),
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
    public function getIdpuesto0()
    {
        return $this->hasOne(Puesto::className(), ['idpuesto' => 'idpuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estadopersonal::className(), ['idestado' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcontrato0()
    {
        return $this->hasOne(Contrato::className(), ['idcontrato' => 'idcontrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddepartamento0()
    {
        return $this->hasOne(Departamento::className(), ['iddepartamento' => 'iddepartamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodusuario0()
    {
        return $this->hasOne(Usuario::className(), ['username' => 'codusuario']);
    }
}
