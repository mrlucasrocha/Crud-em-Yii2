<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Telefones */

$this->title = 'Update Telefones: ' . $model->telefone_id;
$this->params['breadcrumbs'][] = ['label' => 'Telefones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->telefone_id, 'url' => ['view', 'id' => $model->telefone_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telefones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
