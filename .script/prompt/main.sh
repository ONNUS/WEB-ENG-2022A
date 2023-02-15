#!/usr/bin/env bash

func_menu_main() {

  sh .script/header/onnus.sh

  echo "| Docker | Linux | Containers |"
  echo 
  echo "Docker image options:"
  echo 
  echo "1) Start Default  | Quick Start Default Container Image"
  echo "2) Start Debug    | Quick Start Debug Container Image"
  echo 
  echo "3) Default Menu   | List of Default Docker Image Commands"
  echo "4) Debug Menu     | List of Debug Docker Image Commands"
  echo 
  echo "5) Super Linter   | GitHub's Super-Linter Repo Images"
  echo 
  echo "6) Help"
  echo "7) Exit"
  echo  

}


func_action_end() {

  echo.
  echo "Press Enter to continue..."

  read

  sh .script/prompt/default.sh

}


func_menu_main

read -p "Select your Docker image: " int_option


case $int_option in
  1) 
    sh .script/docker/default/start.sh
    func_action_end
    sh .script/prompt/default.sh
    ;;
  2)
    sh .script/docker/debug/start.sh
    func_action_end
    sh .script/prompt/debug.sh
    ;;
  3)
    sh .script/prompt/default.sh
    ;;
  4)
    sh .script/prompt/debug.sh
    ;;
  5)
    sh .script/prompt/linter.sh
    ;;
  6)
    clear
    func_menu_main
    ;;
  7)
    echo "Exiting Prompt Options..."
    exit
    ;;
  *)
    echo "Invalid option. Available options:"
    ;;
esac
