<?php

    if ( !isset( $_POST["username"] ) )
    {
        die("Username is required.");
    }

    if ( !isset( $_POST["password"] ) )
    {
        die("Password is required.");
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "database.php";
    $username_exist = $database->query( " SELECT * FROM users WHERE username = '$username' " );

    if ( $username_exist->num_rows == 1 )
    {
        $user = $username_exist->fetch_assoc();
        $verified_password = password_verify( $password, $user["password"] );

        if ( $verified_password )
        {
            echo "Welcome back!";
        }
        else
        {
            die("Wrong username or password!");
        }

    }
    else
    {
        die("Wrong username or password!");
    }