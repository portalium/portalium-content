<?php

use yii\helpers\Html;
use portalium\content\Module;
use portalium\theme\widgets\Panel;
/* @var $this yii\web\View */
/* @var $model portalium\content\models\Category */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Module::t('Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?php Panel::begin([
        'title' => $this->title,
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]); Panel::end() ?>

</div>
