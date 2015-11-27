<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_val = $_POST['beer'];
    $target_dir = "./uploads/";
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 1500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<p> Sorry, your file was not uploaded. </p>";
        echo ("<p> Redirecting in 3 seconds </p>");
        header( "refresh:3;url=./admin.php" );
// if everything is ok, try to upload file

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

            //String manipulation
            $s = explode(".", $filename);
            $s[0] = "$selected_val";
            $y = ( implode(".",$s) );
            $y = $target_dir . $y;

            //renames the uploaded file with the selected value from option value
           rename ("$target_file", "$y");
           header("Location: ./admin.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
            header( "refresh:5;url=./admin.php.php" );
        }
    }
}
?>