<?php

namespace app\controllers;

use Yii;
use app\models\Emails;
use app\models\EmailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pessoa;

/**
 * EmailsController implements the CRUD actions for Emails model.
 */
class EmailsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*declarando a variavel model para receber os emails*/
        $model = new Emails();

        /*model recebe a pesquisa da tabela pessoa, 
        logo abaixo é criado uma váriavel array lista, 
        para armazenar nela todos os campos da tabela*/
        $model_pessoa = Pessoa::find()->All();
        $lista = [];
        
        /*Aqui começamos a usar o foreach para conseguirmos passar os campos pessoa_id e pessoa_nome para 
        a variável lista*/
        foreach($model_pessoa as $pessoa){
            $lista[$pessoa['pessoa_id']]=$pessoa['pessoa_nome'];

        }
        
        /*If de salvamento de dados. primeiro ele usa uma variável para carregar uma requisição através 
        do load, em seguida usa a sintaxe do yii para para usar o metodo post para salvar na variável model.
        em seguida ele retorna um redirect, para a view de email*/
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email_id]);
        }

        /*aqui ele está rendenizando a view */
        return $this->render('create', [
            'model' => $model,
            'lista' => $lista,
        ]);
    }

    /**
     * Updates an existing Emails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

     /*Essa função é a de upddate de valores. Ela já vem assim por padrão do Gii */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Emails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

     /*Essa função é a de deletar valores. Ela já vem assim por padrão do Gii */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
