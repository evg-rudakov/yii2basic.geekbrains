
#инструкция FROM - указывает на базе какого обараза будем собирать наш контейнер.
FROM ubuntu:latest

#инструкция RUN - указывает какую команду нужно выполнить внутри образа. обновим индекс пакетов
RUN apt-get update

RUN apt-get install -y apache2 apache2-utils curl gnupg wget
RUN a2enmod rewrite

#Инструкция ENV задает переменные окружения с именем <key> и значением <value>.
#Это значение будет находиться в окружении всех команд потомков Dockerfile и могут быть использованы как обычные переменные окружения.
ENV TZ=Europe/Moscow

#указываем временную зону для нашего образа.
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get install -y git python3 perl \
    php nano

#устанавливаем php расширения
RUN apt-get install -y \
    php-pdo php-pdo-mysql \
    php-mbstring php-tokenizer \
    php-xml php-simplexml php-zip \
    php-opcache php-iconv php-intl \
    php-json php-gd php-ctype php-oauth \
    php-apcu php-imagick php-xdebug \
    php-memcached php-ftp php-imap \
    php-curl iputils-ping

#после завершения установок всех пакетов - обновим индекс
RUN apt-get update

#откроем 80 порт
EXPOSE 80

#добавим в контейнер конфигурационный файл php.ini, расположим его на стаднатрном для ubuntu месте
ADD ./docker/conf/php/php.ini /etc/php/7.2/apache2/php.ini

#обязательно добавим конфигурации xdebug
ADD ./docker/conf/php/xdebug.ini /etc/php/7.2/mods-available/xdebug.ini

#добавим в контейнер конфигурационный файл для apache, расположим его на стаднатрном для ubuntu месте
ADD ./docker/conf/apache/apache2.conf /etc/apache2/apache2.conf

#удалим содержащиеся файлы в этих папках, потому что вскоре там будут наши
RUN rm -R /etc/apache2/sites-enabled/* /etc/apache2/sites-available/* /var/www/*

#добавим конфигурацонный файл для виртуального сервера

#укажим дирректорию /var/www как рабочую
WORKDIR /var/www

#запускаем процес apache2 в нормальном режиме (На переднем плане).
#Пока живет это процесс, живет и контейнер.
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
