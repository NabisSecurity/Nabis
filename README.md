# Nabis
Утилита с открытым кодом для прокси сервера, которая в меру своих возможностей блокирует C2 трафик в сети

То что планировалось
------------------------------------------
В итоге не получилось, в репозитории лежат наработки.
Планировалась инфроструктура вида:

сервер -> прокси -> интернет

Где на прокси с помощью nginx ограничивается вход только самим сервером по его IP и сначала блокируются соединения с плохими IP полученными через открытые базы с малварами, фишами и C2(обновлялись бы каждые 5 минут), а затем сами пакеты кешируются и анализируются Zeek/WhiteShark и лишь затем пересылаются.

На том же сервере где прокси должна была быть UI админская консоль.

То что получилось
------------------------------------------
Удалось сделать простой прокси с доступом для заранее задаваемого в коде IP и 403 ошибкой для всех кроме него. Но в итоге запросы с сервера вообще никак не отсеиваются прокси.

Админка упёрлась в слабые возможности nginx в плане аутентификации и из-за этого была реализована упрощённая версия с отображением логов, тем не менее защищена паролем.

Изначально логин и пароль к ней admin 12345, планировалось добавить инструкцию по смене пароля при настройке под свой сервер.

Доступна она на 2000 порту.

Вся система реализовывалась в рамках debian 11, поэтому для других разновидностей линукс могли бы требоваться другие инструкции.

Демонстрация
-----------------------------------------
Прямо сейчас есть сервер c такими настройками, я сниму с него ограничения на доступ, чтобы кто угодно мог использовать его как прокси.

http://45.143.93.94:2000/ UI с логами(логин admin пароль 12345)

45.143.93.94 порт 8080 для прокси


Повторить у себя полученный результат
-----------------------------------------
Для реализации аналогичного сервера nginx.conf и .htpasswd надо положить в etc/nginx/
В nginx.conf следует на строке 60 поменять айпи на тот который принадлежит нашему серверу, можно открыть доступ другим айпи или вообще убрать ограничение для других айпи.

Следует также добавить в папку var/www/ папку log_api приложенную в репозитории

Требуется установка следующего ПО:

nginx

php 7.4

php-ftp

apache2-utils
