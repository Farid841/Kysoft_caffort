<?php

    include_once 'includes/session.php'; 
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'BDD/conn.php';

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location:manage_products.php");
    }else{
    
        $id = $_GET['id'];

        $result = $crud->deleteProducts($id);
        
        if($result)
        {
            header("Location: manage_products.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }

?>