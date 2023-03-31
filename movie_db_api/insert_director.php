<?php

require('settings.php');

if(isset($_POST)) {
    $data = file_get_contents("php://input");
    $director = json_decode($data, true);
    // echo $director['firstName']." ". $director['lastName'];
    // print_r($director['img']);
    // print_r($director);
    print_r($data);

    
        // // Check if the dir-img array key exists
        // if (isset($_FILES['dir-img'])) {

        //     // name of the uploaded file
        //     $filename = $_FILES['dir-img']['name'];

        //     // destination of the file on the server
        //     $destination = 'dir_img/' . $filename;

        //     // get the file extension
        //     $extension = pathinfo($filename, PATHINFO_EXTENSION);

        //     // the physical file on a temporary uploads directory on the server
        //     $file = $_FILES['dir-img']['tmp_name'];

        //     if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        //         echo "File has to be in .jpg, .jpeg, .png or .gif format";
        //     }
        //     else {
        //     // move the uploaded (temporary) file to the specified destination
        //         if (move_uploaded_file($file, $destination)) {

        //             $sql = "INSERT INTO directors (dfname, dlname, dimg) 
        //             VALUES ('" .$director['firstName']. "', '" .$director['lastName']. "', '" .$filename. "')";

        //             mysqli_query($conn, $sql);
                    
        //             // mysqli_query($conn, "INSERT INTO directors (dfname, dlname, dimg) 
        //             // VALUES ('" .$director['firstName']. "', '" .$director['lastName']. "', '" .$filename. "')");
                
        //             if (mysqli_query($conn, $sql)) {
        //                 echo "<br> Information uploaded successfully!";
        //             }
        //         else {
        //             echo "Upload failed!";
        //         }
        //     }
        // }
    // }  

    // mysqli_query($conn, "INSERT INTO directors (dfname, dlname) 
    // VALUES ('" .$director['firstName']. "', '" .$director['lastName']. "')"); 
    
}

?>