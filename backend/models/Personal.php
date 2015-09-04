<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property integer $idpersonal
 * @property string $nombres
 * @property string $apellidos
 * @property string $dpi
 * @property string $fechanac
 * @property string $nit
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $direccion
 *
 * @property Detallexpago[] $detallexpagos
 * @property Personalxgrupo[] $personalxgrupos
 * @property Grupodepago[] $idgrupos
 * @property Puestoxpersonal[] $puestoxpersonals
 * @property Usuario[] $usuarios
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'dpi', 'fechanac'], 'required'],
            [['fechanac'], 'safe'],
            [['nombres', 'apellidos', 'email', 'direccion'], 'string', 'max' => 50],
            [['dpi', 'nit'], 'string', 'max' => 20],
            [['telefono', 'celular'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpersonal' => Yii::t('app', 'ID'),
            'nombres' => Yii::t('app', 'Nombres'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'dpi' => Yii::t('app', 'DPI'),
            'fechanac' => Yii::t('app', 'Fecha de Nacimiento'),
            'nit' => Yii::t('app', 'NIT'),
            'telefono' => Yii::t('app', 'Telefono'),
            'celular' => Yii::t('app', 'Celular'),
            'email' => Yii::t('app', 'E-mail'),
            'direccion' => Yii::t('app', 'Dirección'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallexpagos()
    {
        return $this->hasMany(Detallexpago::className(), ['idpersonal' => 'idpersonal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalxgrupos()
    {
        return $this->hasMany(Personalxgrupo::className(), ['idpersonal' => 'idpersonal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdgrupos()
    {
        return $this->hasMany(Grupodepago::className(), ['idgrupo' => 'idgrupo'])->viaTable('personalxgrupo', ['idpersonal' => 'idpersonal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuestoxpersonals()
    {
        return $this->hasMany(Puestoxpersonal::className(), ['idpersonal' => 'idpersonal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idpersonal' => 'idpersonal']);
    }
}
