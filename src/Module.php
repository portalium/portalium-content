<?php

namespace portalium\content;

class Module extends \portalium\base\Module
{
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'content/default',
            ]
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('content','@portalium/content/messages',[
            'content' => 'content.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('content', $message, $params);
    }
}