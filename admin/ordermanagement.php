<?php
/*
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="../login/signin.php";
</script>
<?php
}
*/
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Management Admin Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin.css">

</head>
<body>
    <div>
        <div class="d-flex d-flex1" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white bg-white1" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom primary-text1">Young Glitz</div>
            <div class="list-group list-group-flush my-3">
               
                        
                <a href="productmanagement.php" class="list-group-item list-group-item-action bg-transparent second-text list-group-item1 second-text1 ">Product Management</a>
                        
                <a href="ordermanagement.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold list-group-item1 second-text1 active active1">Order Management</a>

                <a href="user.php" class="list-group-item list-group-item-action bg-transparent second-text list-group-item1 second-text1 ">User Management</a>
                        
                
                <a href="..\home\home.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold list-group-item1">Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text fs-4 me-3 primary-text1" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Order management</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold second-text1" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item dropdown-item1" href="..\login\profile.php">Profile</a></li>
                                <li><a class="dropdown-item dropdown-item1 " href="..\login\logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
  
            
       
               <div class="container mt-4">
  <table class="table table-striped mt-4">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Customer</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="orderTableBody">
      <!-- Order details will be added here dynamically -->
                  <?php
                    $query = "SELECT * FROM order_tbl";     
                    $rs_result = mysqli_query ($link, $query); 
                    while($row=mysqli_fetch_array($rs_result))
                    {
                    echo "<tr>";
                    echo "<td>"; echo $row["orderid"]; echo "</td>";
                    echo "<td>"; echo $row["uid"]; echo "</td>";
                    echo "<td>"; echo $row["user"]; echo "</td>";
                    echo "<td>"; echo $row["email"]; echo "</td>";
                    echo "<td>"; echo $row["address"]; echo "</td>";
                    echo "<td>"; echo $row["city"]; echo "</td>";
                    echo "<td>"; echo $row["state"]; echo "</td>";
                    echo "<td>"; echo $row["zip"]; echo "</td>";
                    echo "<td>"; echo $row["total"]; echo "</td>";
                    echo "<td>"; echo $row["status"]; echo "</td>";                   
                    echo "</tr>";
                    }
                  ?>
    </tbody>
  </table>
</div>

<!-- Add Bootstrap JS and your custom JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </body>
</html>
