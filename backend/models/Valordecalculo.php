<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "valordecalculo".
 *
 * @property integer $idvalor
 * @property string $etiqueta
 * @property string $simbolo
 * @property string $estado
 *
 * @property Descuento[] $descuentos
 */
class Valordecalculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valordecalculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['etiqueta', 'simbolo', 'estado'], 'required'],
            [['etiqueta'], 'string', 'max' => 60],
            [['simbolo'], 'string', 'max' => 20],
            [['estado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idvalor' => Yii::t('app', 'Idvalor'),
            'etiqueta' => Yii::t('app', 'Etiqueta'),
            'simbolo' => Yii::t('app', 'Simbolo'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescuentos()
    {
        return $this->hasMany(Descuento::className(), ['idvalor' => 'idvalor']);
    }
}
