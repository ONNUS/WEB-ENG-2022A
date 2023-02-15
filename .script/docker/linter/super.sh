#!/bin/sh

git init

sh .script/docker/clear.sh

docker run -e RUN_LOCAL=true \
    -e USE_FIND_ALGORITHM=true \
    -e VALIDATE_ALL_CODEBASE=false \
    -v "$PWD/onn-web-eng/onn-web-eng/:/tmp/lint" github/super-linter

sh .script/docker/clear.sh