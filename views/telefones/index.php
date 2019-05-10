<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Telefones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Telefones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'telefone_id',
            'telefone',
            'pessoa_telefone_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
