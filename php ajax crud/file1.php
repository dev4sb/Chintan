<?php




       

$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}

echo "</p>";
echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);
print "</pre>";



          ?>


          <!DOCTYPE html>
          <html>
          <head>
            <meta charset="utf-8">
            <title></title>
          </head>
          <body>
            <form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
          </body>
          </html>