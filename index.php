<?php
$con=mysqli_connect('localhost','root','','shop');
$msg="";

    

if(isset($_POST['password'])){
    $pass=$_POST['password'];
   
    $reqA=mysqli_query($con,"SELECT * from user where pass like '$pass'")or die(header('Location:./html/Notfound.html')) ;
   
  
    




    if(mysqli_num_rows($reqA)==1){
        header("Location:./html/index.html");
        exit;
    }
  
    else{
      $msg=" <div class='alert alert-danger'>
    <strong> Erreur Le mot de passe ne pas existe!</strong>
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
    <title>Store</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/toush.css">
    <script src="./js/bootstrap.js"></script>
    <script src='./js/controle.js'></script>
</head>
<body class='bg-dark'>
  <div class="row justify-content-center">

  <div class="col-6 ">
  

  <div class="card row  m-5  cardint">
  <div class="card-header justify-content-center "> 

  <div class="col-12 justify-content-cente"
  
  ><img src="./img/user.png" class='col-12 user'alt="Image" srcset="" ></div>


  </div>
  <div class="card-body ">
    <div class="row">
      <div class="" id="msg">

      <?php echo $msg?>

      </div>
    </div>
  
<form action="index.php" method="post" onsubmit="return log()">
  <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="pas">
<br>
<button type="submit" class="btn btn-success">Continue</button><br>

<div class="row justify-content-center">
<a href="./html/password.php" class=' col-12 '>J'ai oublié le mot de passe</a>
</div>
</form>

</div>

</div>

  </div>
  </div>
        







</body> 

   
</html>