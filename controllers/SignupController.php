<?php
/**
 * Created by PhpStorm.
 * User: Ganenko.k
 * Date: 10.06.2016
 * Time: 10:10
 */

namespace twonottwo\user_management\controllers;

use Yii;
use twonottwo\user_management\models\Signup;
use yii\web\Controller;


class SignupController extends Controller{


    public function actionIndex(){

        $model = new Signup();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('step1', [
            'model' => $model,
        ]);
    }
}