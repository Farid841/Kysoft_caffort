<?php
    include_once 'includes/session.php'; 
    $title = 'Edits  Products'; 
    
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'BDD/conn.php';
    
    //require_once 'includes/function.php';
    

?>
    
    <h1 class="text-center">Update Product </h1>
<?php 
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $product = $crud->getProductsDetails($id);
        if(!$product){
            include 'includes/errormessage.php';
            
        }
        else{
            include 'includes/successmessage.php';
        
?>

        <form method="GET" action="success.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">Category*</label>

                <select class="form-control" id="category" name="category">
                    <?php
                        $result = $crud->getCategory();
                        
                        if(!$result){
                            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
                        }else{
                            
                        
                            while($r = $result->fetch(PDO::FETCH_ASSOC)) {
                               
                                if($r==$product['idCat']){
                                    $selected='selected';
                                    
                                }
                                else{
                                    $selected='';
                                }
                                echo  "<option value='".$r["idCat"]."' $selected>".$r["nomCat"]."</option>";

                                
                             
                            }          
                        }
                        
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id"> Number Product</label>
                <input required type="text" class="form-control" id="id" name="id" disabled value=" <?php echo $product["idPdt"] ?>">
            </div>
            <div class="form-group">
                <label for="pname"> Name*</label>
                <input required type="text" class="form-control" id="pname" name="pname"  value=" <?php echo $product["nomPdt"] ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Price*</label>
                <input required type="text" class="form-control" id="price"  name="price" maxlengh="4" value=" <?php echo $product["puhtPdt"] ?>">
            </div>
            <?php 
           
            var_dump($product);

            ?>
            
            <button type="submit" name="send" value="<?php echo $product["idPdt"] ?>"  onclick="return confirm('Are you sure you want to applicate your modification ?');" class="btn btn-primary btn-block">Update_Data_Product</button>
            
        </form>
    
    
    <?php
    }
        }
        else{
                include 'includes/errormessage.php';
        } 
    ?>


<br>
<?php //}
require_once 'includes/footer.php'; ?>