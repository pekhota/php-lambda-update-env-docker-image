FROM pekhotaalex/composer-install

WORKDIR /app

COPY . /app

ENV SOURCE_ENV_PATH "/app/source-env"
ENV AWS_REGION "us-east-1"
ENV AWS_FUNCTION_NAME "your-function"

RUN composer install --ignore-platform-reqs

ENTRYPOINT php index.php