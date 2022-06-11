FROM alpine:3.14
LABEL "MAINTAINER" "Bartłomiej Jakubowski"

RUN apk add --update lighttpd
RUN apk add php7 php7-fpm php7-opcache php7-cgi

COPY lighttpd.conf /etc/lighttpd/
COPY index.php /var/www/
RUN echo $(date '+%Y-%m-%d %H:%M:%S') Bartłomiej Jakubowski port 8081 >> /var/log/lighttpd/access.log

EXPOSE 80 
CMD [ "lighttpd" ,"-D", "-f","/etc/lighttpd/lighttpd.conf" ]
