<?php
include "main_functions.php";
include "../model/user_query.php";
session_start();
if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
    if (check_form($_POST['login']) != FALSE && check_form($_POST['passwd']) != FALSE)
    {
        if (auth($_POST['login'], $_POST['passwd']))
        {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['msg'] = "Connexion granted";
            header("Location: ../views/home.php");
            exit ();
        }
        else
        {
            $_SESSION['msg'] = "Error : user/password not match";
            header("Location: ../views/login.php");
            exit ();
        }
    }
    else
    {
        $_SESSION['msg'] = "Wrong Format";
        header("Location: ../views/login.php");
        exit ();
    }
}
$_SESSION['msg'] = "ERROR login (form empty or partially)";
header("Location: ../views/login.php");
exit ();
?>