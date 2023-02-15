@echo off

call .\.script\docker\clear.bat

call git init

docker run -e RUN_LOCAL=true ^
  -e VALIDATE_ALL_CODEBASE=false ^
  -e VALIDATE_PHP=true ^
  -e VALIDATE_PHP_PHPCS=true ^
  -e VALIDATE_PHP_PSALM=true ^
  -e VALIDATE_PHP_PHPSTAN=true ^
  -e VALIDATE_PHP_BUILTIN=true ^
  -e USE_FIND_ALGORITHM=true ^
  -v C:\GitHub\OCS-web-dev-env\onn-web-eng\:/tmp/lint ^
  github/super-linter


call .\.script\docker\restart.bat
