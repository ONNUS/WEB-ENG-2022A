#!/bin/sh

git init

sh .script/docker/clear.sh

docker run -e RUN_LOCAL=true \
    -e VALIDATE_ALL_CODEBASE=false \
    -e VALIDATE_PHP=true \
    -e VALIDATE_PHP_PHPCS=true \
    -e VALIDATE_PHP_PSALM=true \
    -e VALIDATE_PHP_PHPSTAN=true \
    -e VALIDATE_PHP_BUILTIN=true \
    -e USE_FIND_ALGORITHM=true \
    -v "$PWD/onn-web-eng:/tmp/lint" github/super-linter

sh .script/docker/clear.sh