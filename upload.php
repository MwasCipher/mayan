<?php 
if (isset($_POST['upload'])) {  
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 100000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "uploads/".$fileNameNew;

                move_uploaded_file($fileTmpname, $fileDestination);
                header("Location: upload.php?uploadsuccess");
                
            }else {
                echo 'File is Too Big!';
            }
            
        }else {
            echo 'Error Encountered Uploading File!';
        }   

    }else {
        echo 'You Cannot Upload This Type of File!';
    }      
    
}
?>

