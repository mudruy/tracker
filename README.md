site tracking system
=====

Symfony 2.8

git clone https://github.com/mudruy/tracker.git . <br />
wget https://getcomposer.org/download/1.0.0-alpha11/composer.phar <br />
php composer.phar update <br />
надо будет ввести параметры подключения к mysql бд <br />


на локальном проверочном сайте размещаем картинку  <br />
<img src="http://localhost:8000/banner" width="0" height="0" style="visibility: hidden;" /> <br />

Если база еще не создана, можно ее создать <br /> 
php app/console doctrine:database:create <br />

Потом надо забросить структуры базы  <br />
php app/console doctrine:schema:update --force <br />

Грузим инит данные - фиктуры <br />
php app/console doctrine:fixtures:load <br />

Запускаем веб сервер тестовый <br />
php app/console cache:clear;php app/console server:run <br />


смотрим http://localhost:8000/ <br />
