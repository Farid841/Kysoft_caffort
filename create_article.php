<?php
//important document 
    include_once 'includes/session.php'; 
    $title = 'Create Product / ADD category'; 
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'BDD/conn.php';    

?>

<?php
    // i was so confused to make this ADD FUNCTION #Farid

    if(isset($_POST["send"])){
        $nomCat=$_POST["newidCat"];
        $resCat = $crud->insertCategory($nomCat);
        if(!$resCat){
            include 'includes/errormessage.php';
        }else{
            
            header("Refresh:0");
            include 'includes/successmessage.php';
        }
        //var_dump($_POST); Debug

    }
?>
    
    <h1 class="text-center">Add New Products </h1>

    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category*</label>

            <select class="form-control" id="category" required name="category">
                <?php
                    $result = $crud->getCategory();
                    if(!$result){
                        include 'includes/errormessage.php';
                    }else{
                        
                        while($r = $result->fetch(PDO::FETCH_ASSOC)) {          
                ?>
                            <option value="<?php echo $r["idCat"] ?>" > <?php echo $r["nomCat"] ?> </option>
                <?php   }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id"> Number Product*</label>
            <input required type="number" class="form-control" id="id" name="id">
        </div>
        <div class="form-group">
            <label for="pname"> Name*</label>
            <input required type="text" class="form-control" id="pname" name="pname">
        </div>
        <div class="form-group">
            <label for="lastname">Price*</label>
            <input required type="text" class="form-control" id="price" name="price" maxlengh="4">
        </div>
        <?php 
        //var_dump($r);
        //debug
        ?>
        
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        
    </form>



<br>
<br>
<hr>
<br>
<br>
<?php 
    <h1 class="text-center">Add New Category </h1>
  

    <form method="post" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="newCat"> Category</label>
            <input required type="text" class="form-control" id="newCat" name="newidCat">
        </div>  
        
        <button type="submit" name="send" class="btn btn-primary btn-block">New Category</button>
        
    </form>
?>
<br>
    


<?php

require_once 'includes/footer.php'; ?>