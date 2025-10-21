<?php

//logout
if(isset($_GET['logout'])){
    $_SESSION['user']=false;
    header('location:index.php');
}
//Register
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'] )){
    if($_POST['password'] == $_POST['password2']){
        if (!isset($_POST['avatar'])){
            $_POST['avatar'] = 'default.jpg';
        }
        UserRepository::createUser($_POST['username'], $_POST['password'], $_POST['avatar'], 0);
        header('location:index.php');
        exit;
    } else {
        echo "Error: passwords do not match.";
    }
}

//login
if(isset($_POST['username']) && isset($_POST['password'])){
    $ok= UserRepository::login($_POST['username'], $_POST['password']);
    if($ok){
    header('location:index.php');
    exit;
    }else{
        echo "error al logging the user";
    }
}
//vista registro
if (isset($_GET['c']) && $_GET['c'] == 'user' && isset($_GET['register'])) {
    require_once('views/registerView.phtml');
    exit;
}
//vista login
if (isset($_GET['c']) && $_GET['c'] == 'user' && isset($_GET['login'])) {
    require_once('views/loginView.phtml');
    exit;
}

//vista por defecto
if(!$_SESSION['user']){
    require_once('views/productView.phtml');
    exit;
}

if (isset($_GET['edit'])) {
    require_once 'views/editUserView.phtml';
    die();
}

if (isset($_GET['setAvatar'])) {
    if (isset($_FILES['avatar'])) {

        if (FileHelper::fileHandler($_FILES['avatar']['tmp_name'], 'public/users/' . $_FILES['avatar']['name'])) {

            $_SESSION['user']->setAvatar($_FILES['avatar']['name']);
        }
        header('Location: index.php?c=user&edit=1');
    }
}
