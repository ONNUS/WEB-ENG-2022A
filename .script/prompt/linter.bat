@echo off

:func_menu_default

    call .\.script\header\onnus.bat

    echo ^| Docker ^| Linux ^| Super-Linter ^| Containers ^|
    echo.
    echo Docker Super-Linter options:
    echo.
    echo 1) Super-Linter            ^| Run all Linters
    echo 2) PHP Linters             ^| Run only PHP Linters
    echo 3) Bash ^& Batch Linters    ^| Run Bash Linters
    echo 4) HTML Linters            ^| Run HTML Linters
    echo 5) CSS Linters             ^| Run CSS Linters
    echo 6) JavaScript Linters      ^| Run JavaScript Linters
    echo 7) MarkDown Linters        ^| Run MarkDown Linters
    echo.
    echo 8) Restart Docker          ^| Restarts Docker to clear memory
    echo.
    echo 9) Back                    ^| Go Back to Main Menu
    echo.
    echo 10) Help
    echo 11) Exit
    echo.

set /p int_action=Select your Docker Action:

if %int_action% == 1 goto func_action_1
if %int_action% == 2 goto func_action_2
if %int_action% == 3 goto func_action_3
if %int_action% == 4 goto func_action_4
if %int_action% == 5 goto func_action_5
if %int_action% == 6 goto func_action_6
if %int_action% == 7 goto func_action_7
if %int_action% == 8 goto func_action_8
if %int_action% == 9 goto menu_main
if %int_action% == 10 goto menu_help
if %int_action% == 11 goto action_exit


goto func_menu_default


:func_action_1
call .\.script\docker\linter\super.bat
pause
goto func_menu_default

:func_action_2
call .\.script\docker\linter\php.bat
pause
goto func_menu_default

:func_action_3
call .\.script\docker\linter\bash_batch.bat
pause
goto func_menu_default

:func_action_4
call .\.script\docker\linter\html.bat
pause
goto func_menu_default

:func_action_5
call .\.script\docker\linter\css.bat
pause
goto func_menu_default

:func_action_6
call .\.script\docker\linter\css.bat
pause
goto func_menu_default

:func_action_7
call .\.script\docker\linter\css.bat
pause
goto func_menu_default

:func_action_8
call .\.script\docker\restart.bat
pause
goto func_menu_default

:menu_main
call .\.script\prompt\main.bat
exit

:menu_help
cls
echo You selected Help
pause
goto func_menu_default

:action_exit
cls
echo Goodbye!
exit
