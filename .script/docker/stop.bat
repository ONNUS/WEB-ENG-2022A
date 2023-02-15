@echo off

docker-compose -f .\.docker\default\docker-compose-windows.yml stop

docker-compose -f .\.docker\debug\docker-compose-windows.yml stop

@REM docker-compose -f .\.debug\windows\docker-compose.yml stop

@REM docker-compose -f .\.docker\windows\docker-compose.yml down

@REM docker stop $(docker ps -a -q)

@REM docker container stop $(docker container list -q)
