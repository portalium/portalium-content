<?php
use yii\db\Migration;

class m220220_100716_content_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        $settings = yii\helpers\ArrayHelper::map(portalium\site\models\Setting::find()->asArray()->all(),'name','value');
        $role = $settings['default::role'];
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $contentBackendDefaultIndex = $auth->createPermission('contentBackendDefaultIndex');
        $contentBackendDefaultIndex->description = 'View content';
        $auth->add($contentBackendDefaultIndex);
        $auth->addChild($admin, $contentBackendDefaultIndex);

        $contentBackendDefaultView = $auth->createPermission('contentBackendDefaultView');
        $contentBackendDefaultView->description = 'View content';
        $auth->add($contentBackendDefaultView);
        $auth->addChild($admin, $contentBackendDefaultView);

        $contentBackendDefaultCreate = $auth->createPermission('contentBackendDefaultCreate');
        $contentBackendDefaultCreate->description = 'Create content';
        $auth->add($contentBackendDefaultCreate);
        $auth->addChild($admin, $contentBackendDefaultCreate);

        $contentBackendDefaultUpdate = $auth->createPermission('contentBackendDefaultUpdate');
        $contentBackendDefaultUpdate->description = 'Update content';
        $auth->add($contentBackendDefaultUpdate);
        $auth->addChild($admin, $contentBackendDefaultUpdate);

        $contentBackendDafaultDelete = $auth->createPermission('contentBackendDafaultDelete');
        $contentBackendDafaultDelete->description = 'Delete content';
        $auth->add($contentBackendDafaultDelete);
        $auth->addChild($admin, $contentBackendDafaultDelete);

        $contentBackendCategoryIndex = $auth->createPermission('contentBackendCategoryIndex');
        $contentBackendCategoryIndex->description = 'View content category';
        $auth->add($contentBackendCategoryIndex);
        $auth->addChild($admin, $contentBackendCategoryIndex);

        $contentBackendCategoryView = $auth->createPermission('contentBackendCategoryView');
        $contentBackendCategoryView->description = 'View content category';
        $auth->add($contentBackendCategoryView);
        $auth->addChild($admin, $contentBackendCategoryView);

        $contentBackendCategoryCreate = $auth->createPermission('contentBackendCategoryCreate');
        $contentBackendCategoryCreate->description = 'Create content category';
        $auth->add($contentBackendCategoryCreate);
        $auth->addChild($admin, $contentBackendCategoryCreate);

        $contentBackendCategoryUpdate = $auth->createPermission('contentBackendCategoryUpdate');
        $contentBackendCategoryUpdate->description = 'Update content category';
        $auth->add($contentBackendCategoryUpdate);
        $auth->addChild($admin, $contentBackendCategoryUpdate);

        $contentBackendCategoryDelete = $auth->createPermission('contentBackendCategoryDelete');
        $contentBackendCategoryDelete->description = 'Delete content category';
        $auth->add($contentBackendCategoryDelete);
        $auth->addChild($admin, $contentBackendCategoryDelete);

        $contentApiDefaultView = $auth->createPermission('contentApiDefaultView');
        $contentApiDefaultView->description = 'View content';
        $auth->add($contentApiDefaultView);
        $auth->addChild($admin, $contentApiDefaultView);

        $contentApiDefaultCreate = $auth->createPermission('contentApiDefaultCreate');
        $contentApiDefaultCreate->description = 'Create content';
        $auth->add($contentApiDefaultCreate);
        $auth->addChild($admin, $contentApiDefaultCreate);

        $contentApiDefaultUpdate = $auth->createPermission('contentApiDefaultUpdate');
        $contentApiDefaultUpdate->description = 'Update content';
        $auth->add($contentApiDefaultUpdate);
        $auth->addChild($admin, $contentApiDefaultUpdate);

        $contentApiDefaultDelete = $auth->createPermission('contentApiDefaultDelete');
        $contentApiDefaultDelete->description = 'Delete content';
        $auth->add($contentApiDefaultDelete);
        $auth->addChild($admin, $contentApiDefaultDelete);


        $contentApiDefaultIndex = $auth->createPermission('contentApiDefaultIndex');
        $contentApiDefaultIndex->description = 'View content';
        $auth->add($contentApiDefaultIndex);
        $auth->addChild($admin, $contentApiDefaultIndex);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->remove($auth->getPermission('contentBackendDefaultIndex'));
        $auth->remove($auth->getPermission('contentBackendDefaultView'));
        $auth->remove($auth->getPermission('contentBackendDefaultCreate'));
        $auth->remove($auth->getPermission('contentBackendDefaultUpdate'));
        $auth->remove($auth->getPermission('contentBackendDafaultDelete'));
        $auth->remove($auth->getPermission('contentBackendCategoryIndex'));
        $auth->remove($auth->getPermission('contentBackendCategoryView'));
        $auth->remove($auth->getPermission('contentBackendCategoryCreate'));
        $auth->remove($auth->getPermission('contentBackendCategoryUpdate'));
        $auth->remove($auth->getPermission('contentBackendCategoryDelete'));
        $auth->remove($auth->getPermission('contentApiDefaultView'));
        $auth->remove($auth->getPermission('contentApiDefaultCreate'));
        $auth->remove($auth->getPermission('contentApiDefaultUpdate'));
        $auth->remove($auth->getPermission('contentApiDefaultDelete'));
        $auth->remove($auth->getPermission('contentApiDefaultIndex'));
    }
}