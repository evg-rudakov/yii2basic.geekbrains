<?php

namespace app\controllers;

use app\models\Activity;
use app\models\Calendar;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'contact', 'index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['simple'],
                    ],
                    [
                        'actions' => ['contact'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @throws \yii\base\Exception
     */
    public function actionAddAdmin() {
        $userQuery = User::find()->where(['username' => 'admin']);
        $user = $userQuery->one();
        if (empty($user)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@admin.ru';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
                $adminRole = Yii::$app->authManager->getRole('admin');
                Yii::$app->authManager->assign($adminRole, $user->id);
            } else {
                var_dump($user->errors);
            }
        } else {
            $adminRole = Yii::$app->authManager->getRole('admin');
            Yii::$app->authManager->assign($adminRole, $user->id);
            echo 'админ уже есть';
            var_dump($user);
            var_dump($user->id);
            var_dump($user->attributes['id']);
            var_dump($user['id']);
        }
        die();
    }

    public function actionCreateActivity() {
        $user = User::find()->where(['id'=>3])->one();

        $activity = new Activity();
        //$user = User::findOne(2);
        $activity->user_id = $user->id;
        $activity->title = 'test'.time();
        $activity->body = 'body'.time();
        $activity->end_date = time()+24*3600;
        $activity->start_date = time();

        if (!$activity->save()) {
            var_dump($activity->errors);
        }
        die();
    }

    public function actionFillCalendar() {
        $users = User::find()->all();

        //SELECT * FROM user

        foreach ($users as $user) {
            $calendarRecord = new Calendar();
            $calendarRecord->user_id = $user->id;
            $calendarRecord->activity_id = 2;
            if ($calendarRecord->save() === false){
                var_dump($calendarRecord->id);
                var_dump($calendarRecord->errors);
            };

        }
    }

    public function actionGetUsers()
    {
        $activity = Activity::findOne(2);
        $users = [];

        foreach ($activity->calendarRecords as $calendarRecord) {
            $users[] = $calendarRecord->user;
        }
        var_dump($users);
        $otherUsers = $activity->users;
        var_dump($otherUsers);

    }

    public function actionTest()
    {
        $activity = Activity::findOne(1);
        $author = $activity->user;
        var_dump($author);
    }



//    public function actionTest()
//    {
//        $activity = Activity::find()->where(['id' => 13])->one();
//        var_dump($activity->users);
//        die();
//    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
