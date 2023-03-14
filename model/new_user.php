<?php

    if ( !isset( $_POST["name"] ) || empty( trim( $_POST["name"] ) ) )
    {
        die("Name is required.");
    }
    else if ( strlen( trim( $_POST["name"] ) ) < 2 || strlen( trim( $_POST["name"] ) ) > 32 )
    {
        die("Name needs to have minimum 2 characters and maximum 32.");
    }

    if ( !isset( $_POST["last_name"] ) || empty( trim( $_POST["last_name"] ) ) )
    {
        die("Last name is required.");
    }
    else if ( strlen( trim( $_POST["last_name"] ) ) < 2 || strlen( trim( $_POST["last_name"] ) ) > 32 )
    {
        die("Last name needs to have minimum 2 characters and maximum 32.");
    }

    if ( !isset( $_POST["username"] ) || empty( trim( $_POST["username"] ) ) )
    {
        die("Username is required.");
    }
    else if ( strlen( trim( $_POST["username"] ) ) < 2 || strlen( trim( $_POST["username"] ) ) > 32 )
    {
        die("Username needs to have minimum 2 characters and maximum 32.");
    }

    if ( !isset( $_POST["email"] ) )
    {
        die("Email is required.");
    }

    if ( !isset( $_POST["number"] ) )
    {
        die("Phone number is required.");
    }
    else if ( strlen( $_POST["number"] ) < 8 || strlen( $_POST["number"] ) > 19 )
    {
        die("Phone number should have minimum 8 numbers and maximum 19.");
    }

    if ( !isset( $_POST["password"] ) || empty( trim( $_POST["password"] ) ) )
    {
        die("Password is required.");
    }
    else if ( strlen( trim( $_POST["password"] ) ) < 5 || strlen( trim( $_POST["password"] ) ) > 64 )
    {
        die("Password needs to have minimum 5 characters and maximum 64.");
    }

    if ( !isset( $_POST["conf_password"] ) || empty( trim( $_POST["password"] ) ) )
    {
        die("Please confirm your password.");
    }
    else if ( $_POST["password"] != $_POST["conf_password"] )
    {
        die("Passwords do not match.");
    }

    $name = trim( $_POST["name"] );
    $last_name = trim( $_POST["last_name"] );
    $username = trim( $_POST["username"] );
    $email = trim( $_POST["email"] );
    $number = $_POST["number"];
    $password = password_hash( $_POST["password"], PASSWORD_BCRYPT );

    require_once "database.php";
    $username_exist = $database->query( " SELECT * FROM users WHERE username = '$username' " );
    $email_exist = $database->query( " SELECT * FROM users WHERE email = '$email' " );

    if ( $username_exist->num_rows == 1 )
    {
        die("{$username} is already taken!");
    }
    else if ( $email_exist->num_rows == 1 )
    {
        die("There is already a user with this email.");
    }

    $database->query( " INSERT INTO users ( name, last_name, username, email, number, password ) VALUES ( '$name', '$last_name', '$username', '$email', '$number', '$password' ) " );

    echo "Welcome!";