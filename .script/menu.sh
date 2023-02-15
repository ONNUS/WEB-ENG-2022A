#!/usr/bin/env bash

int_menu_onload=0


if [ "$int_menu_onload" = 1 ]; then

    echo
    echo '*** Load Default Docker Image ***'
    echo

    sh .script/docker/default/start.sh
    sh .script/prompt/default.sh

elif [ "$int_menu_onload" = 2 ]; then

    echo
    echo '*** Loading Debug Docker Image ***'
    echo

    sh .script/docker/debug/start.sh
    sh .script/prompt/debug.sh

else
    echo '*** No Docker Image Pre-Loaded ***'
fi


sh .script/prompt/main.sh
