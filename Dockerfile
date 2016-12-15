FROM greut/laravel:latest
LABEL maintainer="Yoan Blanc <yoan@dosimple.ch>"

EXPOSE 80 6001

RUN set -xe \
    && apk add --no-cache \
        supervisor \
        tini \
    && rm -rf /var/cache/apk/* 

# Supervisord stuff
COPY docker/supervisord.conf /etc/supervisord.conf

# Boot is using Supervisor.
COPY docker/boot.sh /usr/local/bin/boot.sh
RUN set -xe \
    && chmod +x /usr/local/bin/boot.sh

USER root
ENTRYPOINT [ "/sbin/tini", "--" ]
CMD [ "/usr/local/bin/boot.sh" ]
