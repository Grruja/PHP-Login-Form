<?php

    if ( !isset($_POST["name_last"]) || !$_POST["name_last"] ) {
        die("Name is required");

    } else if ( !isset($_POST["username"]) || !$_POST["username"] ) {
        die("Username is required");

    } else if ( !isset($_POST["email"]) || !$_POST["email"] ) {
        die("Email is required");

    } else if ( !isset($_POST["password"]) || !$_POST["password"] ) {
        die("Password is required");

    } else if ( !isset($_POST["repeat_password"]) || !$_POST["repeat_password"] ) {
        die("Repeat password is required");
    }

    $username = trim( $_POST["username"] );
    $email = trim( $_POST["email"] );
    $password = trim( $_POST["password"] );
    $rep_password = trim( $_POST["repeat_password"] );

    if ( strlen($username) < 3 || strlen($username) > 12 ) {
        die("Username needs to have minimum 3 and maximum 12 characters");

    } else if ( strlen($password) < 6 ) {
        die("Password needs to have minimum 6 characters");
    }