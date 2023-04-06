<?php

use portalium\db\Migration;
use portalium\menu\models\Menu;
use portalium\menu\models\MenuItem;
use portalium\site\models\Form;

class m010101_010102_content_menu extends Migration
{

    public function up()
    {

        $id_menu = Menu::find()->where(['slug' => 'web-menu'])->one()->id_menu;
        $this->insert('menu_item', [
            'id_item' => NULL,
            'label' => 'Content',
            'slug' => 'content',
            'type' => '1',
            'style' => '{"icon":"","color":"","iconSize":""}',
            'data' => '{"type":"1","data":{"route":"#"}}',
            'sort' => '10',
            'id_menu' => $id_menu,
            'name_auth' => 'contentWebDefaultIndex',
            'id_user' => 1,
            'date_create' => '2022-06-13 15:30:28',
            'date_update' => '2022-06-13 15:30:28'
        ]);

        $id_item = MenuItem::find()->where(['slug' => 'content'])->one()->id_item;

        $this->batchInsert('menu_item', ['id_item', 'label', 'slug', 'type', 'style', 'data', 'sort', 'id_menu', 'name_auth', 'id_user', 'date_create', 'date_update'], [
            [NULL, 'Categories', 'content-categories', '2', '{"icon":"","color":"","iconSize":""}', '{"type":"2","data":{"module":"content","routeType":"action","route":"\\/content\\/category\\/index","model":null,"menuRoute":null,"menuType":"web"}}', '12', $id_menu, 'contentWebCategoryIndex', 1, '2022-06-13 15:32:26', '2022-06-13 15:32:26'],
            [NULL, 'Contents', 'content-contents', '2', '{"icon":"","color":"","iconSize":""}', '{"type":"2","data":{"module":"content","routeType":"action","route":"\\/content\\/default\\/index","model":null,"menuRoute":null,"menuType":"web"}}', '13', $id_menu, 'contentWebDefaultIndex', 1, '2022-06-13 15:32:26', '2022-06-13 15:32:26'],
        ]);

        $ids = MenuItem::find()->where(['slug' => ['content-contents', 'content-categories']])->select('id_item')->column();

        foreach ($ids as $id) {
            $this->insert('menu_item_child', [
                'id_item' => $id_item,
                'id_child' => $id
            ]);
        }
    }

    public function down()
    {
        $ids = $this->db->createCommand('SELECT id_item FROM menu_item WHERE slug in (\'content-categories\', \'content-contents\')')->queryColumn();

        $this->delete('menu_item', ['id_item' => $ids]);
    }
}
