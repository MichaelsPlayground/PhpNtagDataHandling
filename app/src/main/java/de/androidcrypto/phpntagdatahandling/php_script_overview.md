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
http://fluttercrypto.bplaced.net/apps/ntag/select_file5.php
file_editor5.php : stores the filename in a session variable, read the file content in a textarea for editing
                   for saving the new content it calls file_editor5_process.php
                   new button: select file
file_editor5_process.php : saves the content to the file and return to file_editor5_.php for continued working

auth1.php : basic authentication with username and password, is never called directly but from other files
            included in auth_select_file1.php

auth_select_file1.php : same to select_file but with auth check
http://fluttercrypto.bplaced.net/apps/ntag/auth_select_file1.php
for logout:
http://fluttercrypto.bplaced.net/apps/ntag/auth_select_file1.php?logout=1

auth2.php : basic authentication with username and password, is never called directly but from other files
            included in auth_select_file2.php. Small code changing to find auth.pass in separate folder

auth_select_file2.php : same to auth_select_file1.php but runs with auth2.php
http://fluttercrypto.bplaced.net/apps/ntag/auth_select_file2.php
for logout:
http://fluttercrypto.bplaced.net/apps/ntag/auth_select_file2.php?logout=1

generate_password_hash.php : used to generate passphrase hashes, store them im auth.pass
http://fluttercrypto.bplaced.net/apps/ntag/generate_password_hash.php

=========================================
images handling

imageupload1.html : upload an image (jpg, jpeg or png) to images folder, uses image_upload_script1.php
http://fluttercrypto.bplaced.net/apps/ntag/imageupload1.html
image_upload_script1.php : called by imageupload1.html, writes the image to images folder

imageupload2.html : upload an image (jpg, jpeg or png) to a images SUBfolder, select the folder first 
                    uses image_upload_script2.php
http://fluttercrypto.bplaced.net/apps/ntag/imageupload2.html
image_upload_script2.php : called by imageupload2.html, writes the image to images SUBfolder

imageupload3.html : upload an image (jpg, jpeg or png) to a images SUBfolder, select the folder first
                    allows to create a subdirectory, uses image_upload_script3.php
http://fluttercrypto.bplaced.net/apps/ntag/imageupload3.html
image_upload_script3.php : called by imageupload3.html, writes the image to images SUBfolder

create_images_subdirectory.php : creates a subdirectory under images
http://fluttercrypto.bplaced.net/apps/ntag/create_images_subdirectory.php

1-gallery.php : shows the images in images/folder2 as thumbnail and full resolution
                uses 1b-gallery.css and 1c-gallery.js
http://fluttercrypto.bplaced.net/apps/ntag/1-gallery.php

2-caption-gallery.php : shows the images in images/folder1 as thumbnail and full resolution. The
                        thumbnails have the filename as caption
                        uses 2b-caption.gallery.css and 1c-gallery.js
http://fluttercrypto.bplaced.net/apps/ntag/2-caption-gallery.php


=========================================
Main menu handling

main_menu.php : The main menu of the project, protected by auth2.php (test 1234)
http://fluttercrypto.bplaced.net/apps/ntag/main_menu.php
=========================================


http://fluttercrypto.bplaced.net/apps/ntag/

http://fluttercrypto.bplaced.net/apps/ntag/

ntag/confidential is manually created, don't forget to place the .htaccess file manually as well
ntag/images is manually created, .htaccess ??

download sample images (bulk): https://unsample.net/

