#!/usr/bin/env bash

func_menu_default() {

  sh .script/header/onnus.sh

  echo "| Docker | Linux | Super-Linter | Containers |"
  echo
  echo "Docker Super-Linter options:"
  echo
  echo "1) Super-Linter     | Run all Linters"
  echo "2) PHP Linters      | Run only PHP Linters"
  echo "3) Bash Linters     | Run Bash Linters"
  echo "4) CSS Linters      | Run CSS Linters"
  echo "5) MD Linters       | Run MD Linters"
  echo
  echo "6) Back             | Go Back to Main Menu"
  echo
  echo "7) Help"
  echo "8) Exit"
  echo

}


func_action_end() {

  echo
  echo "Press Enter to continue..."

  read

  sh .script/prompt/linter.sh

}


func_menu_default

read -p "Select your Docker Action: " int_action


case $int_action in
  1) 
    sh .script/docker/linter/super.sh
    func_action_end
    ;;
  2)
    sh .script/docker/linter/php.sh
    func_action_end
    ;;
  3)
    sh .script/docker/linter/bash.sh
    func_action_end
    ;;
  4)
    sh .script/docker/linter/css.sh
    func_action_end
    ;;
  5)
    sh .script/docker/linter/md.sh
    func_action_end
    ;;
  6)
    sh .script/prompt/main.sh
    ;;
  7)
    clear
    func_action_end
    ;;
  8)
    echo "Exiting Prompt Options..."
    exit
    ;;
  *)
    echo "Invalid option. Available options:"
    ;;
esac