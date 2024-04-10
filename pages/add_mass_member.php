
<?php 
    $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    $name = $emailAddress = $phoneNumber = $memberRoll = $Profile_Photo_name = "";
    $emptyName = $emptyEmailAddress = $emptyPhoneNumber = $emptyProfile_Photo = $emptyMemberRoll  = "";

    if (isset($_POST['addMember'])) {
       $name = $_POST['name'];
       $emailAddress = $_POST['emailAddress'];
       $phoneNumber = $_POST['phoneNumber'];
       $memberRoll = $_POST['memberRoll'];

       // image upload Process
       $Profile_Photo_name = $_FILES['Profile_Photo']['name'];
       $tmp_Profile_Photo = $_FILES['Profile_Photo']['tmp_name'];

       $Profile_Photo_location = "../assets/images/profile_Images/" . $Profile_Photo_name;
       $Profile_Photo_type = $_FILES['Profile_Photo']['type'];
       $Profile_Photo_size = $_FILES['Profile_Photo']['size'];


      if(empty($name)){
         $emptyName = "Please Input Your name";
      }
      if(empty($emailAddress)){
         $emptyEmailAddress = "Please Input Your Email";
      }
      if(empty($phoneNumber)){
         $emptyPhoneNumber = "Please Input Your Phone Number";
      }
      if(empty($Profile_Photo)){
         $emptyProfile_Photo = "Please Input Your Profile Photo";
      }
      if(empty($memberRoll)){
         $emptyMemberRoll = "Please Input Your Member Roll";
      }



         // image size validation
      if ( $Profile_Photo_size < 5000000) {
         // File type validation 
         if ($Profile_Photo_type =="image/jpeg") {

            if (file_exists($Profile_Photo_location)) {
               echo "File alradey exists";
            }else{
               //Move Your Image
               if (move_uploaded_file($tmp_Profile_Photo,$Profile_Photo_location)) {
                  
                  // $sql_image_insert =  " INSERT INTO massmember(Profile_Photo) VALUES ('$Profile_Photo_name')";
                  // if (mysqli_query($conn,$sql_image_insert)) {
                  //    echo "Image Insert Done";
                  // }else{
                  //    echo "Image Insert Query Problem";
                  // }
               }else{
                  echo "Not Upload";
               }
            }
         }else{
            echo "Please select an image File";
         }
      }else{
         echo "Please select an image File 5000000 bytes";
      }

      

        if (!empty($name) && !empty($emailAddress) && !empty($phoneNumber)  && !empty($Profile_Photo_name) && !empty($memberRoll)) {
           $insert = "INSERT INTO massmember (MemberName,Email,Phone,Profile_Photo,MemberRoleId) VALUES ('$name', '$emailAddress','$phoneNumber','$Profile_Photo_name','$memberRoll')";
           
            if($conn->query($insert) == TRUE){
                     echo "Data Pass";
                  }else{
                     echo "Input Problem";
            }
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add Mass Member</title>
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

      <style>
         .error{color: #FF0000;}
         .success{color:green;}
      </style>

   </head>
   <body>
      <div class="container pt-5 ">
         <!-- ======================  From  ============================= -->
         <form action="" method="POST" enctype="multipart/form-data">
            <div class='container py-5'>
               <h2 class="text-center pb-3"><u>Add Mass Member</u></h2>
               <div class="row g-3 ">
                  <div class="col-md-12">
                     <label for="name" class="form-label">Your Name <span class="error">*</span></label>
                     <input type="text" name="name" class="form-control" id="name" placeholder = "Your Name" value="">
                     <span class="error"><?php echo $emptyName;?></span>
                  </div>
                  <div class="col-12">
                     <label for="emailAddress" class="form-label">Email <span class="error">*</span></label>
                     <input type="email" name="emailAddress" class="form-control" id="emailAddress" placeholder="Your Email" value="">
                    <span class="error"><?php echo $emptyEmailAddress;?></span>
                  </div>
                  <div class="col-12">
                     <label for="phoneNumber" class="form-label">Phone Number <span class="error">*</span></label>
                     <input type="number" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Your Phone Number" value="">
                     <span class="error"><?php echo $emptyPhoneNumber;?></span>
                  </div>
                  <div class="col-12">
                     <label for="Profile_Photo" class="form-label">Profile Photo<span class="error">*</span></label>
                     <input type="file" name="Profile_Photo" class="form-control" id="Profile_Photo" placeholder="Your Phone Number" value="">
                     <span class="error"><?php echo $emptyProfile_Photo;?></span>
                  </div>
                  <div class="col-md-12">
                     <label for="inputState" class="form-label">Select Member Roll <span class="error">*</span></label>
                     
                     <?php 

                        $gets = mysqli_query( $conn, "SELECT * FROM memberroll");
                        $count_row = mysqli_num_rows($gets);

                        ?>
                        <select id="inputState" class="form-select" name="memberRoll">
                        <?php
                        if($count_row > 0){
                           while($rows = mysqli_fetch_assoc($gets)){
                     ?>
                               
                        <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['memberRollName'] ;?></option>

                     <?php
                     }
                     ?>
                       </select>
                      <?php
                  }
              ?>
                     <span class="error"><?php echo $emptyMemberRoll;?></span>
                  </div>
               </div>

               <div class="col-md-12 pt-3 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-block" name="addMember">Add Member</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>