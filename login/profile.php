<?php
session_start();
if($_SESSION["user"]=="")
{
?>
<script type="text/javascript">
window.location="signin.php";
</script>
<?php
}

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");
$user = $_SESSION["user"];
$res= mysqli_query($link,"select * from users where uid = '$user' ");
while($row=mysqli_fetch_array($res))
{
    $fname= $row["fname"];
    $lname= $row["lname"];
    $pwd= $row["password"];
    $email= $row["email"];
    $contact= $row["contact"]; 
    $address= $row["Address"]; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $con = $_POST['contact'];
    $addr = $_POST['address'];
    $mail = $_POST['email'];

    $cpwd = $_POST['cpwd'];
    $npwd = $_POST['npwd'];
    $rpwd = $_POST['rpwd'];

    if($first == "" || $last == "" || $con == "" || $addr == "" || $mail == "")
    {
        ?>
         <script type="text/javascript">
            alert('Empty Fields');
        </script>
        <?php
    }
    else
    {
        if($cpwd == "")
        {
            mysqli_query($link,"Update users set fname='$first', lname='$last', email='$mail', contact='$con', Address='$addr' where uid='$user'");
            ?>
                <script type="text/javascript">
                    alert('Profile updated');
                    window.location="profile.php";
                </script>
            <?php
        }
        else if($cpwd == $pwd)
        {
            if($npwd == $rpwd && $npwd != "")
            {
                mysqli_query($link,"Update users set fname='$first', lname='$last', email='$mail', contact='$con', Address='$addr', password='$npwd' where uid='$user'");
                ?>
                <script type="text/javascript">
                    alert('Profile updated');
                </script>
                <?php
            }
            else
            {
               ?>
                <script type="text/javascript">
                    alert('Password not matched or empty password field');
                </script>
                <?php
            }
        }
        else
        {
            ?>
         <script type="text/javascript">
            alert('Password update failed');
        </script>
        <?php
        }
    }
}
?>



<?php include '..\home\navbar.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="profile.css">
    </head>
    <body>

   <div class="container py-md-5">
    <div class="row d-flex align-items-top">       
                              
        <div class="text-center text-md-start">
            <div class="card  mb-3">
                            <div class="card-header py-3 text-center">
                                <p class="fw-bold">PROFILE</p>
            </div>

                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name-4" value="<?php echo $fname; ?>" name="first_name"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name-4" value="<?php echo $lname; ?>" name="last_name"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>
                            </div>
 
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="username"><strong>Contact</strong></label></div><input class="form-control" type="tel" value="<?php echo $contact; ?>" name="contact">
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="email"><strong>Email Address</strong></label></div><input class="form-control" type="email" id="email-1" value="<?php echo $email; ?>" name="email">
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="username"><strong>Address</strong></label></div><input class="form-control" type="text" value="<?php echo $address; ?>" name="address">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="last_name"><strong>Current Password</strong></label></div><input class="form-control" type="password" name="cpwd" placeholder="make this empty if u dont need to change the password">
                                        </div>
                                    </div>
                                    <div class="row mt-2"> 
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="last_name"><strong>New Password</strong></label></div><input class="form-control" type="password" name="npwd">
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" name="last_name"><strong>Confirm Password</strong></label></div><input class="form-control" type="password" name="rpwd">
                                        </div>
                                    </div>
                                    <div class="mb-4"></div>
                                <button class="btn btn-info btn-sm Submit-Btn " type="submit">Save Settings</button>
                                </form>
                            </div>
                        </div>
                    </div>               
          </div>
        </div>    
    </body>
</html>
<?php include '..\home\footer.php';
