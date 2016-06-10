Yii2. Модуль для управления учетными записями пользователями
============

##Примечание##
Перед установкой выполнить:
- обновление composer
- подключение приложения к БД

Файлы настроек приложения расположены по адресам:
- `backend/config/main.php`, `frontend/config/main.php` и `common/config/main.php` для advanced
- `config/web.php` и `config/console` для basic

###Установка###

Получаем модуль из репозитория
```bash
$ php composer.phar require twonottwo/yii2-user-management "dev-master"
```
либо
```bash
$ composer require twonottwo/yii2-user-management "dev-master"
```
Имя ветки может быть отличным от dev-master

##Подключение модуля к приложению##
В настройках приложения прописываем модуль `users` (`backend/config/main.php` для advanced и `config/web.php` для basic приложения)

```php
'modules' => [
        'users' => [
            'class' => 'twonottwo\user_management\Yii2UserManagement',
        ],
    ],
```
