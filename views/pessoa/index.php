<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PessoaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pessoas teste git';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pessoa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pessoa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pessoa_id',
            'pessoa_nome',
            'pessoa_nascimento',
            'pessoa_observacao',
            [
                'attribute' => 'emails',
                'filter' => false,
                'format' => 'raw',
                'value' => function($pessoa)
                {
                  /*exibindo todos os emails*/
               
                    $retorno='';
                    foreach($pessoa->emails as $email)
                    {
                        $retorno=$retorno."<a href='mailto:{$email->email}'>".$email->email.'</a></br>';

                        
                    }

                    return $retorno;
                    
                  
                }
                
            ],
            [
                'attribute' => 'Telefones',
                'filter' => false,
                'format' => 'raw',
                'value' => function($pessoa)
                {
                  /*exibindo todos os telefones*/
               
                  $retornotel='';
                  foreach($pessoa->telefones as $telefone)
                  {
                      $retornotel=$retornotel."<a href='tel:{$telefone->telefone}'>".$telefone->telefone.'</a></br>';

                      
                  }

                  return $retornotel;
            }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    
    
    ?>

</div>
