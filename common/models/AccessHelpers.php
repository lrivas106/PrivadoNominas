<?php
namespace common\models;

use yii;


class AccessHelpers {

    public static function getAcceso($operacion)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT operacion.nombre
                FROM usuario
                JOIN rol ON usuario.idrol = rol.idrol
                JOIN operacionxrol ON rol.idrol = operacionxrol.idrol
                JOIN operacion  ON operacionxrol.idoperacion = operacion.idoperacion
                WHERE operacion.nombre =:operacion
                AND usuario.idrol =:idrol";
        $command = $connection->createCommand($sql);
        $command->bindValue(":operacion", $operacion);
        $command->bindValue(":idrol", Yii::$app->user->identity->idrol);
        $result = $command->queryOne();

        if ($result['nombre'] != null){
            return true;
        } else {
            return false;
        }
    }

}