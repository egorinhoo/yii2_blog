<?php

namespace frontend\controllers;

use common\models\Comment;
use Yii;
use common\models\Post;
use frontend\models\PostSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->request->get('create_comment')){

        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new Comment();
        $model->post_id = $id;
        $model->level = 0;
        $model->parent_id = 0;
        $model->left_key = 1;
        $model->right_key = 2;
        if(Yii::$app->user->isGuest){
            $model->user_id = null;
        }
        else
            $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())){
            if($model->left_key == 1){
                $model->left_key = Comment::find()->max('right_key') + 1;
                $model->right_key = $model->left_key+1;
            }
            Yii::$app->db->createCommand('UPDATE comment SET left_key=left_key+2 WHERE left_key>'.$model->left_key)
                ->execute();
            Yii::$app->db->createCommand('UPDATE comment SET right_key=right_key+2 WHERE right_key>='.$model->left_key)
                ->execute();

            $model->save();
            return $this->redirect(['view', 'id' => $model->post_id]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionDelete(){

    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new Post();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }



    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
    //     */
    //    public function actionUpdate($id)
    //    {
    //        $model = $this->findModel($id);
    //
    //        if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //            return $this->redirect(['view', 'id' => $model->id]);
    //        }
    //
    //        return $this->render('update', [
    //            'model' => $model,
    //        ]);
    //    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
