<?php
session_start();
?>
<?php include '..\home\navbar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Clothing Blog</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--<link href="blog.css" rel="stylesheet">-->
  <style>
    /* Custom CSS styles can be added here */
  </style>
</head>
<body>
    


  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="blog-post">
          <h2 class="blog-post-title">Latest Fashion Trends</h2>
          <p class="blog-post-meta">Posted by young glitz on July 9, 2023</p>
          
          <img src="blog1.jpg" alt="Fashion Trends" class="img-fluid">
          
          <p s>Blue is a popular and versatile color for shirts, offering a range of shades from light pastels to vibrant navy hues.
            Light blue shirts are considered classic and can be easily paired with different colors and patterns.
            They offer a fresh and clean look, suitable for both formal and casual occasions.
            Dark blue shirts, such as navy, provide a more sophisticated and formal appearance.
            They can be paired with neutral tones or complementary colors to create a stylish ensemble.
            Blue shirts can be found in various fabrics, including cotton, linen, chambray, or denim, each offering a different texture and level of formality.</p>
          
          <img src="blog2.jpg" alt="Fashion Trends" class="img-fluid">
          <p>Ladies accessories can add the perfect finishing touch to an outfit and enhance your personal style. Here are some popular accessories for women.</p>
          <p> Handbags come in various styles, such as totes, cross body bags, shoulder bags, clutches, and backpacks. 
              They not only serve as functional accessories to carry your essentials but also add a fashion statement to your overall look.</p>
          <p>Jewelry pieces like necklaces, earrings, bracelets, and rings can complement and elevate your outfit.
             You can choose from a wide range of styles, including delicate and minimalist designs, statement pieces, or vintage-inspired accessories.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sidebar">
          <h5 class="sidebar-title">Categories</h5>
          <ul class="list-group">
            <?php
            $link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
        $res= mysqli_query($link,"select * from category");
        while($row=mysqli_fetch_array($res))
        {

      ?>
            <a href="../shop/category.php?name=<?php echo $row["name"]; ?>"><li class="list-group-item"><?php echo $row["name"]; ?></li></a>
            <?php
          }
          ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include '..\home\footer.php';