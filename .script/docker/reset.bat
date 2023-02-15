@echo off

call .\.script\docker\stop.bat

docker system prune --all --force
