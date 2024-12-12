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
  <div class="container container1">
    <div class="cart cart1">
      <h2>Cart</h2>
      <ul class="cart-items cart-items1">
        <?php
        $tot = 0;
        $res= mysqli_query($link,"select * from cart where userid = $uid");
        while($row=mysqli_fetch_array($res))
        {
            $pid = $row["pid"];
            $res1= mysqli_query($link,"select * from product where pid = $pid");
            while($row1=mysqli_fetch_array($res1))
            {
                $pname = $row1["pname"];
                $available_qty = $row1["qty"];
            }

        ?>
        <li class="cart-item cart-item1">
           <div class="item-details item-details1">
               <h3><a href="#" class="a1"><?php echo $pname; ?></a></h3>
            <p>Sub Total : <?php echo $row["total"]; ?></p>
            <form method="POST" action="update.php?id=<?php echo $pid; ?>">
              <input type="number" name="qty" class="item-quantity input1" value="<?php echo $row["qty"]; ?>" max="<?php echo $available_qty; ?>" min="0">
              <button type="submit" class="remove-btn remove-btn1">update</button>
            </form>
            <a href="delete.php?id=<?php echo $pid; ?>" class="remove-btn remove-btn1">Remove</a>
          </div>
        </li>
        <?php
        $tot = $tot+$row["total"];
        }
        ?>
      </ul>
      <div class="cart-total cart-total1">
        <p>Total: <?php echo $tot; ?></p>
       </div>
    </div>
    
  <div class="row">
  <div class="col-75">
    <div class="container container1">
        
      <form method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname" class="label1"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" class="input1">
            <label for="email"class="label1"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" class="input1">
            <label for="adr"class="label1"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" class="input1">
            <label for="city"class="label1"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York" class="input1">

            <div class="row">
              <div class="col-50">
                <label for="state"class="label1">State</label>
                <input type="text" id="state" name="state" placeholder="NY" class="input1">
              </div>
              <div class="col-50">
                <label for="zip"class="label1">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" class="input1">
              </div>
            </div>
          </div>

        <div class="col-50">
            <h3>Payment</h3>
            <label for="fname"class="label1">Accepted Cards</label>
            <div class="icon-container icon-container1">
              <i class="fa-brands fa-cc-visa"></i>
              <i class="fa-brands fa-cc-amex" style="color:blue;"></i>
              <i class="fa-brands fa-cc-mastercard" style="color:red;"></i>
              <i class="fa-brands fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname"class="label1">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" class="input1">
            <label for="ccnum"class="label1">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111222233334444" class="input1" onkeypress="return validation(event)">
            <label for="expmonth"class="label1">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="02" class="input1" onkeypress="return validation(event)" >
            <div class="row">
              <div class="col-50">
                <label for="expyear"class="label1">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"class="input1" onkeypress="return validation(event)">
              </div>
              <div class="col-50">
                <label for="cvv"class="label1">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"class="input1" onkeypress="return validation(event)">
              </div>
            </div>
          </div>
          
        </div>
        
            <input type="submit" value="Continue to checkout" class="btn .checkout-btn1 btn1 input1" name="submit_checkout">
      </form>
    </div>
  </div>
  </div>
 </div>
<?php
if(isset($_POST["submit_checkout"]))
{
  $name = $_POST["firstname"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $status = "Paid";

  if($name == "" || $email == "" || $address == "" || $city == "" || $state == "" || $zip == "" || $_POST["cardname"] == "" || $_POST["cardnumber"]  == "" || $_POST["expmonth"]  == "" || $_POST["expyear"]  == "" || $_POST["cvv"]  == "")
  {
    ?>
                <script type="text/javascript">
                    alert('Empty fields');
                </script>
            <?php
  }
  else
  {
    mysqli_query($link,"insert into order_tbl values ('','$name', $uid ,'$email','$address','$city','$state',$zip,$tot,'$status')");
    mysqli_query($link,"delete from cart where userid=$uid");
    ?>
                <script type="text/javascript">
                    alert('Order Success');
                    window.location="myorder.php";
                </script>
            <?php

  }
}
?>

<script type="text/javascript">
    function validation(evt) {
          
        var ASCII = (evt.which) ? evt.which : evt.keyCode
        if (ASCII > 31 && (ASCII < 48 || ASCII > 57) )
            return false;
        return true;
    }
</script>
</body>
</html>
<?php include '..\home\footer.php';
