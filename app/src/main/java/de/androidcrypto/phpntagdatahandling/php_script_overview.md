# PHP script overview

file_editor.php
http://fluttercrypto.bplaced.net/apps/ntag/file_editor.php

file.html
http://fluttercrypto.bplaced.net/apps/ntag/file.html
file_operations.php



fileupload.html : Select a file to upload to /uploads folder
http://fluttercrypto.bplaced.net/apps/ntag/fileupload.html

fileUploadScript.php : used by fileupload.html to upload to /uploads folder


fileUploadScript2.php : used by Java sendHttpPost method to upload to /uploads folder
http://fluttercrypto.bplaced.net/apps/ntag/fileUploadScript2.php


file_exists.php : checks for some files in uploads folder
http://fluttercrypto.bplaced.net/apps/ntag/file_exists.php

zip_download.php : zip all files in uploads folder and download them as uploads.zip file,
If the folder is empty it aborted the script.
http://fluttercrypto.bplaced.net/apps/ntag/zip_download.php

simplest_file_editor.php : is working with a fixed file, not stylish
http://fluttercrypto.bplaced.net/apps/ntag/simplest_file_editor.php

select_file.php : working, showing all files in /uploads folder
http://fluttercrypto.bplaced.net/apps/ntag/select_file.php

file1.html
http://fluttercrypto.bplaced.net/apps/ntag/file1.html
file1.php

file_editor2.php : fixed filename test2.md in /uploads folder
http://fluttercrypto.bplaced.net/apps/ntag/file_editor2.php
file_editor2_process.php

// ### working code
select_file4.php : select a file in a fixed directory: uploads and call file_editor4.php
file_editor4.php : stores the filename in a session variable, read the file content in a textarea for editing
                   for saving the new content it calls file_editor4_process.php 
file_editor4_process.php : saves the content to the file and return to file_editor4_.php for continued working

select_file5.php : select a file in a fixed directory: uploads and call file_editor5.php
file_editor5.php : stores the filename in a session variable, read the file content in a textarea for editing
                   for saving the new content it calls file_editor5_process.php
                   new button: select file
file_editor5_process.php : saves the content to the file and return to file_editor5_.php for continued working

auth1.php : basic authentication with username and password, is never called directly but from other files
            included in auth_select_file1.php


auth_select_file1.php
http://fluttercrypto.bplaced.net/apps/ntag/auth_select_file1.php
for logout:
http://fluttercrypto.bplaced.net/apps/ntag/auth_select_file1.php?logout=1

generate_password_hash.php : used to generate passphrase hashes, store them im auth.pass
http://fluttercrypto.bplaced.net/apps/ntag/generate_password_hash.php


http://fluttercrypto.bplaced.net/apps/ntag/

