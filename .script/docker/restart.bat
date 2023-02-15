@echo off

echo.
echo *** Clearing 'Super-Linter' Docker Containers ***
echo.

call .\.script\docker\clear.bat

call wsl --shutdown

echo.
echo *** Restarting 'Docker Desktop' to fix windows memory leak issue. ***
echo.

powershell.exe -File .\.script\docker\restart.ps1
