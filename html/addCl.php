<?php
$con=mysqli_connect('localhost','root','','shop');
if(isset($_POST['nom'])){

$nom=$_POST['nom'];
$req=("select * from client where nom='$nom'");
$row=$con->query($req);
$msg='';
if($row->num_rows >0){
   
$msg= " 

    <div class='alert alert-danger'>
    <strong>Erreur!</strong> le nom ( $nom) deja existe.
    </div>
    ";
    header("Refresh:2; url=addCl.php");
    
}
else{
    $ds=date('Y-m-d');
    $df = date('Y-m-d', strtotime($ds . ' +30 days'));
    
    // Output the new date


    $rep=("insert into client (nom,dst,dfn) values('$nom','$ds','$df')");
    if($con->query($rep)===true){
        
        $msg=" <div class='alert alert-success'>
        <strong>Success!</strong> le Client  $nom est ajouter avec succser .
        </div>
        ";
        header("Refresh:2; url=addCl.php");
    
    }
}

}
else{
    $msg= "";
}



?>


<head>
<link rel="shortcut icon" href="/img/lk.ico" type="image/x-icon">
</head>

<body>
<?php 
include('nav.html');

?>

<div class="container bg-dark mt-5 ">
<div class="row container-fuild">
<div class="container-fuild text-warning  col" align='center'><h2>Ajouter un client</h2></div>
</div>

      <form method='POST' action='./addCl.php' class="p-5" id='pay' onsubmit='return ver3()' > 
      
        <div class="row m-5">
          <div class="col">
          <?php echo $msg;
         
          ?>
          


            <input type="text" class="form-control p-2  " placeholder="Nom de client" name="nom" id='n' >
          </div>
        </div>
        <div class="row m-5 p-5">
       
            <div class="col">
                <button type="submit" class=" p-3 btn btn-outline-warning form-control">Ajouter Client</button>
            </div>
        </div>


      </form>
</div>

</body>


