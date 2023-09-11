<?php
$con=mysqli_connect('localhost','root','','shop');



if(isset($_GET['sst'])){
  $sst=$_GET['sst'];
  $req=mysqli_query($con,"SELECT * from client where nom like '$sst%' ");
 
}
else{

  $req=mysqli_query($con,"SELECT * from client ");

}








$msg="";
if(isset($_POST['nom'])&& isset($_POST['prix'])){
$pay=$_POST['prix'];
$id=$_POST['nom'];


$priw=mysqli_query($con,"SELECT SUM(prix) , prix , id , temp from achat where id ='$id'");
$ins=mysqli_query($con,"SELECT nom from client where id = '$id'");


while($cl=$priw->fetch_assoc()){ 
    $t=$cl['SUM(prix)'];
    $temm=$cl['temp'];
}




$tp=$t-$pay;
$msf="il payer $pay et il reste $tp  dans $temm \n";
while($c=$ins->fetch_assoc()){

  $nn=$c["nom"];

$f=fopen('../txt/'.$nn.'.txt','a');
}

fwrite($f,$msf);

$sup=mysqli_query($con,"UPDATE achat set prix = 0 where id = '$id'");

$rm=mysqli_query($con,"DELETE  FROM achat where id= '$id'");












if(mysqli_query($con,"INSERT into achat(id,temp,prix,pay) values('$id',now(),'$tp','Yes') ")){
    




  $ds=date('Y-m-d');
  $df = date('Y-m-d', strtotime($ds . ' +30 days'));

    mysqli_query($con,"UPDATE client set dst='$ds', dfn='$df' where id = '$id'");
    $msg=" <div class='alert alert-success'>
    <strong>Success!</strong> le client $nn payer $pay avec succser .
    </div>
    ";
    header("Refresh:2; url=payer.php");
    
}

}




?>
<?php include('nav.html')?>
<!-- payer -->
<div class="container bg-dark mt-5 ">
<div class="row container-fuild">
<div class="container-fuild text-success  col" align='center'><h2>Paiement client</h2></div>
</div>

<!-- searching form -->
<form action='./payer.php' method='Get'>
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="sst">
    <div class="input-group-btn">
      <button class="btn btn-default bg-light" type="submit">
       <img src="../img/sr.png" alt="" width='25px'>
      </button>
    </div>
  </div>
</form>





      <form class="p-5"action='./payer.php' method='POST' onsubmit="return ver()">  
        <div class="row m-5">
<?php echo $msg;?>
        <div class="col">
            
          <select name="nom" id="n" class="form-control p-2">
            <option value="none">Choisir un client</option>
            <?php while($cl=$req->fetch_assoc()){ ?>
            <option value=" <?php echo $cl['id']; ?> "> <?php echo $cl['id'].'-'. $cl['nom']; ?></option>

            <?php  } ?>
         


           </select>

           </select>
          </div>
          <div class="col">
            
            <input type="Number" class="form-control p-2  " placeholder="Le prix" name="prix" id='p'>
          </div>
        </div>
        <div class="row m-5 p-5">
      
            <div class="col">
                <button type="submit" class=" p-3 btn btn-outline-success form-control">Payer</button>
            </div>
        </div>


      </form>
</div>