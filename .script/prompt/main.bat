@echo off

:func_menu_main

    call .\.script\header\onnus.bat

    echo ^| Docker ^| Windows ^| Containers ^|
    echo.
    echo Docker image options:
    echo.
    echo 1) Start Default   ^| Quick Start Default Container Image
    echo 2) Start Debug     ^| Quick Start Debug Container Image
    echo.
    echo 3) Default Menu    ^| List of Default Docker Image Commands
    echo 4) Debug Menu      ^| List of Debug Docker Image Commands
    echo.
    echo 5) Super Linter    ^| GitHub's Super-Linter Repo Images
    echo.
    echo 6) Help
    echo 7) Exit
    echo.

set /p int_option=Select your Docker image: 


if %int_option% == 1 goto func_option_1
if %int_option% == 2 goto func_option_2
if %int_option% == 3 goto func_option_3
if %int_option% == 4 goto func_option_4
if %int_option% == 5 goto func_option_5
if %int_option% == 6 goto help
if %int_option% == 7 goto exit


goto func_menu_main


:func_option_1
call .\.script\docker\default\start.bat
call .\.script\prompt\default.bat
exit

:func_option_2
call .\.script\docker\debug\start.bat
call .\.script\prompt\debug.bat
exit

:func_option_3
call .\.script\prompt\default.bat
exit

:func_option_4
call .\.script\prompt\debug.bat
exit

:func_option_5
call .\.script\prompt\linter.bat
goto func_menu_main

:help
cls
echo You selected Help
pause
goto func_menu_main

:exit
cls
echo Goodbye!
exit
