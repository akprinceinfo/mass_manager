<?php 

     $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }

    $Select_For_Member = $date = $Breakfast = $Lunch = $Dinner ="";
    $emptySelect_For_Member = $emptyDate = "";



?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Member</title>
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
               <h2 class="text-center pb-3">Member All Function</h2>
               <div class="row g-3 ">
                    <div class="col-md-12">
                       
                    </div>
                  <div class="col-md-12">
                     <div class="col-md-12">
                        <label for="inputState" class="form-label">Select Shoppers<span class="error">*</span></label>
                        <?php 
                            $gets = mysqli_query($conn, "SELECT * FROM massmember");
                            $count_row = mysqli_num_rows($gets);
                        ?>
                        <select id="inputState" class="form-select" name="Select_Shoppers">
                        <?php
                            if($count_row > 0){
                            while($rows = mysqli_fetch_assoc($gets)){
                        ?>
                         <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['MemberName'] ;?></option>
                         <?php

                     }
                     ?>
                       </select>
                       <span class="error"><?php ;?></span>
                    <?php
                        }
                    ?>    
                </div>
                     
                  </div>
                               
               </div>

               <div class="col-md-12 pt-5 ">
                    <div class="d-grid">
                        
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>