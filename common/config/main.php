<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
      'i18n'=>[
           'translations'=>[
           		'frontend'=>[
           			'class'=>'yii\i18n\PhpMessageSource',
           			'basePath'=>'@common/messages',
           		],
           		'backend'=>[
           			'class'=>'yii\i18n\PhpMessageSource',
           			'basePath'=>'@common/messages',
           		],
            ],
        ],
    ],
     'language' => 'es', //lenguaje por defecto  
];
