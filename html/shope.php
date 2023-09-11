<?php
$con=mysqli_connect('localhost','root','','shop');

if(isset($_GET['sst'])){
  $sst=$_GET['sst'];
  $req=mysqli_query($con,"SELECT * from client where nom like '$sst%' ");
 
}
else{

  $req=mysqli_query($con,"SELECT * from client ");

}

// searching









$msg='';
//inserting 
if(isset($_POST['nom'])&& isset($_POST['prix'])){
$prix=$_POST['prix'];
$id=$_POST['nom'];
$ins=mysqli_query($con,"SELECT nom from client where id = '$id'");
if($ins->num_rows < 1){
  $msg= " 
  <div class='alert alert-danger'>
  <strong>Erreur!</strong> le nom ( .$id. ) nepas existe pour ajouter clicker ici : <a href='addCl.php'>Ajouter Client</a>.
  </div>
  ";
  header("Refresh:2; url=shope.php");


}

else{

  if(mysqli_query($con,"INSERT into achat(id,temp,prix) value('$id',now(),'$prix')") === true){
    mysqli_query($con,"UPDATE achat set pay = 'NO' where id='$id'");
    $msg=" <div class='alert alert-success'>
    <strong>Success!</strong>  succser .
    </div>
    ";

while($c=$ins->fetch_assoc()){

       $nn=$c["nom"];

    $f=fopen('../txt/'.$nn.'.txt','a');
  }
    
    fwrite($f,"$prix \n");



    header("Refresh:2; url=shope.php");

  }
}

}






?>

<body >
  <?php include("nav.html")?>
<div class="container bg-dark mt-5" >
<div class="row container-fuild">
<div class="container-fuild text-danger  col" align='center'><h2>Crédit client</h2></div>
</div>
<!-- searching form -->
<form action='./shope.php' method='Get'>
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="sst">
    <div class="input-group-btn">
      <button class="btn btn-default bg-light" type="submit">
       <img src="../img/sr.png" alt="" width='25px'>
      </button>
    </div>
  </div>
</form>






      <form class="p-5"  action='./shope.php' method='POST' onsubmit="return ver()"> 
       


        <div class="row m-5">
        <?php echo $msg ?>
         
          <div class="col">
            
           <select name="nom" id="n" class="form-control p-2">
            <option value="none">Choisir un client</option>
            
            
            <?php while($cl=$req->fetch_assoc()){ ?>
            <option value=" <?php echo $cl['id']; ?> "> <?php   echo $cl['id'].'-'. $cl['nom']; ?></option>

            <?php  } ?>
         


           </select>
          </div>
          <div class="col">
            
            <input type="Number" class="form-control p-2 " placeholder="Le prix" name="prix" id='p'>
          </div>
        </div>
      
        <div class="row m-5 p-5">
            <div class="col">

           


                <button type="submit" class=" p-3 btn btn-outline-danger form-control">Ajouter</button>
            </div>
        </div>


      </form>
</div>
<!-- add client -->







</body>
