<?php
$uploads_dir = '/img';
$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileSize = $_FILES['file']['size'];

if (move_uploaded_file($_FILES["file"]["tmp_name"], ".$uploads_dir/$fileName")) {
    echo "The image has been uploaded to img  <br><a href='./index.php'>Upload</a>";
} else {
    echo "The image failed to move <br><a href='./index.php'>back</a>";
}
