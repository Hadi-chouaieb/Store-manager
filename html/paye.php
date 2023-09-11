<?php
$con=mysqli_connect('localhost','root','','shop');
$msg='';
if(isset($_POST['rev'])){
$re=$_POST['rev'];


$req=("INSERT into mony(rev,pay,dat) values(0,'$re',now())");
if($con->query($req)===true){
  $msg=" <div class='alert alert-success'>
  <strong>Success!</strong> Paye avec succser .
  </div>
  ";
  header("Refresh:2; url=rev.php");

}

}

?>



<body>
<?php 
include('nav.html');

?>

<div class="container bg-dark mt-5 ">
<div class="row container-fuild">
<div class="container-fuild text-warning  col" align='center'><h2>Payer</h2><i class='text-danger'>admin</i></div>
</div>

      <form method='POST' action='./paye.php' class="p-5" id='pay' onsubmit='return ver4()' > 
      
        <div class="row m-5">
          <div class="col">
          <?php echo $msg;
         
          ?>
          


            <input type="number" class="form-control p-2  " placeholder="prix" name="rev" id='n' >
          </div>
        </div>
        <div class="row m-5 p-5">
       
            <div class="col">
                <button type="submit" class=" p-3 btn btn-outline-warning form-control">Ajouter</button>
            </div>
        </div>


      </form>
</div>

</body>