FROM alpine

RUN apk --update add python3
ADD www /www
EXPOSE 8000
CMD cd /www; python3 -m http.server 8000
