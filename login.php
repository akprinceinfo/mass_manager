
<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


    // Database Connect
//    $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }

    $emptyEmail = $emptyPassword = "";
    $userEmail = $userPassword = "";

    if (isset($_POST['logInSubmit'])) {
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $md5_Password = md5($userPassword);

        if(empty($userEmail)){
            $emptyEmail = ": Please Input Your Email";
        }
        if(empty($userPassword)){
            $emptyPassword = ": Please Input Your Password";
        }

        if(!empty($userEmail) && !empty($userPassword)){
            //$checkData = "SELECT * FROM register WHERE emailAddress = '$userEmail' AND password = '$userPassword'";
            //$connectData =  $conn->query($checkData);
            
            $connectData =  mysqli_query($conn,"SELECT * FROM register WHERE emailAddress = '$userEmail' AND password = '$md5_Password'");
            
            var_dump($connectData); 
            die();

            if($connectData == TRUE){
                header('location:login.php');
            }else{
                echo 'Not found';
                echo $connectData;
                // header('location:login.php');
            }

        }

    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <style>
            .gradient-custom {
                /* fallback for old browsers */
                background: #6a11cb;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            }

            .error{color: #FF0000;}
            .success{color:green;}
            .start{display:none}

        </style>
    </head>
    <body>
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <?php 
                                  if(isset($_GET['userCreate'])){
                                    echo "user Create Success";
                                  }  
                            ?>
                            <form action="login.php" method="POST">
                                <div class="card-body p-5 text-center">
                                <div class="mb-md-5 ">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-2">Please enter your login and password!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" name="userEmail" value="<?php echo $userEmail ;?>"  class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email </label>
                                        <span class="error"><?php echo $emptyEmail;?></span>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="userPassword" value="<?php echo $userPassword ;?>"  class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password </label>
                                        <span class="error"><?php echo $emptyPassword;?></span>
                                    </div>

                                    <p class="small mb-3 "><a class="text-white-50" href="#!">Forgot password?</a></p>

                                    <button class="btn btn-outline-light btn-lg px-5" name="logInSubmit" type="submit">Login</button>

                                    <!-- <div class="d-flex justify-content-center text-center  pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div> -->
                                </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="register.php"  class="text-white-50 fw-bold">Sign Up</a></p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="./assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
