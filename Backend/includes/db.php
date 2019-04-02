<?php
        //saves the login details for the local database
        $servername = 'barnumdesigns.gigapages.net';
        $dbname = 'barnunpage_swanhub';
        $username = 'barnunpage_Admin';
        $password = 'BnB~9r,+';

        //establishes a connection with the database using MySQli
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
?>