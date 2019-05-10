<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!-- Esse form field é diferente pois estamos usando o dropDownLins para exibir 
uma lista com todos os emails dos usuários. Esses dados estão na variável lista que delcaramos 
e utilizamos a lógica para ela funcionar la no models -->
    <?= $form->field($model, 'pessoa_email_id')->dropDownList($lista)?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
