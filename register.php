<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

      <style>
         .error{color: #FF0000;}
         .success{color:green;}
         .start{display:none}
      </style>

   </head>
   <body>

    <!-- ======================  From Php ============================= -->
    <?php
   
   // Database Connect
   $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }else{
        echo "";
    }



      //Defult Valu
      $firstName = $lastName = $password = $conformPass =$emailAddress = $address = $city =$state =$zip =  $gender = $photo =$checkbox = "";
      // Erroe Variable
       $firstNameErr =  $lastNameErr =  $passwordErr =  $conformPassErr = $emailAddressErr = $addressErr = $cityErr = $stateErr = $zipErr = $genderErr = $photoErr = $checkboxErr ="";

      //Success
      $firstNameSucc =  $lastNameSucc =  $passwordSucc =  $conformPassSucc = $emailAddressSucc = $addressSucc = $citySucc = $stateSucc = $zipSucc = $genderSucc = $photoSucc = $checkboxSucc ="";

      if(isset($_POST['dataSend'])){
         $firstName = $_POST['firstName'];
         $lastName = $_POST['lastName'];
         $password = $_POST['password'];
         $conformPass = $_POST['conformPass'];
         $emailAddress = $_POST['emailAddress'];
         $address = $_POST['address'];
         $city = $_POST['city'];
         $state = $_POST['state'];
         $zip = $_POST['zip'];
         $gender = $_POST['gender'];
         $photo = $_POST['photo'];
         $checkbox = $_POST['checkbox'];

         // Md5 Password Convert
         $md5_Password = md5($password);

         if(empty($firstName)){
            $firstNameErr = "Name is Requierd";
         }else{
            $firstNameSucc = "Data Successfully Sent";
         }
         
         if(empty($lastName)){
            $lastNameErr = "lastName is Requierd";
         }else{
            $lastNameSucc = "Data Successfully Sent";
         }

         if(empty($password)){
            $passwordErr = "password is Requierd";
         }else{
            $passwordSucc = "Data Successfully Sent";
         }
         if(empty($conformPass)){
            $conformPassErr = "Conform Password is Requierd";
         }else{
            $conformPassSucc = "Data Successfully Sent";
         }




         if(empty($emailAddress)){
            $emailAddressErr = "Email Address is Requierd";
         }elseif(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
            $emailAddressErr = "Invalid email format";
         }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$emailAddress)){
            $emailAddressErr = "Only letters and white space allowed";
         }else{
            $emailAddressSucc = "Data Successfully Sent";
         }

         if(empty($address)){
            $addressErr = "address  is Requierd";
         }else{
            $addressSucc = "Data Successfully Sent";
         }
         if(empty($city)){
            $cityErr = "city is Requierd";
         }else{
            $citySucc = "Data Successfully Sent";
         }

         if(empty($state === " ")){
            $stateErr = "state is Requierd";
         }else{
            $stateSucc = "Data Successfully Sent";
         }


         if(empty($gender)){
            $genderErr = "gender is Requierd";
         }else{
            $genderSucc = "Data Successfully Sent";
         }

         if(empty($zip)){
            $zipErr = "zip is Requierd";
         }else{
            $zipSucc = "Data Successfully Sent";
         }

         if(empty($photo)){
            $photoErr = "photo is Requierd";
         }else{
            $photoSucc = "Data Successfully Sent";
         }

         if(empty($checkbox)){
            $checkboxErr = "checkbox is Requierd";
         }elseif ($checkbox === "checked") {
            echo "1";
         }
         else{
            $checkboxSucc = "Data Successfully Sent";
         }
         
         //Empty chack and database data send

         if(!empty($firstName) && !empty($lastName) && !empty($password) && !empty($emailAddress) && !empty($address) && !empty($city) && !empty($state)
            && !empty($zip) && !empty($gender) && !empty($photo) && !empty($checkbox)){

               if($password === $conformPass){
                  // $insert = mysqli_query($conn , "INSERT INTO register(firstName, lastName,password,emailAddress,address,city,state,zip,gender,photo,checkbox)
                  // VALUES ('$firstName', '$lastName','$md5_Password','$emailAddress','$address','$city','$state','$zip','$gender','$photo','$checkbox')");

                  $insert = "INSERT INTO register(firstName, lastName,password,emailAddress,address,city,state,zip,gender,photo,checkbox)
                  VALUES ('$firstName', '$lastName','$md5_Password','$emailAddress','$address','$city','$state','$zip','$gender','$photo','$checkbox')";

                  if($conn->query($insert) == TRUE){
                     header('location:index.php?userCreate'); //userCreate = supper grobal get variable 
                  }else{
                     echo "Input Problem";
                  }


            }else {
                  $passNotMatch = "Password Not Match";
               }
         }

         


      }
   
   
   ?>
   <!-- ======================  From  ============================= -->
      <form action="" method="POST">
         <div class='container py-5'>
            <h2 class="text-center pb-3">Register now</h2>
            <div class="row">
               <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name <span class="error">*</span></label>
                  <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName ?>">
                  <span class="error"><?php echo $firstNameErr;?></span>
                  <span class="success"> <?php echo $firstNameSucc;?></span>
               </div>
               <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name <span class="error">*</span></label>
                  <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName ?>">
                  <span class="error"> <?php echo $lastNameErr;?></span>
                  <span class="success"> <?php echo $lastNameSucc;?></span>
               </div>
            </div>
            <div class="row g-3 pt-3 ">
               <div class="col-md-6">
                  <label for="password" class="form-label">Password <span class="error">*</span></label>
                  <input type="password" name="password" class="form-control" id="Password" value="<?php echo $password ;?>">
                  <span class="error"> <?php echo $passwordErr;?></span>
                  <span class="success"> <?php echo $passwordSucc;?></span>
               </div>
               <div class="col-md-6">
                  <label for="conformPass" class="form-label">Conform Password <span class="error">*</span></label>
                  <input type="password" name="conformPass" class="form-control" id="conformPass" value="<?php echo $conformPass ;?>">
                  <span class="error"> <?php echo $conformPassErr;?></span>
                
                  <!-- <span class="error"> <?php echo $passNotMatch;?></span> -->
                  <?php 
                     // $passNotMatch = "";
                     if ($password === $conformPass) {   ?>         
                           <span class="success"> <?php echo $conformPassSucc; ?> </span>
                  <?php   }else{ ?>
                        <span class="error"> <?php echo $passNotMatch;?></span><?php
                     }
                  ?>
               </div>
               <div class="col-12">
                  <label for="emailAddress" class="form-label">Email <span class="error">*</span></label>
                  <input type="email" name="emailAddress" class="form-control" id="emailAddress" placeholder="Your Email" value="<?php echo $emailAddress ;?>">
                  <span class="error"> <?php echo $emailAddressErr;?></span>
                  <span class="success"> <?php echo $emailAddressSucc;?></span>
               </div>
               <div class="col-12">
                  <label for="address" class="form-label">Address <span class="error">*</span></label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Your Address" >
                  <span class="error"><?php echo $addressErr;?></span>
                  <span class="success"> <?php echo $addressSucc;?></span>
               </div>
               <div class="col-md-6">
                  <label for="inputCity" class="form-label">City <span class="error">*</span></label>
                  <input type="text" name="city" class="form-control" id="inputCity" value="<?php echo $city ;?>">
                  <span class="error"> <?php echo $cityErr;?></span>
                  <span class="success"> <?php echo $citySucc;?></span>
               </div>
               <div class="col-md-4">
                  <label for="inputState" class="form-label">State <span class="error">*</span></label>
                  <select id="inputState" class="form-select" name="state">
                     <option value="" >Choose...</option>
                     <option value="Dhaka">Dhaka</option>
                     <option value="Barishal">Barishal</option>
                     <option value="Chattogram">Chattogram</option>
                     <option value="Khulna">Khulna</option>
                     <option value="Rajshahi">Rajshahi</option>
                     <option value="Rangpur">Rangpur</option>
                     <option value="Mymensingh">Mymensingh</option>
                     <option value="Sylhet">Sylhet</option>
                  </select>
                  <span class="error"> <?php echo $stateErr;?></span>
                  <span class="success"> <?php echo $stateSucc;?></span>
               </div>
               <div class="col-md-2">
                  <label for="inputZip" class="form-label">Zip <span class="error">*</span></label>
                  <input type="number" name="zip" class="form-control" id="inputZip" value="<?php echo $zip ?>">
                  <span class="error"> <?php echo $zipErr;?></span>
                  <span class="success"> <?php echo $zipSucc;?></span>
               </div>
               <div class="col-12 mb-3 ">
                <p>Gender : <span class="error">*</span></p>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="gender" id="mail" value="mail" <?php if(isset($gender) && $gender == 'mail') echo "checked" ?>>
                     <label class="form-check-label" for="mail">
                     mail
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="gender" id="femail" value="femail" <?php if(isset($gender) && $gender == 'femail') echo "checked" ?>>
                     <label class="form-check-label" for="femail">
                     femail
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="gender" id="other" value="Other" <?php if(isset($gender) && $gender == 'Other') echo "checked" ?>>
                     <label class="form-check-label" for="other">
                     Other
                     </label>
                  </div>
                  <span class="error"> <?php echo $checkboxErr;?></span>
                  <span class="success"> <?php echo $checkboxSucc;?></span>
               </div>
               <div class="col-12">
                  <div class="mb-3">
                     <label for="formFile" class="form-label">Your Profile Photo <span class="error">*</span></label>
                     <input class="form-control" name="photo" type="file" id="formFile">
                     <span class="error"> <?php echo $photoErr;?></span>
                     <span class="success"> <?php echo $photoSucc;?></span>
                  </div>
               </div>
               <div class="col-12">
                  <div class="form-check">
                     <!-- <input class="form-check-input" name="checkbox" type="checkbox" id="gridCheck"> -->

                     <label class="form-check-label" for="gridCheck">
                     <input type="checkbox" name="checkbox" id="gridCheck" value="1">
                     Check me <span class="error">*</span>  
                     </label>
                     
                     <span class="error"> <?php echo $checkboxErr;?></span>
                     <span class="success"> <?php echo $checkboxSucc;?></span>
                  </div>
               </div>
               <div class="col-12">
                  <button type="submit" name="dataSend" class="btn btn-primary">Sign in</button>
                  <button type="button" class="btn btn-success"><a class="text-decoration-none text-white" href="login.php">Login</a></button>
               </div>
            </div>

            
         </div>
      </form>

        </div>



      <script src="./assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>