
<?php
$con=mysqli_connect('localhost','root','','shop');


$clp=mysqli_query($con,"SELECT c.nom from client c , achat a where a.pay ='NO' and  c.dfn<= now() and a.id=c.id group by c.nom" )or die(mysqli_error());

 while($t=$clp->fetch_assoc()){
  $c=$t["nom"];
   echo " <div class='alert alert-danger col-6'>
      <strong>$c</strong> n'a pas payé ce mois-ci.
    </div>";}
    
?>

