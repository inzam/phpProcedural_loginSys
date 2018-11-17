<?php

if(isset($_POST['signup-submit'])){
    require 'db.inc.php';

    $firstName = mysqli_real_escape_string($conn, $_POST['firstNm']);
    $lastName = mysqli_real_escape_string($conn,$_POST['lastNm']);
    $userName = mysqli_real_escape_string($conn,$_POST['userNm']);
    $email = mysqli_real_escape_string($conn,$_POST['emailID']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $rePass = mysqli_real_escape_string($conn,$_POST['rePass']);
//    hashed pass for restraining SQL injection
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (FirstName,LastName,Email,Pass,username) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

//    error check
    if(empty($firstName)||empty($lastName)||empty($userName)||empty($email)||empty($password)){

        header("Location: ../signup.php?error=emptyfields&uid=".$userName."&mail=".$email);
        exit();
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidEmail&uid=".$userName);
        exit();
    }elseif (!preg_match('/^[a-zA-Z0-9]*$/',$userName)){
        header("Location: ../signup.php?error=invalidUserName&email=".$email);
        exit();
    }elseif (!$password==$rePass){
        header("Location: ../signup.php?error=passwordCheck&email=".$email);
        exit();
    }else{

        $sql = "SELECT  Email FROM users WHERE Email=?; ";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=signupError&user=".$userName);
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,'?',$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck>0){
                header("Location: ../signup.php?error=userTaken&email=",$email);
                exit();
            }else{
                if(!mysqli_stmt_prepare($stmt,$sql)){

                    echo 'SQL error bitch!! '.$sql." ".mysqli_error($conn);
                }else{
                    $sql = "INSERT INTO users (FirstName, LastName, Email, Pass, username) VALUES (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt,$sql)) {
                        header("Location: ../signup.php?error=SQLerror");
                        exit();
                    }else {

                        mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $hashedPass, $userName);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?signup=success");
                        exit();
                    }
                }
            }
        }
    }

    //close stmt
    mysqli_stmt_close($stmt);
//    close conn
    mysqli_close($conn);


}else{
    header("Location: ../signup.php");
    exit();
}


