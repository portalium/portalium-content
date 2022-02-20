<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use portalium\content\models\Content;
use portalium\content\Module;
use portalium\theme\widgets\Panel;
/* @var $this yii\web\View */
/* @var $model portalium\content\models\Content */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="content-view">

    <?php Panel::begin([
        'title' => $this->title,
        'actions' => [
            Html::a(Module::t('Update'), ['update', 'id' => $model->id_content], ['class' => 'btn btn-primary']),
            Html::a(Module::t('Delete'), ['delete', 'id' => $model->id_content], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Module::t('Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
        ]
    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_content',
            'name',
            'title:ntext',
            'body:html',
            'id_user',
            'id_category',
            'status',
            'date_create',
            'date_update',
        ],
    ]); Panel::end() ?>

</div>
