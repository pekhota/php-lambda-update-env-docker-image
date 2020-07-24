# Aws lambda env update image

Simple php image to update aws lambda env variables

## Usage

1. Via env variables you need to provide 
AWS_FUNCTION_NAME variable. Ex AWS_FUNCTION_NAME=web123.
2. Via volumes you need to map env file to `/app/source-env` path.
Please make sure that it has no special symbols, coments, etc.
3. Via volumes you need to map your .aws dir to `/root/.aws`

## docker-compose example

```yaml
version: "3"
services:
  app:
    build: ./app
    environment:
      - "AWS_FUNCTION_NAME=web123"
    volumes:
    - "./myenvfile:/app/source-env"
    - "/home/alex/.aws:/root/.aws"
```