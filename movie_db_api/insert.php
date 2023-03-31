<?php

require ('settings.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<H2> Insert Director </H2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <input type="text" id="dir-fname" name="dir-fname" placeholder="First Name">
    <input type="text" id="dir-lname" name="dir-lname" placeholder="Last Name">
    <input type="file" id="dir-img" name="dir-img"> <br><br>
    <input type="submit" name="submit-dir">
    <input type="reset">
    <br><br>
    <!-- <input type="submit" name="tulosta" value="Tulosta käyttäjät">
    <br><br> -->

    <!-- <H2>Poista käyttäjä:</H2>
    <p>Anna poistettavan käyttäjän email-osoite:</p>
    <input type="text" name="poista_email" placeholder=placeholder@email.com>
    <input type="submit" name="poista" value="Poista käyttäjä"> -->

</form>
    
<?php

// $dir_fname = $_POST['dir-fname'];
// $dir_lname = $_POST['dir-lname'];
// $dir_img = $_POST['dir-img'];
// $sql_dir = "INSERT INTO directors (dfname, dlname, dimg) VALUES ('$dir_fname', '$dir_lname', '$filename')";

// if (isset($_POST['submit-dir'])) {
//     mysqli_query($conn, $sql_dir);
// }

// Uploads files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit-dir'])) { // if save button on the form is clicked

        // name of the uploaded file
        $filename = $_FILES['dir-img']['name'];
        print_r($_FILES);

        // destination of the file on the server
        $destination = 'img/' . $filename;

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['dir-img']['tmp_name'];

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "File has to be in .jpg, .jpeg, .png or .gif format";
        }
        
        else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $dir_fname = $_POST['dir-fname'];
            $dir_lname = $_POST['dir-lname'];

            $sql_dir = "INSERT INTO directors (dfname, dlname, dimg) VALUES ('$dir_fname', '$dir_lname', '$filename')";
            
            if (mysqli_query($conn, $sql_dir)) {
                echo "<br> Tiedosto ladattu onnistuneesti!";
            }
        else {
            echo "File could not be uploaded";
        }
        }
        } 
    }
}             


?>


</body>
</html>