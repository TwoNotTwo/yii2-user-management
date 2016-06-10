<?php
/**
 * Created by PhpStorm.
 * User: Ganenko.k
 * Date: 10.06.2016
 * Time: 10:15
 */

namespace twonottwo\user_management\models;

use Yii;
use yii\base\Model;
use common\models\User;


class Signup extends Model {

    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('user_management', 'Пользователь с таким именем существует')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_\/-]+$/', 'message' => 'Использовать можно только цифры и латинские буквы'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('user_management', 'Этот почтовый ящик уже исользуется')],


            ['password', 'required'],
            ['password', 'string', 'min' => 6],

        ];
    }

    public function init(){
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['user_management'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-Ru',
            'basePath' => '@common/modules/Yii2UserManagement/messages',
        ];
    }

    public function attributeLabels(){

        return [
            'username' => Yii::t('user_management', 'Логин'),
            'email' => Yii::t('user_management', 'Почтовый ящик'),
            'password' => Yii::t('user_management', 'Пароль'),

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        //$user->generatePasswordResetToken();
        return $user->save() ? $user : null;
    }
}