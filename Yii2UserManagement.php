<?php

namespace twonottwo\user_management;

use Yii;
/**
 * users module definition class
 */
class Yii2UserManagement extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'twonottwo\user_management\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
        // custom initialization code goes here
    }
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['db_rbac'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-Ru',
            'basePath' => '@twonottwo/user_management/messages',
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/user_management/' . $category, $message, $params, $language);
    }
}
