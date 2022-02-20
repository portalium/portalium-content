<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use portalium\content\Module;
use portalium\theme\widgets\Panel;
/* @var $this yii\web\View */
/* @var $searchModel portalium\content\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t( 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php Panel::begin([
        'title' => $this->title,
        'actions' => [
            Html::a(Module::t( 'Create Category'), ['create'], ['class' => 'btn btn-success'])
        ]
    ]) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_category',
            'name',
            'slug',
            'date_create',
            'date_update',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); Panel::end() ?>


</div>
