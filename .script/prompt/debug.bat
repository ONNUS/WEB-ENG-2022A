@echo off

:func_menu_debug

    call .\.script\header\onnus.bat

    echo ^| Docker ^| Linux ^| Debug ^| Containers ^|
    echo. 
    echo Debug Docker options:
    echo. 
    echo 1) Start           ^| Debug Container Image
    echo 2) Build           ^| Create Debug Container Image
    echo 3) Stop            ^| Kills All Docker Containers
    echo 4) Reset           ^| Restarts All Docker Containers
    echo 5) Clear           ^| Clean Up of All Docker Containers
    echo. 
    echo 6) Main            ^| Return to Main Menu
    echo. 
    echo 7) Help
    echo 8) Exit
    echo.

set /p int_action=Select your Docker image: 

if %int_action% == 1 goto action_start
if %int_action% == 2 goto action_build
if %int_action% == 3 goto action_stop
if %int_action% == 4 goto action_reset
if %int_action% == 5 goto action_clear
if %int_action% == 6 goto menu_main
if %int_action% == 7 goto menu_help
if %int_action% == 8 goto action_exit


goto func_menu_debug


:action_start
call .\.script\docker\debug\start.bat
pause
goto func_menu_debug

:action_build
call .\.script\docker\debug\build.bat
pause
goto func_menu_debug

:action_stop
call .\.script\docker\stop.bat
pause
goto func_menu_debug

:action_reset
call .\.script\docker\reset.bat
pause
goto func_menu_debug

:action_clear
call .\.script\docker\clear.bat
pause
goto func_menu_debug

:menu_main
call .\.script\prompt\main.bat
exit

:menu_help
cls
echo You selected Help
pause
goto func_menu_debug

:action_exit
cls
echo Goodbye!
exit