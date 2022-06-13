<?php

namespace portalium\content\controllers\api;

use portalium\rest\ActiveController as RestActiveController;
use portalium\content\models\Content;

class CategoryController extends RestActiveController
{
    public $modelClass = 'portalium\content\models\Category';
    
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }
}