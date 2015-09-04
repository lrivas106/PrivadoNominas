<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grupodepago".
 *
 * @property integer $idgrupo
 * @property string $nombre
 * @property string $estado
 * @property integer $idtipolistado
 * @property integer $idtipopago
 *
 * @property Controldepago[] $controldepagos
 * @property Tipopago $idtipopago0
 * @property Tipolistado $idtipolistado0
 * @property Personalxgrupo[] $personalxgrupos
 * @property Personal[] $idpersonals
 */
class Grupodepago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupodepago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'estado'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgrupo' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estado' => Yii::t('app', 'Estado'),
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControldepagos()
    {
        return $this->hasMany(Controldepago::className(), ['idgrupo' => 'idgrupo']);
    }

 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalxgrupos()
    {
        return $this->hasMany(Personalxgrupo::className(), ['idgrupo' => 'idgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpersonals()
    {
        return $this->hasMany(Personal::className(), ['idpersonal' => 'idpersonal'])->viaTable('personalxgrupo', ['idgrupo' => 'idgrupo']);
    }
}
