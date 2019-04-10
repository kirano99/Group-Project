<?php
    require 'db.php' ;
        
        $email = mysqli_real_escape_string($mysqli, $_POST[email]);
        $firstname = mysqli_real_escape_string($mysqli, $_POST[firstname]);
        $lastname = mysqli_real_escape_string($mysqli, $_POST[lastname]);
        $course = mysqli_real_escape_string($mysqli, $_POST[course]);
        $studentID = mysqli_real_escape_string($mysqli, $_POST[studentID]);
        $password = mysqli_real_escape_string($mysqli, $_POST[password]);
        
        $sql = "INSERT INTO users (U_email, U_fname, U_lname, U_course, StudentID, password) VALUES ('$email', '$firstname', '$lastname', '$course', '$studentID', '$password')";
        
        if (mysqli_query($mysqli, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    
    mysqli_close($mysqli);
?>
