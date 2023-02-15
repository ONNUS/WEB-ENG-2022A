@echo off

call .\.script\docker\reset.bat

docker-compose -f .\.docker\default\docker-compose-windows.yml up -d --build
