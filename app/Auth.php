<?php

function login()
{
    global $conn;
    $req = $_POST;
    if (empty($req['email']) || empty($req['pass'])) {
  //      echo 'empty';
        return ["error" => "Please Type Your Email and Password"];
    }
    $email = $req['email'];
    $pass =  $req['pass'];

    $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
    $pre_st = $conn->prepare($sql);
    $pre_st->bindParam(":email", $email, PDO::PARAM_STR);
    $pre_st->execute();
    if ($pre_st->rowCount() == 0) {
//        echo '404';
        return ['error' => "Unable To find Your Email"];
    }
    $user = $pre_st->fetch();

    if (password_verify($pass, $user['pass'])) {
        $_SESSION['user'] = $user['id'];
        Header("location:/");
    } else{
        return ['error' => "You have entered wrong email or password"];
    }
}

// TASK

function register(){

}

// TASK

function change_password(){

}


function logout(){
    $_SESSION['user']=null;
    Header("location:/");
}