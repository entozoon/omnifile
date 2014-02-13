OmniFile
========

Open files from a remote computer, even within a VM

A sexy triplet of php files that can be used to open a file on one computer using another
(such as from within a VM) .. SICK RIGHT?!

Requirements for main computer:
- apache/php with OmniFile_Listener.php available, but apache MUST be running from commandline not wamp or whatever.
  to do so, just have c:\wamp\bin\apache\httpd.exe running
- desired filetypes set to 'open with' OmniFile_Opener.bat

Requirements for remote computer:
- PHP installed and available from commandline
- Must be able to access the apache server on the main computer (it is possible from within a VM!)

Requirements for these files:
- Put OmniFile_Listener.php on the main computer, and the others on the remote computer.
- Check/Set the variables in all three files.

How it works:
1. Remote computer double clicks file in the main \\computer, which is 
   set to 'open with' the batch file OmniFile_Opener.bat
2. The batch file runs a php script (OmniFile_Sender.php)
3. The main computer has a listener (OmniFile_Listener.php) which is invoked and opens the given filename


