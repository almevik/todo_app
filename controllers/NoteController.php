<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\AccessControl;

class NoteController extends ActiveController
{
    public $modelClass = 'app\models\Note';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
    $behaviors = parent::behaviors();

//    $behaviors['authenticator'] = [
//        'class' => HttpBearerAuth::className(),
//        'except' => ['options','login'],
//	];

    return $behaviors;

    }


}