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

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");

?>
<?php include '..\home\navbar.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>shop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
      
    <div class="card mb-3"> 
     <div class="card-body">
       <h4 class="card-title">Products</h4>
       <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
       </div>
       <img src="cat.jpg" class="card-img-top" style="width: 100%; height:600px;" alt="..." >
    </div>

    <!-- Example Code -->
    
  <div class="row1 m-3 row">
    <?php
        $res= mysqli_query($link,"select * from category");
        while($row=mysqli_fetch_array($res))
        {

    ?>
  <div class="col-sm-6 mb-3 mb-sm-0" >
      <div class="card">
    <img src="<?php echo $row["img"]; ?>" class="card-img-top"  alt="..." >
        <div class="card-body">
        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
        <p class="card-text"><?php echo $row["s_des"]; ?></p>
        <a href="category.php?name=<?php echo $row["name"]; ?>" class="btn btn-primary">Shop now</a>
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

