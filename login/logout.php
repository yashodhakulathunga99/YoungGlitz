<?php
session_start();
$uid = $_SESSION["user"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
mysqli_query($link,"delete from cart where userid=$uid");
session_destroy();
?>

<script type="text/javascript">
window.location="signin.php";
</script>