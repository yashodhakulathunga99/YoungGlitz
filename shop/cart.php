<?php
session_start();

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");

$cat = $_GET["name"];
$pid = $_GET["id"];
$uid = $_SESSION["user"];
$qty = 1;
$res= mysqli_query($link,"select * from product where pid=$pid");
while($row=mysqli_fetch_array($res))
{
  $price = $row["price"];
}
mysqli_query($link,"insert into cart values($uid, $pid, $qty, $price)");

?>
<script type="text/javascript">
    alert('Product Added to the cart');
    window.location="category.php?name=<?php echo $cat; ?>";
</script>
<?php

?>