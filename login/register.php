<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"e_commerce");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and insert the new user into the database
    
    $email = $_POST["email"];
    $pwd = $_POST["npassword"];
    $role = 'customer'; // Set the default role to 'customer'
    
    if($email == "" || $pwd == "")
    {
        ?>
                  <script type="text/javascript">
                    alert('Fields empty');
                  </script>
                <?php
    }
    else if($_POST["npassword"] == $_POST["cpassword"])
    {
        $query = "INSERT INTO users (uid, email, password, role) values ('','$email','$pwd','$role')";
        mysqli_query($link,$query);
        $_SESSION["user"]=$row["uid"];
        ?>
                  <script type="text/javascript">
                    window.location="profile.php";
                  </script>
                <?php
    }
    else
    {
      ?>
                  <script type="text/javascript">
                    alert('Passwords not matched');
                  </script>
                <?php
    }

    
}
?>


<?php include '..\home\navbar.php';?>
<!doctype html>
<html lang="en">

<head>
  <title>Register</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

     <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border:none;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
              <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Sign up</p>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  

                  <form class="mx-1 mx-md-4" method="post">
                      
                      
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"><i class="bi bi-envelope-at-fill"></i> Your Email</label>
                        <input type="email" id="form3Example3c" class="form-control form-control-lg py-3" name="email" autocomplete="off" placeholder="enter your username" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i>New Password</label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-3" name="npassword" autocomplete="off" placeholder="enter your password" style="border-radius:25px ;" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i>Confirm Password</label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-3" name="cpassword" autocomplete="off" placeholder="enter your password" style="border-radius:25px ;" />
                      </div>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Register" name="register" class="btn btn-success text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />
                    </div>

                  </form>
                  <p align="center">I have already account <a href="signin.php" class="text-success" style="font-weight:600; text-decoration:none;">Login</a></p>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="signup.jpg" class="img-fluid" alt="Sample image" height="300px" width="500px">
                  <script>
  const messageDiv = document.getElementById('message');
  const form = document.querySelector('form');

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData(form);

    fetch('register.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      messageDiv.innerText = data;
    })
    .catch(error => {
      messageDiv.innerText = 'An error occurred while registering.';
      console.error(error);
    });
  });
</script>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
<?php include '..\home\footer.php';