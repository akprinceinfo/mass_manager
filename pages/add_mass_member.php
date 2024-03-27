
<?php 
    $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    $emptyName = $emptyEmailAddress = $emptyPhoneNumber = $emptyMemberRoll = "";

    if (isset($_POST['addMember'])) {
       $name = $_POST['name'];
       $emailAddress = $_POST['emailAddress'];
       $phoneNumber = $_POST['phoneNumber'];
       $memberRoll = $_POST['memberRoll'];
       


        if(empty($name)){
            $emptyName = "Please Input Your name";
        }
        if(empty($emailAddress)){
            $emptyEmailAddress = "Please Input Your Email";
        }
        if(empty($phoneNumber)){
            $emptyPhoneNumber = "Please Input Your Phone Number";
        }
        if(empty($memberRoll)){
            $emptyMemberRoll = "Please Input Your Member Roll";
        }


        if (!empty($name) && !empty($emailAddress) && !empty($phoneNumber) && !empty($memberRoll)) {
           $insert = "INSERT INTO  (MemberName,Email,Phone,MemberRoleId) VALUES ('$name', '$emailAddress','$phoneNumber','$memberRoll')";
           
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
         .start{display:none}
      </style>

   </head>
   <body>
      <div class="container pt-5 ">
         <!-- ======================  From  ============================= -->
         <form action="" method="POST">
            <div class='container py-5'>
               <h2 class="text-center pb-3">Add Mass Member</h2>
               <div class="row g-3 ">
                  <div class="col-md-12">
                     <label for="name" class="form-label">Your Name <span class="error">*</span></label>
                     <input type="text" name="name" class="form-control" id="name" value="">
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