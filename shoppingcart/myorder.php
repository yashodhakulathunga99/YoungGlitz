<?php
session_start();
if($_SESSION["user"]=="")
{
?>
<script type="text/javascript">
window.location="../login/signin.php";
</script>
<?php
}
$uid = $_SESSION["user"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
?>



<?php include '..\home\navbar.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <link rel="stylesheet" type="text/css" href="cart.css">
  <script src="https://kit.fontawesome.com/60de7de4b8.js" crossorigin="anonymous"></script>
</head>
<body>
  <h4 style="margin-left:750px; ">Order List</h4>
  <div class="container container1">
    
    <table class="table">
      <thead>
        <tr>
          <th>Order Id</th>
          <th>Total</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="productTableBody">
                  <?php
                    $query = "SELECT * FROM order_tbl where uid=$uid";     
                    $rs_result = mysqli_query ($link, $query); 
                    while($row=mysqli_fetch_array($rs_result))
                    {
                    echo "<tr>";
                    echo "<td>"; echo $row["orderid"]; echo "</td>";
                    echo "<td>"; echo $row["total"]; echo "</td>";
                    echo "<td>"; echo $row["status"]; echo "</td>";
                    echo "</tr>";
                    }
                  ?>
      </tbody>
    </table>

 </div>

</body>
</html>
<?php include '..\home\footer.php';
