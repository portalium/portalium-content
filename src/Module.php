<?php

namespace portalium\content;

use portalium\base\Event;
use portalium\site\widgets\LoginButton;
use portalium\user\Module as UserModule;
use portalium\content\components\TriggerActions;

class Module extends \portalium\base\Module
{
    public static $description = 'Content Management Module';
    public static $tablePrefix = 'content_';
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'content/default',
            ]
        ],
    ];

    public function getMenuItems(){
        $menuItems = [
            [
                [
                    'type' => 'model',
                    'class' => 'portalium\content\models\MenuItem',
                    'route' => '/content/default/view',
                    'field' => [ 'id' => 'id_content', 'name' => 'name' ],
                ],
                [
                    'type' => 'action',
                    'route' => '/content/default/index',
                ],
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

    public function registerEvents()
    {
        Event::on($this::className(), UserModule::EVENT_USER_DELETE_BEFORE, [new TriggerActions(), 'onUserDeleteBefore']);
    }
}