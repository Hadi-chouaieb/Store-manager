<?php 
$con=mysqli_connect('localhost','root','','shop');
$msg='';
if(isset($_POST['cin'])){
  $cin=$_POST['cin'];
$pss=$_POST['new_pass'];


$req=$con->query("select * from user where cin = '$cin' ")or die(header('Location:./Notfound.html')) ;

if(mysqli_num_rows($req)){
  
   ;
  if(mysqli_query($con,"UPDATE user set pass = '$pss' where cin ='$cin'")or die(header('Location:./Notfound.html'))==true){
    $msg=" <div class='alert alert-success'>
    <strong> Mot de passe changer </strong>
    </div>
    ";
    header('Refresh:2;url=../index.php');
  }
  else{
    $msg=" <div class='alert alert-danger'>
    <strong> Erreur d' changer le mot de passe </strong>
    </div>
    ";
  }




}
else{
  $msg=" <div class='alert alert-danger'>
    <strong> le numèro de cin nepas exsite</strong>
    </div>
    ";
}


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/toush.css">
    <script src="../js/bootstrap.js"></script>
    <script src='../js/controle.js'></script>
    <title>Changer Mot de Passe</title>
</head>

<body class='bg-dark'>
        <div class="row justify-content-center">
      
        <div class="col-6 ">
        
      
        <div class="card row  m-5  cardint">
        <div class="card-header justify-content-center "> 
      
        <div class="col-12 justify-content-cente"
        
        ><img src="../img/user.png" class='col-12 user'alt="Image" srcset="" ></div>
      
      
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="" id="msg">
      
            <?php echo $msg?>
      
            </div>
          </div>
        <div id="msg"></div>
      <form action="password.php" method="post" onsubmit="return UPpass()">
        <input type="text" class="form-control" placeholder="Numéro de carte d'identité (CIN)" name="cin" id="cin">
        <input type="password" class="form-control mt-2" placeholder="Nouveau Mot de passe" name="new_pass" id="new_pas">
        <input type="password" class="form-control  mt-2" placeholder="Retapez le mot de passe"  id="ret_pas">
      <br>
      <button type="submit" class="btn btn-primary col-12">Changer le mot de passe</button>
      </form>
      
      </div>
      
      </div>
      
        </div>
        </div>
              
</body>
</html>