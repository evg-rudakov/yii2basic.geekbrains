<?php

namespace app\controllers;

use Yii;
use app\models\Calendar;
use app\models\CalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use edofre\fullcalendar\models\Event;

/**
 * CalendarController implements the CRUD actions for Calendar model.
 */
class CalendarController extends Controller
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
     * Lists all Calendar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Calendar model.
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
     * Creates a new Calendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Calendar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Calendar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Calendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Calendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Calendar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @param $start
     * @param $end
     * @return array
     */
    public function actionEvents($id, $start, $end)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $events = [
            new Event([
                'title' => 'Appointment #' . rand(1, 999),
                'start' => '2016-03-18T14:00:00',
            ]),
            // Everything editable
            new Event([
                'id' => uniqid(),
                'title' => 'Appointment #' . rand(1, 999),
                'start' => '2019-07-17T12:30:00',
                'end' => '2019-07-24T13:30:00',
                'editable' => true,
                'startEditable' => true,
                'durationEditable' => true,
                'color' => 'red',
                'url' => \yii\helpers\Url::to(['view', 'id'=>12])
            ]),
            // No overlap
            new Event([
                'id' => uniqid(),
                'title' => 'Appointment #' . rand(1, 999),
                'start' => '2019-03-17T12:30:00',
                'end' => '2019-07-24T13:30:00',
                'overlap' => false, // Overlap is default true
                'editable' => true,
                'startEditable' => true,
                'durationEditable' => true,
            ]),
            // Only duration editable
            new Event([
                'id' => uniqid(),
                'title' => 'Appointment #' . rand(1, 999),
                'start' => '2016-03-16T11:00:00',
                'end' => '2016-03-16T11:30:00',
                'startEditable' => false,
                'durationEditable' => true,
            ]),
            // Only start editable
            new Event([
                'id' => uniqid(),
                'title' => 'Appointment #' . rand(1, 999),
                'start' => '2016-03-15T14:00:00',
                'end' => '2016-03-15T15:30:00',
                'startEditable' => true,
                'durationEditable' => false,
            ]),
        ];

        return $events;
    }
}
