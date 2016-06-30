FROM alpine


RUN apk --update add python3

ADD www /www
WORKDIR /www

EXPOSE 80
CMD ["python3", "-m", "http.server", "80"]
