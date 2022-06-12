FROM alpine:3.14
LABEL "MAINTAINER" "Bartłomiej Jakubowski"

RUN apk add --update lighttpd
RUN apk add php7-cgi php7-curl php7-json

COPY lighttpd.conf /etc/lighttpd/
COPY index.php /var/www/
RUN echo $(date '+%Y-%m-%d %H:%M:%S') Bartłomiej Jakubowski port 8081 >> /var/log/lighttpd/access.log

EXPOSE 80 
CMD [ "lighttpd" ,"-D", "-f","/etc/lighttpd/lighttpd.conf" ]
