<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
$id = $_GET["id"];
mysqli_query($link,"delete from product where pid= $id");

?>
         <script type="text/javascript">
            alert('Product Deleted');
            window.location="productmanagement.php";
        </script>
        <?php


?>