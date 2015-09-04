<?php

namespace backend\models\seguridad;
use backend\models\seguridad\Operacionxrol;
use backend\models\seguridad\Operacion;

use Yii;




/**
 * This is the model class for table "rol".
 *
 * @property integer $idrol
 * @property string $nombre
 *
 * @property Operacionxrol[] $operacionxrols
 * @property Operacion[] $idoperacions
 * @property Usuario[] $usuarios
 */
class Rol extends \yii\db\ActiveRecord
{

    public $operaciones; //Definimos un atributo para operaciones seleccionadas

    /*Utilizando Checkbox para seleccionar operaciones*/
public function afterSave($insert, $changedAttributes){
    \Yii::$app->db->createCommand()->delete('operacionxrol', 'idrol = '.(int) $this->idrol)->execute();
 
    foreach ($this->operaciones as $id) {
        $ro = new Operacionxrol();
        $ro->idrol = $this->idrol;
        $ro->idoperacion = $id;
        $ro->save();
    }
}

public function getRolOperaciones()
{
    return $this->hasMany(Operacionxrol::className(), ['idrol' => 'idrol']);
}
 
public function getOperacionesPermitidas()
{
    return $this->hasMany(Operacion::className(), ['idoperacion' => 'idoperacion'])
        ->viaTable('operacionxrol', ['idrol' => 'idrol']);
}
 
public function getOperacionesPermitidasList()
{
    return $this->getOperacionesPermitidas()->asArray();
}

/*@Utilizando Checkbox para seleccionar operaciones*/



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 32],
            ['operaciones', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrol' => Yii::t('app', 'Idrol'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacionxrols()
    {
        return $this->hasMany(Operacionxrol::className(), ['idrol' => 'idrol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdoperacions()
    {
        return $this->hasMany(Operacion::className(), ['idoperacion' => 'idoperacion'])->viaTable('operacionxrol', ['idrol' => 'idrol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idrol' => 'idrol']);
    }
}
