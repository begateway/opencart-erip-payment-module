FROM webdevops/php-nginx:5.6

ENV WEB_DOCUMENT_ROOT=/var/www/html

ARG opencart_version

ENV OPENCART_URL https://github.com/opencart/opencart/archive/${opencart_version}.zip

RUN curl -sSL ${OPENCART_URL} -o /opencart.zip && \
    unzip /opencart.zip -d /tmp && \
    cp -r /tmp/opencart-${opencart_version}/upload/* /var/www/html && \
    cp /var/www/html/config-dist.php /var/www/html/config.php && \
    cp /var/www/html/admin/config-dist.php /var/www/html/admin/config.php && \
    rm -rf /tmp/* && \
    rm -rf /opencart.zip && \
    chown -Rf application.application /var/www && \
    docker-php-ext-install mysql

WORKDIR /var/www/html

VOLUME ["/var/www"]
