    
<?php
    $title = 'Home'; 

    require_once 'includes/header.php'; 
    require_once 'BDD/conn.php';
    if(!isset($_SESSION['login'])){
    include 'login.php';
    }
        

?>
<h1 class="text-center">View Farid </h1>
<br><br>

<form method="GET" action=" " enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category*</label>

            <select class="form-control" id="category" required name="category">
                <?php
                    $Category = $crud->getCategory();
                    if(!$Category){
                        include 'includes/errormessage.php';
                    }else{
                        
                        while($Cat = $Category->fetch(PDO::FETCH_ASSOC)) {          
                ?>
                            <option value="<?php echo $Cat["idCat"] ?>" > <?php echo $Cat["nomCat"] ?> </option>
                <?php   }
                    }
                ?>

            </select><br>
            <input type="submit" name='search' value="Search By Category" class="btn btn-primary ">
            <!--<a href="index.php" class="btn btn-dark">  Par defaut</a> <br/>-->
        </div>
        
</form>

<div class="d-flex justify-content-around">
    <?php  
        if(isset($_GET['search'])){
          //var_dump($_POST);
          $idCat=$_GET['category'];
          $results = $crud->getProductsByCat($idCat);
          //var_dump($results);
          if(!empty($results)){
              while($r = $results->fetch(PDO::FETCH_ASSOC)) {
              ?>  
                <div class="card" style="width:305px ">
                  <img class="card-img-top" src="uploads/blank.png" alt="Card image" style="width:100%">
                  <div class="card-body">
                  <h4 class="card-title"><?php echo $r['puhtPdt']; ?>€</h4>
                  <h3 class="card-title">N°<?php echo $r['idPdt'] ;?> </h3>
                  <p class="card-text">Whether your products have a specific function, like a camera, 
                    or a personal purpose, like fashion, all products exist to enhance or improve the purchaser’s quality</p>
                    
                    <h4 class="card-subtitle mb-2 text-muted"> <?php echo $r['nomPdt']; ?> </h4>
                    <h4 class=""> <?php echo $r['nomCat']; ?></h4>
                    
                    <a href="manage_products.php" class="btn btn-primary">Manage Products</a>
                  </div>
                </div>
              <br>
            <?php
              } 
            }else{
              echo'NO DATA';
            }         

        }
    else{ 
    $results = $crud->getProducts();
    if(!empty($results)){
      while($r = $results->fetch(PDO::FETCH_ASSOC)) {
      ?>  
        <div class="card" style="width:305px ">
          <img class="card-img-top" src="uploads/blank.png" alt="Card image" style="width:100%">
          <div class="card-body">
          <h4 class="card-title"><?php echo $r['puhtPdt']; ?>€</h4>
          <h3 class="card-title">N°<?php echo $r['idPdt'] ;?> </h3>
          <p class="card-text">Whether your products have a specific function, like a camera, 
            or a personal purpose, like fashion, all products exist to enhance or improve the purchaser’s quality</p>
            
            <h4 class="card-subtitle mb-2 text-muted"> <?php echo $r['nomPdt']; ?> </h4>
            <h4 class=""> <?php echo $r['nomCat']; ?></h4>
            
            <a href="manage_products.php" class="btn btn-primary">Manage Products</a>
          </div>
        </div>
      <br>
    <?php
      } 
    }else{
      echo'NO DATA';
    }
  }         
  ?>
</div>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>