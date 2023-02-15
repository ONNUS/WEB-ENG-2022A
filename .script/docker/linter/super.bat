@echo off

call .\.script\docker\clear.bat

call git init

docker run -e RUN_LOCAL=true ^
  -e USE_FIND_ALGORITHM=true ^
  -v C:\GitHub\OCS-web-dev-env\onn-web-eng\:/tmp/lint ^
  github/super-linter


call .\.script\docker\restart.bat
