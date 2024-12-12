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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $cat = $_POST['cat'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $des = $_POST['des'];

    $Q = $_POST["qty"];
    $intQ = floatval($Q);

    $Q1 = $_POST["price"];
    $intQ1 = floatval($Q1);

                            //product image
                            $v1=rand(1,9);
                            $v2=rand(1,9);
   
                            $v3=$v1.$v2;
   
                            $fnm=$_FILES["img"]["name"];
                            $dst="../shop/img/".$v3.$fnm;
                            $dst1=$v3.$fnm;
                            move_uploaded_file($_FILES["img"]["tmp_name"],$dst);
                            //end product image


    if($cat == "" || $name == "" || $size == "" || $price == "" || $qty == "" || $des == "")
    {
        ?>
         <script type="text/javascript">
            alert('Invalid fields');
        </script>
        <?php
    }
    else if($intQ1 < 1 || $intQ < 1)
    {
        ?>
         <script type="text/javascript">
            alert('Numeric fields error');
        </script>
        <?php
    }
    else 
    {
       mysqli_query($link,"insert into product values('','$name','$des','$price','$size','$qty','$dst1','$cat')");
       ?>
         <script type="text/javascript">
            alert('Product Added');
            window.location="productmanagement.php";
        </script>
        <?php
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Management Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="admin.css">
</head>
<body>
     <div>
        <div class="d-flex d-flex1" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white bg-white1" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom primary-text1">Young Glitz</div>
            <div class="list-group list-group-flush my-3">
                
                        
                <a href="productmanagement.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold list-group-item1 second-text1 active active1 ">Product Management</a>
                        
                <a href="ordermanagement.php" class="list-group-item list-group-item-action bg-transparent second-text  list-group-item1 second-text1 ">Order Management</a>

                <a href="user.php" class="list-group-item list-group-item-action bg-transparent second-text  list-group-item1 second-text1 ">User Management</a>
                        
                
                <a href="..\home\home.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold list-group-item1">Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text fs-4 me-3 primary-text1" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Product management</h2>
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

            
            
  <h4>Add Product</h4>
    <form method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
        <label for="productCategoey">Product Category:</label>
        <select class="form-control" id="productCategory" name="cat">
          <option disabled selected> Select a Category</option> 
           <?php 
            $r = mysqli_query($link,"select * from category");
            while ($rw=mysqli_fetch_array($r)) {                      
              echo "<option>".$rw["name"]."</option>"; 
            }
           ?> 
        </select>
        
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" class="form-control" id="productName" name="name" required>
      </div>
        <div class="form-group">
        <label for="productSize">Product Size:</label>
        <select class="form-control" id="productSize" name="size">
          <option value="small">Small</option>
          <option value="medium">Medium</option>
          <option value="large">Large</option>
        </select>
      <div class="form-group">
        <label for="productPrice">Product Price:</label>
        <input type="number" class="form-control" id="productPrice" name="price" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Product Quantity:</label>
        <input type="number" class="form-control" id="productPrice" name="qty" required>
      </div>
      <div class="form-group">
        <label for="productImage">Product Image:</label>
        <input type="file" class="form-control-file" id="img" name="img">
      </div>
      <div class="form-group">
        <label for="productName">Product Description:</label>
        <input type="text" class="form-control" id="productName" name="des" required>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <!-- Product List -->
    <h4>Product List</h4>
    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Category</th>
          <th>Size</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="productTableBody">
                  <?php
                    $query = "SELECT * FROM product";     
                    $rs_result = mysqli_query ($link, $query); 
                    while($row=mysqli_fetch_array($rs_result))
                    {
                    echo "<tr>";
                    echo "<td>";?> <img src="../shop/img/<?php echo $row["img"]; ?>" style="width:50px;height:50px;"><?php echo "</td>";
                    echo "<td>"; echo $row["pname"]; echo "</td>";
                    echo "<td>"; echo $row["category"]; echo "</td>";
                    echo "<td>"; echo $row["size"]; echo "</td>";
                    echo "<td>"; echo $row["price"]; echo "</td>";
                    echo "<td>"; echo $row["qty"]; echo "</td>";
                    echo "<td>"?>
                          <a href="update.php?id=<?php echo $row["pid"]; ?>" class="btn btn-sm btn-primary" >Update</a>
                          <a href="delete.php?id=<?php echo $row["pid"]; ?>" class="btn btn-sm btn-danger" >Delete</a><?php
                    echo "</td>";
                    
                    echo "</tr>";
                    }
                  ?>
      </tbody>
    </table>
  </div>

</body>
</html>
