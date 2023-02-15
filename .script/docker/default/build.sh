#!/bin/sh

sh .script/docker/stop.sh
sh .script/docker/reset.sh

docker-compose -f .docker/default/docker-compose-linux.yml up -d --build
