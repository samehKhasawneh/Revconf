
<html>
<head>
    <script src="jquery.min.js"></script>
    <script src="pdf.worker.js"></script>
    <script src="pdf.js"></script>
</head>
<body>
<form name="myform"  action="../paperSubmit.php" method="post">
    <input type="text" hidden="hidden"  name="error" id="error">
</form>



</body>

</html>
<?php
$target_dir = "uploads/";
$file = basename($_FILES["fileToUpload"]["name"]);
echo $file;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
echo $target_file;;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo $FileType;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    echo "1";
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;

}
// Allow certain file formats
if($FileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        rename($target_file,$target_dir."5.pdf");
        $newfile = $target_dir."5.pdf";

        checkPages();


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/**
 *
 */

function checkPages()
{
    echo '<script>
console.log("hello");
alert("hello");
var pages=0;

var dir = "uploads/5.pdf";
PDFJS.workerSrc = "http://localhost/Revcon/includes/pdf.worker.js";
PDFJS.getDocument(dir).then(function(pdf)

{


pages= pdf.pdfInfo.numPages;
alert(pages);
if (pages>1)
{

$("#error").val("Your paper have more than 7 pages, please follow IEEE Standards.");

document.myform.submit();

}




}

);

</script>' ;



}
?>



