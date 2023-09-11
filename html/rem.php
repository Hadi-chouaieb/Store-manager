<?php
$con=mysqli_connect('localhost','root','','shop');
$rpcl=mysqli_query($con,"SELECT nom from client");

$msg='';


if(isset($_POST['cls'])){
    $cli= $_POST['cls'];
    $req=("DELETE from client where nom = '$cli'")or die(mysqli_error());
    if($con->query($req)===true){
        $msg=" <div class='alert alert-success'>
  <strong>Success!</strong> suprimer de client $cli avec succser .
  </div>
  ";
  header("Refresh:2; url=rem.php");

}


}

?>




<header>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/toush.css">
    <script src="../js/bootstrap.js"></script>
    <script src='../js/controle.js'></script>
    
    
</header>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
Supprimer un client

</button>
<?php echo $msg; ?>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">choisi un seul client</h4>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->



 <div class="modal-body">
        <form action="rem.php" method="post">
    <?php while($cl=$rpcl->fetch_assoc()){ ?>

     
      <input type="radio" name="cls" class="form-check-input" value='<?php echo $cl['nom'] ?>' id=""><?php echo $cl['nom'] ?><br>
      
        <?php }?>

</div>
      <!-- Modal footer -->
      <div class="modal-footer row justify-content-center">
      <button type="submit" class="btn btn-success col-4" >Supprimer</button>
      <button type="button" class="btn btn-danger col-4" data-bs-dismiss="modal">Fermer</button>
      
      
      
    
    </div>


</form>
    </div>
  </div>
</div>




