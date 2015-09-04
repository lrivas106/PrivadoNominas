<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vpersonalxgrupo".
 *
 * @property integer $idgrupo
 * @property integer $idpersonal
 * @property string $nombre
 * @property string $dpi
 * @property integer $estado
 */
class Vpersonalxgrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vpersonalxgrupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idgrupo', 'idpersonal', 'estado'], 'integer'],
            [['dpi'], 'required'],
            [['nombre'], 'string', 'max' => 101],
            [['dpi'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgrupo' => Yii::t('app', 'Idgrupo'),
            'idpersonal' => Yii::t('app', 'Idpersonal'),
            'nombre' => Yii::t('app', 'Nombre'),
            'dpi' => Yii::t('app', 'Dpi'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }
}
