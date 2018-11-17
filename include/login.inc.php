<?php
if(isset($_POST['login-submit'])){
    require 'db.inc.php';

    $user = mysqli_real_escape_string($conn,$_POST['user']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);

    if(empty($user)||empty($pass)){
        header("Location: ../index.php?error=emptyfield&uid=".$user);
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE username=? OR Email=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=SQLerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,'ss',$user,$user);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if($row = (mysqli_fetch_assoc($result))){
                $pwdCheck = password_verify($pass,$row['Pass']);
                if($pwdCheck==false){
                    header("Location: ../index.php?error=wrongPassword&uid=".$user);
                    exit();
                }else{
                    session_start();
                    $_SESSION['userID'] = $row['ID'];
                    $_SESSION['userNm'] = $row['username'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
            }else{
                header("Location: ../signup.php?error=invalidUser&uid=".$user);
                exit();
            }
        }
    }
}