<?php
require('js/imgUpload/extras/Uploader.php');


$upload_dir = 'uploads/userImg';

$uploader = new FileUpload('uploadfile');

// Handle the upload
$result = $uploader->handleUpload($upload_dir);

if (!$result) {
    exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));
}

echo json_encode(array('success' => true));
