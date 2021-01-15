<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
use alwaidz\cars\common\models\Cars;


/* @var $this yii\web\View */
/* @var $model alwaidz\cars\common\models\Posts */
/* @var $form yii\widgets\ActiveForm */
/*  $cars ArrayHelper::map(Standard::find()->all(),'brand','cars'); */
/*  $cars Cars*/
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?php
    $cars = Cars::find()->all();
    $carArray=ArrayHelper::map($cars,'id','brand');
    echo $form->field($model, 'carid')->dropDownList(
    $carArray,
    ['prompt'=>'Select...']
    );
    ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
