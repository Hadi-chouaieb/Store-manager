<?php
$con=mysqli_connect('localhost','root','','shop');

$d=date('Y-m-d');


$r1=mysqli_query($con,"SELECT sum(prix) from achat where temp ='$d'")or die('11');
$r2=mysqli_query($con,"SELECT sum(rev) from mony where dat ='$d'")or die('21');
$r3=mysqli_query($con,"SELECT sum(pay) from mony where dat ='$d'")or die('110');

while($c1=$r1->fetch_assoc()){ 
$tr1=$c1['sum(prix)'];

}
while($c2=$r2->fetch_assoc()){ 
  $tr2=$c2['sum(rev)'];
  
}
while($c3=$r3->fetch_assoc()){ 
   $tr3=$c3['sum(pay)'];
  
}
      
$tt=$tr2+$tr1;
$tp=$tr3;
$ttl=$tt-$tp;

$prix="le marge binificaire de $d est : $ttl de Rabatteurs $tt es de Paiments $tp  ";


$f=fopen('../txt/margeBinificaire.txt','a');

  
  fwrite($f,"$prix \n");



if($tp==''){
$tp=0;

}
if($tt==''){
  $tp=0;
  
  }
  



$rpcl=mysqli_query($con,"SELECT nom from client");

$msg='';


if(isset($_POST['cls'])){
    $cli= $_POST['cls'];
    $req=("DELETE from client where nom = '$cli'")or die(mysqli_error());
    if($con->query($req)===true){
        $msg=" <div class='alert alert-success col-6'>
  <strong>Success!</strong> suprimer de client $cli avec succser .
  </div>
  ";
  header("Refresh:2; url=admin.php");

}


}

?>











<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/toush.css">
    <script src="../js/bootstrap.js"></script>
    <script src='../js/controle.js'></script>
    <script src="../js/chart.js"></script>

</head>

<body>
    
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.html">Acceille</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" href="#io">Supprumer client</a>
        </li> -->
      </ul>
      </div>

      </nav>


<div class="row">

  <div class="col-6"><canvas  id="myChart"></canvas></div>
          



  
  <!-- suppression button -->

  <div class="col-6 d-flex align-items-center justify-content-center bg-light text-light" id="mem">
    <div class="row">
      <div class="col-4"></div>
           



          <div class="col-12 container infos">
                <span class="text-primary">Rabatteurs:</span>
                <input type="text" disabled class='sum text-primary col-2' default='0' value='<?php echo $tt ; ?>' id='hi' >
          
                <span class="text-danger">Paiments:</span>
                <input type="text" disabled class='sum text-danger'default='0' value='<?php echo $tp ; ?>' id="aj">


                <span class="text-success">Marge bénéficiaire:</span>
                <input type="text" disabled class='sum text-success'default='0' value='<?php echo $ttl ; ?>' id="cj">


          </div> 

      </div>

  </div>

</div>
<button type="button" class="btn btn-outline-warning col-6" data-bs-toggle="modal" data-bs-target="#myModal">Supprimer un client</button>

</div>

    <span class="glyphicon glyphicon-asterisk">
</div>
<!-- modale supprusion dun client -->





<?php echo $msg; ?>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
Choisir un client</h4>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->



 <div class="modal-body">
        <form action="admin.php" method="post">
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


<!-- for user not payed -->
<?php include("clin.php");?>














<script>
  // Get the canvas element
  var ctx = document.getElementById('myChart').getContext('2d');

 var hi=document.getElementById('hi').value
 var aj=document.getElementById('aj').value
 var mj=hi-aj
  // Create the chart
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['.', "."],
      datasets: [{
        label: 'Marge bénéficiaire',
        data: [mj,mj],
        backgroundColor: 'rgba(55, 223, 25, 2)', // Optional background color
        borderColor: 'rgba(55, 223, 25, 2)', // Optional border color
        borderWidth: 1, // Optional border width
        lineTension: 0.4 // Controls the curve, set it to 0 for straight lines
      },{
    
      label: 'Rabatteurs',
        data: [hi,hi],
        backgroundColor: 'rgba(30, 144, 250, 2)', // Optional background color
        borderColor: 'rgba(30, 144, 250, 2)', // Optional border color
        borderWidth: 1, // Optional border width
        lineTension: 0.4 // Controls the curve, set it to 0 for straight lines
    
    
    
    
    }

    ,{
    
    label: 'Paiments',
      data: [aj,aj],
      backgroundColor: 'rgba(355, 22, 25, 2)', // Optional background color
      borderColor: 'rgba(355, 22, 25, 2)', // Optional border color
      borderWidth: 1, // Optional border width
      lineTension: 0.4 // Controls the curve, set it to 0 for straight lines
  
  
  
  
  }
  
  
  ],






    },












    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });





</script>


</body>

</html>