<?php


/*
 * A sexy triplet of php files that can be used to open a file on one computer using another
 * (such as from within a VM) .. SICK RIGHT?!
 * This is the listener file that lives on the computer that actually has the file to be opened
 * 
 * Requirements for main computer:
 * - apache/php with OmniFile_Listener.php available, but apache MUST be running from commandline not wamp or whatever.
 *   to do so, just have c:\wamp\bin\apache\httpd.exe running
 * - desired filetypes set to 'open with' OmniFile_Opener.bat
 * 
 * Requirements for remote computer:
 * - PHP installed and available from commandline
 * - Must be able to access the apache server on the main computer (it is possible from within a VM!)
 * 
 * Requirements for these files:
 * - Put OmniFile_Listener.php on the main computer, and the others on the remote computer.
 * - Check/Set the variables in all three files.
 * 
 * How it works:
 * 1. Remote computer double clicks file in the main \\computer, which is 
 *    set to 'open with' the batch file OmniFile_Opener.bat
 * 2. The batch file runs a php script (OmniFile_Sender.php)
 * 3. The main computer has a listener (OmniFile_Listener.php) which is invoked and opens the given filename
 * 
 */

// Variables
// in my case, I've shared my unsorted folder with the VM, so as far as it knows it's E: but that's wrong
$realPath = "R:\Manor\Unsorted";

if (!empty($_GET['filepath'])) {
	$filepath = urldecode($_GET['filepath']);

	// It thinks it's on E:\ .. so chop it out and replace with $realPath
	$filepath = $realPath . substr($filepath, 2, strlen($filepath));

	echo " Listener: Trying to open this file:\n\n".$filepath." ..\n";

	$result = shell_exec('start "Opened by OmniFile" "'.$filepath.'" && exit');

	#echo $result;
}
else {
	print_r("This probably wouldn't even show this error so fuck it.");
}



?>