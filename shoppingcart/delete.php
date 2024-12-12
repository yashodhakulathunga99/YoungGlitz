<?php
session_start();

$uid = $_SESSION["user"];
$pid = $_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");

mysqli_query($link,"delete from cart where pid= $pid and userid=$uid");

?>
                <script type="text/javascript">
                    alert('Cart updated');
                    window.location="cart.php";
                </script>