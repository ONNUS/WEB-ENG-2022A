#!/usr/bin/env bash

func_menu_debug() {

  sh .script/header/onnus.sh

  echo "| Docker | Linux | Debug | Containers |"
  echo 
  echo "Docker options:"
  echo 
  echo "1) Start    | Debug Container Image |"
  echo "2) Build    | Creates Debug Container Image |"
  echo "3) Stop     | Kills All Docker Containers |"
  echo "4) Reset    | Restarts All Docker Containers |"
  echo "5) Clear    | Clean Up of All Docker Containers |"
  echo 
  echo "6) Main     | Go Back to Main Menu"
  echo 
  echo "7) Help"
  echo "8) Exit"
  echo  

}

func_action_end() {
  echo "Press Enter to continue..."
  read
  sh .script/prompt/debug.sh
}


func_menu_debug

read -p "Select your Docker Action: " int_action


case $int_action in
  1) 
    sh .script/docker/debug/start.sh
    func_action_end
    ;;
  2)
    sh .script/docker/debug/build.sh
    func_action_end
    ;;
  3)
    sh .script/docker/stop.sh
    func_action_end
    ;;
  4)
    sh .script/docker/reset.sh
    func_action_end
    ;;
  5)
    sh .script/docker/clear.sh
    func_action_end
    ;;
  6)
    sh .script/prompt/main.sh
    ;;
  7)
    clear
    func_menu_debug
    ;;
  8)
    echo "Exiting Prompt Options..."
    exit
    ;;
  *)
    echo "Invalid option. Available options:"
    ;;
esac