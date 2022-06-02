<?php

namespace portalium\content;

class Module extends \portalium\base\Module
{
    public static $tablePrefix = 'content_';
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'content/default',
                'content/category',
            ],
            'pluralize' => false
        ],
    ];

    public function getMenuItems(){
        $menuItems = [
            [
                [
                    'type' => 'model',
                    'class' => 'portalium\content\models\Content',
                    'route' => '/content/default/view',
                    'field' => [ 'id' => 'id_content', 'name' => 'title' ],
                ]
            ],
        ];
        return $menuItems;
    }

    public static function moduleInit()
    {
        self::registerTranslation('content', '@portalium/content/messages', [
            'content' => 'content.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('content', $message, $params);
    }
}