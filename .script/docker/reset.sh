#!/bin/sh

sh .script/docker/stop.sh

docker system prune --all --force
