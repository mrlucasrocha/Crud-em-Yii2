<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Telefones */

$this->title = 'Create Telefones';
$this->params['breadcrumbs'][] = ['label' => 'Telefones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
