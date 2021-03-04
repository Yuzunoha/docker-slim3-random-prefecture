FROM php:7.4-fpm

# 変数を宣言する
ARG DOCKER_UID=${DOCKER_UID}
ARG DOCKER_USER=docker
ARG DOCKER_PASSWORD=docker

# composerをインストールする
RUN curl -sS https://getcomposer.org/composer-2.phar -o /usr/local/bin/composer && chmod +x /usr/local/bin/composer

# Node.jsをダウンロードする
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

# パッケージをインストールする
RUN apt-get update \
  && apt-get install -y git zip unzip \
  && apt-get install -y sudo \
  && apt-get install -y libicu-dev \
  && apt-get install -y libonig-dev \
  && apt-get install -y nodejs \
  && npm install -g n \
  && n stable \
  && docker-php-ext-install pdo_mysql intl

# ユーザを作成する
RUN useradd -m ${DOCKER_USER} -u ${DOCKER_UID}
RUN echo "${DOCKER_USER}:${DOCKER_PASSWORD}" | chpasswd

# 作成したユーザのサブグループにsudoを追加する
RUN usermod -aG sudo ${DOCKER_USER}

# htmlディレクトリの読み書き権限を設定する
RUN chmod -R 777 /var/www/html

# 作成したユーザに切り替える
USER ${DOCKER_USER}

# 作業ディレクトリを変更する
WORKDIR /var/www/html
