<?php
    $title = 'User Login'; 

    require_once 'includes/header.php'; 
    require_once 'BDD/conn.php'; 
    
    //If data was submitted via a form POST request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = strtolower(trim($_POST['login']));
        $password = strtolower(trim($_POST['password']));
        $result = $crud->getUser($login,$password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['login'] = $result['login'];
            
            header("Location: manage_products.php");
        }
    }
?>

<h1 class="text-center"> <?php echo $title ?> </h1>
   
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    
        <table class="table table-sm">
            <tr>
                <td><label for="username">Login: * </label></td>
                <td><input type="text" name="login" class="form-control" id="login" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['login']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="password">Password: * </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                </td>
            </tr>
        </table><br/><br/>
        <input type="submit" name="login_btn" value="Login_change" class="btn btn-primary btn-block"><br/>
        <a href="#"> Forgot Password </a>
            
    </form><br/>

<?php include_once 'includes/footer.php'?>