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
$id = $_GET["id"];
$rs = mysqli_query($link,"select * from product where pid=$id");
while($row=mysqli_fetch_array($rs))
{
  $pname = $row["pname"];
  $pcat = $row["category"];
  $psize = $row["size"];
  $pprice = $row["price"];
  $pqty = $row["qty"];
  $pdes = $row["pdes"];
}


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
      if($fnm == "")
      {
          mysqli_query($link,"Update product set pname='$name', pdes='$des', size='$size', category='$cat', price=$price, qty=$qty where pid=$id");
      }
      else
      {
        mysqli_query($link,"Update product set pname='$name', pdes='$des', size='$size', category='$cat', price=$price, qty=$qty, img='$dst1' where pid=$id");
      }
       ?>
         <script type="text/javascript">
            alert('Product Updated');
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
                                <li><a class="dropdown-item dropdown-item1 " href="#">Logout</a></li>
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
          <option> <?php echo $pcat; ?></option> 
           <?php 
            $r = mysqli_query($link,"select * from category");
            while ($rw=mysqli_fetch_array($r)) {                      
              echo "<option>".$rw["name"]."</option>"; 
            }
           ?> 
        </select>
        
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" class="form-control" id="productName" name="name" value="<?php echo $pname; ?>" required>
      </div>
        <div class="form-group">
        <label for="productSize">Product Size:</label>
        <select class="form-control" id="productSize" name="size">
          <option><?php echo $psize; ?></option>
          <option value="small">Small</option>
          <option value="medium">Medium</option>
          <option value="large">Large</option>
        </select>
      <div class="form-group">
        <label for="productPrice">Product Price:</label>
        <input type="number" class="form-control" id="productPrice" name="price" value="<?php echo $pprice; ?>" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Product Quantity:</label>
        <input type="number" class="form-control" id="productPrice" name="qty" value="<?php echo $pqty; ?>" required>
      </div>
      <div class="form-group">
        <label for="productImage">Product Image:</label>
        <input type="file" class="form-control-file" id="img" name="img">
      </div>
      <div class="form-group">
        <label for="productName">Product Description:</label>
        <input type="text" class="form-control" id="productName" name="des" value="<?php echo $pdes; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>

  </div>

</body>
</html>
