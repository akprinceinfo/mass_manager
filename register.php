<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >

      <style>
         .error{color: #FF0000;}
      </style>

   </head>
   <body>

    <!-- ======================  From Php ============================= -->
    <?php
   
      //Defult Valu
      $firstName = $lastName = $password = $conformPass =$emailAddress = $address = $city =$state =$zip =  $gender = $photo =$checkbox = "";
      // Erroe Variable
       $firstNameErr =  $lastNameErr =  $passwordErr =  $conformPassErr = $emailAddressErr = $addressErr = $cityErr = $stateErr = $zipErr = $genderErr = $photoErr = $checkboxErr ="";

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


         if(empty($firstName)){
            $firstNameErr = "Name is Requierd";
         }
         if(empty($lastName)){
            $lastNameErr = "lastName is Requierd";
         }
         if(empty($password)){
            $passwordErr = "password is Requierd";
         }
         if(empty($conformPass)){
            $conformPassErr = "Conform Password is Requierd";
         }

         if(empty($emailAddress)){
            $emailAddressErr = "Email Address is Requierd";
         }elseif(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
            $emailAddressErr = "Invalid email format";
         }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$emailAddress)){
            $emailAddressErr = "Only letters and white space allowed";
         }

         if(empty($address)){
            $addressErr = "address  is Requierd";
         }
         if(empty($city)){
            $cityErr = "city is Requierd";
         }

         if(empty($state)){
            $stateErr = "state is Requierd";
         }elseif ($state === "") {
           $stateErr = "Please select an option";
         }else{
           $stateErr =  "You selected: " . $state;
         }


         if(empty($gender)){
            $genderErr = "gender is Requierd";
         }
         if(empty($zip)){
            $zipErr = "zip is Requierd";
         }
         if(empty($photo)){
            $photoErr = "photo is Requierd";
         }
         if(empty($checkbox)){
            $checkboxErr = "checkbox is Requierd";
         }
         
      }
   
   
   ?>
   <!-- ======================  From  ============================= -->
      <form action="" method="POST">
         <div class='container py-5'>
            <h2 class="text-center pb-3">Register now</h2>
            <div class="row">
               <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" name="firstName" class="form-control" id="firstName">
                  <span class="error">* <?php echo $firstNameErr;?></span>
               </div>
               <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" name="lastName" class="form-control" id="lastName">
                  <span class="error">* <?php echo $lastNameErr;?></span>
               </div>
            </div>
            <div class="row g-3 pt-3 ">
               <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="Password">
                  <span class="error">* <?php echo $passwordErr;?></span>
               </div>
               <div class="col-md-6">
                  <label for="conformPass" class="form-label">Conform Password</label>
                  <input type="password" name="conformPass" class="form-control" id="conformPass">
                  <span class="error">* <?php echo $conformPassErr;?></span>
               </div>
               <div class="col-12">
                  <label for="emailAddress" class="form-label">Email</label>
                  <input type="email" name="emailAddress" class="form-control" id="emailAddress" placeholder="Your Email">
                  <span class="error">* <?php echo $emailAddressErr;?></span>
               </div>
               <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Your Address">
                  <span class="error">* <?php echo $addressErr;?></span>
               </div>
               <div class="col-md-6">
                  <label for="inputCity" class="form-label">City</label>
                  <input type="text" name="city" class="form-control" id="inputCity">
                  <span class="error">* <?php echo $cityErr;?></span>
               </div>
               <div class="col-md-4">
                  <label for="inputState" class="form-label">State</label>
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
                  <span class="error">* <?php echo $stateErr;?></span>
               </div>
               <div class="col-md-2">
                  <label for="inputZip" class="form-label">Zip</label>
                  <input type="text" name="zip" class="form-control" id="inputZip">
                  <span class="error">* <?php echo $zipErr;?></span>
               </div>
               <div class="col-12 mb-3 ">
                <p>Gender :</p>
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
                  <span class="error">* <?php echo $checkboxErr;?></span>
               </div>
               <div class="col-12">
                  <div class="mb-3">
                     <label for="formFile" class="form-label">Your Profile Photo</label>
                     <input class="form-control" name="photo" type="file" id="formFile">
                     <span class="error">* <?php echo $photoErr;?></span>
                  </div>
               </div>
               <div class="col-12">
                  <div class="form-check">
                     <input class="form-check-input" name="checkbox" type="checkbox" id="gridCheck" >
                     <label class="form-check-label" for="gridCheck">
                     Check me out
                     </label>
                     <span class="error">* <?php echo $checkboxErr;?></span>
                  </div>
               </div>
               <div class="col-12">
                  <button type="submit" name="dataSend" class="btn btn-primary">Sign in</button>
               </div>
            </div>

            
         </div>
      </form>


      <!-- =================== Table ================== -->

      
        <div class="container">
            <table class="table table-primary ">
            <thead>
                <tr>
                    <th scope="col">firstName</th>
                    <th scope="col">lastName</th>
                    <th scope="col">password</th>
                    <th scope="col">conformPass</th>
                    <th scope="col">emailAddress</th>
                    <th scope="col">address</th>
                    <th scope="col">City</th>
                    <th scope="col">state</th>
                    <th scope="col">zip</th>
                    <th scope="col">gender</th>
                    <th scope="col">photo</th>
                    <th scope="col">checkbox</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row"><?php echo $firstName?></td>
                    <td><?php echo $lastName ?></td>
                    <td><?php echo $password ?></td>
                    <td><?php echo $conformPass ?></td>
                    <td><?php echo $emailAddress ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $city ?></td>
                    <td><?php echo $state ?></td>
                    <td><?php echo $zip ?></td>
                    <td><?php echo $gender ?></td>
                    <td><?php echo $photo ?></td>
                    <td><?php echo $checkbox ?></td>
                </tr>
                
            </tbody>
        </table>
        </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>