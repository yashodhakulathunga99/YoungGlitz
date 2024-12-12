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

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
$cat = $_GET["name"];
$res= mysqli_query($link,"select * from category where name='$cat'");
while($row=mysqli_fetch_array($res))
{
  $cname = $row["name"];
  $cdes= $row["l_des"];
  $cimg = $row["img"];
}
?>

<?php include '..\home\navbar.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <!-- heading -->
    
    <div class="card mb-3" style="max-width: 100%;">
      <div class="row g-0">
        <div class="col-md-4">
         <img src="<?php echo $cimg; ?>" class="card-img-left w-100 h-80" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $cname; ?></h5>
            <p class="card-text"><?php echo $cdes; ?> </p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- product part -->
    <div class="row m-3 row-cols-1 row-cols-md-3 g-4">
      <?php
        $res = mysqli_query($link,"select * from product where category = '$cat'");
        while($row=mysqli_fetch_array($res))
        {

      ?>
      <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="img/<?php echo $row["img"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $row["pname"]; ?></h5>
            <p class="card-text"> <?php echo $row["pdes"]; ?><br>Rs. <?php echo $row["price"]; ?><br><?php echo $row["size"]; ?></p>
            <a href="cart.php?id=<?php echo $row["pid"]; ?>&name=<?php echo $cat; ?>" class="btn btn-primary">Add to cart</a>
            </div>
        </div>
      </div>
            <?php
          }
    ?>
    </div>
    
    
    <!-- End Example Code -->
  </body>
</html>
<?php include '..\home\footer.php';
