@echo off

:: Variables
set php=c:\Ampps\php\php.exe
set omnifilesender=c:\OmniFile\OmniFile_Sender.php

echo.
echo  Opener: Starting sender script with filepath ..
%php% %omnifilesender% %1

echo.

::pause
exit