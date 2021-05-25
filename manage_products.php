<?php
    $title = 'Manage Products'; 

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'BDD/conn.php'; 

    // Get all attendees
    $results = $crud->getProducts();
    if(!empty($results)){
    //var_dump($results);
?>


        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category#</th>
                <th>Category Name</th>
                
            </tr>
            <?php
                while($r = $results->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <tr>
                            <td><?php echo $r['idPdt'];?></td>
                            <td><?php echo $r['nomPdt']; ?></td>
                            <td><?php echo $r['puhtPdt']; ?></td>
                            <td><?php echo $r['idCat'] ;?></td>
                            <td><?php echo $r['nomCat']; ?></td>
                            <td>
                                <a href="success.php?id=<?php echo $r['idPdt']; ?>" class="btn btn-primary">View</a>
                                <a href="edit_products.php?id=<?php echo $r['idPdt']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this product ?');" href="delete.php?id=<?php echo $r['idPdt'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                    </tr> 
            <?php
                }
                
            ?>
        </table>
    <?php
    }else{
        echo'NO DATA';
    }
    ?>

<br>
<br>
<br>
<?php  require_once 'includes/footer.php'; ?>