FROM nginx:1.17.8-alpine

RUN addgroup -g 1000 -S www-group && \
    adduser -u 1000 -S www-data -G www-group

RUN chown -R www-data:www-group /var/log && \
  apk update && apk add bash && \
  touch /var/run/nginx.pid && \
  chown -R www-data:www-group /var/run/nginx.pid && \
  chown -R www-data:www-group /var/cache/nginx

COPY --chown=www-data:www-group ./.docker/nginx/news.conf /etc/nginx/conf.d/
COPY --chown=www-data:www-group ./.docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY --chown=www-data:www-group ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY --chown=www-data:www-group . /var/www/landinglk

USER www-data

EXPOSE 8080 1443

CMD ["nginx", "-g", "daemon off;"]


