<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use portalium\content\models\Category;
use portalium\content\models\Content;
use portalium\content\Module;
use kartik\editors\Summernote;
/* @var $this yii\web\View */
/* @var $model portalium\content\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'body')->widget(Summernote::class) ?>

    <?= $form->field($model, 'id_category')->dropDownList(Category::getCategoryList()) ?>

    <?= $form->field($model, 'status')->dropDownList(Content::getStatusList()['STATUS']) ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
