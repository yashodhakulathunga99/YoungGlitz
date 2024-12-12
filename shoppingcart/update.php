<?php
session_start();


$uid = $_SESSION["user"];
$pid = $_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");

$res= mysqli_query($link,"select * from product where pid = $pid");
while($row=mysqli_fetch_array($res))
{
	$price = $row["price"];
}


$qty = $_POST["qty"];
$total = $qty*$price;

mysqli_query($link,"Update cart set qty=$qty, total=$total where userid=$uid and pid=$pid");
?>
                <script type="text/javascript">
                    alert('Cart updated');
                    window.location="cart.php";
                </script>
