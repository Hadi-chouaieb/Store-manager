<?php
$con=mysqli_connect('localhost','root','','shop');


if(isset($_GET['sst'])){
  $sst=$_GET['sst'];
  $req=mysqli_query($con,"SELECT * from client where nom like '$sst%' ");
 
}
else{

  $req=mysqli_query($con,"SELECT * from client ");

}


$reqf='';
$reqt='';
if(isset($_POST['nom'])){
$id=$_POST['nom'];

$reqf=mysqli_query($con,"SELECT a.prix ,c.nom ,a.temp from achat  a, client c where a.id = c.id and c.id ='$id'");
$reqt=mysqli_query($con,"SELECT sum(a.prix)  from achat  a, client c where a.id = c.id and c.id ='$id'");

}


?>





<?php include('nav.html')?>


<!-- show the user -->



<div class="container mt-5 bg-dark" >
<div class="row container-fuild">
<div class="container-fuild text-primary  col" align='center'><h2>Aficher un client</h2></div>
</div>

<form action='./user.php' method='Get'>
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="sst">
    <div class="input-group-btn">
      <button class="btn btn-default bg-light" type="submit">
       <img src="../img/sr.png" alt="" width='25px'>
      </button>
    </div>
  </div>
</form>


    <form class="p-5" id='show' action='./user.php' method='post' onsubmit="return ver2()"> 
      <div class="row m-5">
        <div class="col">
          
        <select name="nom" id="n" class="form-control p-2">
            <option value="none">Choisir un client</option>
            <?php 
            
            
                    while($cl=$req->fetch_assoc()){ ?>
            <option value=" <?php echo $cl['id']; ?> "> <?php  echo $cl['id'].'-'. $cl['nom']; ?></option>

            <?php  } ?>
         


           </select>
        </div>
        
      </div>  
       
      <div class="row m-5">
   
          <div class="col">
              <button type="submit" class=" p-3 btn btn-outline-primary form-control">Afficher</button>
          </div>
      </div>


    </form>
    <div class="row">

    <table class='table table-dark' id='tab'>

    <tr scope='row'>
      <th scope='col'>Nom de client </th>
      <th scope='col'>Les prix d'achat de client </th>
      <th scope='col'>Date Achat </th>
    </tr> 
<tr>
 <?php 
       if($reqf !=""){
        while($cl=$reqf->fetch_assoc()){?>

</tr>
   <tr scope='row'>
        <th scope='col'><?php echo $cl['nom']?></th>
        <th scope='col'><?php echo $cl['prix']?></th>
        <th scope="col"><?php echo  $cl['temp'] ;?></th>
    
  </tr>

    <?php  }}?>


    <?php 
    if($reqt!=""){
        while($cl2=$reqt->fetch_assoc()){?>

</tr>

<tr scope='row ' class='text-danger'>
        <th scope='col-1'><?php 
        if($reqt->num_rows !=0){ echo 'Totale';} 
        ?></th>
       
        <th scope='col'><?php
         if (isset($cl2['sum(a.prix)'])){
          echo $cl2['sum(a.prix)'];
        }
          else{echo "<h6 class='text-warning conainer'>Ce client n'a rien acheté  </h6>";}
         
         ?></th>
   
</tr>
  <?php  }}?>









    </table>




    </div>


    </div>






</div>












