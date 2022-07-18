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

        $contentWebDefaultIndex = $auth->createPermission('contentWebDefaultIndex');
        $contentWebDefaultIndex->description = 'View content';
        $auth->add($contentWebDefaultIndex);
        $auth->addChild($admin, $contentWebDefaultIndex);

        $contentWebDefaultView = $auth->createPermission('contentWebDefaultView');
        $contentWebDefaultView->description = 'View content';
        $auth->add($contentWebDefaultView);
        $auth->addChild($admin, $contentWebDefaultView);

        $contentWebDefaultCreate = $auth->createPermission('contentWebDefaultCreate');
        $contentWebDefaultCreate->description = 'Create content';
        $auth->add($contentWebDefaultCreate);
        $auth->addChild($admin, $contentWebDefaultCreate);

        $contentWebDefaultUpdate = $auth->createPermission('contentWebDefaultUpdate');
        $contentWebDefaultUpdate->description = 'Update content';
        $auth->add($contentWebDefaultUpdate);
        $auth->addChild($admin, $contentWebDefaultUpdate);

        $contentWebDafaultDelete = $auth->createPermission('contentWebDafaultDelete');
        $contentWebDafaultDelete->description = 'Delete content';
        $auth->add($contentWebDafaultDelete);
        $auth->addChild($admin, $contentWebDafaultDelete);

        $contentWebCategoryIndex = $auth->createPermission('contentWebCategoryIndex');
        $contentWebCategoryIndex->description = 'View content category';
        $auth->add($contentWebCategoryIndex);
        $auth->addChild($admin, $contentWebCategoryIndex);

        $contentWebCategoryView = $auth->createPermission('contentWebCategoryView');
        $contentWebCategoryView->description = 'View content category';
        $auth->add($contentWebCategoryView);
        $auth->addChild($admin, $contentWebCategoryView);

        $contentWebCategoryCreate = $auth->createPermission('contentWebCategoryCreate');
        $contentWebCategoryCreate->description = 'Create content category';
        $auth->add($contentWebCategoryCreate);
        $auth->addChild($admin, $contentWebCategoryCreate);

        $contentWebCategoryUpdate = $auth->createPermission('contentWebCategoryUpdate');
        $contentWebCategoryUpdate->description = 'Update content category';
        $auth->add($contentWebCategoryUpdate);
        $auth->addChild($admin, $contentWebCategoryUpdate);

        $contentWebCategoryDelete = $auth->createPermission('contentWebCategoryDelete');
        $contentWebCategoryDelete->description = 'Delete content category';
        $auth->add($contentWebCategoryDelete);
        $auth->addChild($admin, $contentWebCategoryDelete);

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

        $auth->remove($auth->getPermission('contentWebDefaultIndex'));
        $auth->remove($auth->getPermission('contentWebDefaultView'));
        $auth->remove($auth->getPermission('contentWebDefaultCreate'));
        $auth->remove($auth->getPermission('contentWebDefaultUpdate'));
        $auth->remove($auth->getPermission('contentWebDafaultDelete'));
        $auth->remove($auth->getPermission('contentWebCategoryIndex'));
        $auth->remove($auth->getPermission('contentWebCategoryView'));
        $auth->remove($auth->getPermission('contentWebCategoryCreate'));
        $auth->remove($auth->getPermission('contentWebCategoryUpdate'));
        $auth->remove($auth->getPermission('contentWebCategoryDelete'));
        $auth->remove($auth->getPermission('contentApiDefaultView'));
        $auth->remove($auth->getPermission('contentApiDefaultCreate'));
        $auth->remove($auth->getPermission('contentApiDefaultUpdate'));
        $auth->remove($auth->getPermission('contentApiDefaultDelete'));
        $auth->remove($auth->getPermission('contentApiDefaultIndex'));
    }
}