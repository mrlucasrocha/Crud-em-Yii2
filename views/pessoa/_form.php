<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pessoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pessoa_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_nascimento')->textInput() ?>

    <?= $form->field($model, 'pessoa_observacao')->textArea(['rows' => '8']) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
