<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlaceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'place_id') ?>

    <?= $form->field($model, 'lat') ?>

    <?= $form->field($model, 'lng') ?>

    <?= $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'is_country') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
