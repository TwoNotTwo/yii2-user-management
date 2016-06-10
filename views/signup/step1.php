<?php
/**
 * Created by PhpStorm.
 * User: Ganenko.k
 * Date: 10.06.2016
 * Time: 10:11
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('user_management', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-management-signup">
    <h3><?= Html::encode($this->title); ?></h3>
    <p><?= Yii::t('user_management', 'Для регистрации заполните эту анкету:'); ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                //'action' => '/users/singup/signup',

            ]); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]); ?>
            <?= $form->field($model, 'password')->passwordInput(); ?>
            <?= $form->field($model, 'email')->textInput(); ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('user_management', 'Зарегистрироваться'), ['class' => 'btn btn-primary', 'name' => 'signup-button']); ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>

</div>
