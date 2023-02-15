
set int_menu_onload=0


if %int_menu_onload% == 1 (
  echo *** Load Default Docker Image ***
) else if %int_menu_onload% == 2 (
  echo *** Load Debug Docker Image ***
) else (
  echo *** No Docker Image Pre-Loaded ***
)


call .\.script\prompt\main.bat
