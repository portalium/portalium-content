<?php

namespace portalium\content\controllers\api;

use portalium\rest\ActiveController as RestActiveController;
use portalium\content\models\Content;

class DefaultController extends RestActiveController
{
    public $modelClass = 'portalium\content\models\Content';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }

    public function actionIndex($id = null)
    {
        if ($id == null) {
            $data = Content::find()->all();
        } else {
            $data = Content::find()->where(['id_category' => $id])->all();
        }
        return $data;
    }
}