
<?php 
    $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }
    
    $emptyDate = $emptyDeposit_Amount = $emptyMemberFirstName = "";

    if (isset($_POST['addDepositMoney'])) {
       $date = $_POST['date'];
       $Deposit_Amount = $_POST['Deposit_Amount'];
       $memberFirstName = $_POST['memberFirstName'];
       


        if(empty($date)){
            $emptyDate = "Please Input Your Date";
        }
        if(empty($Deposit_Amount)){
            $emptyDeposit_Amount = "Please Input Your Date";
        }
        if(empty($memberFirstName)){
            $emptyMemberFirstName = "Please Input Your Member First Name";
        }


        if (!empty($date) && !empty($Deposit_Amount) && !empty($memberFirstName)) {
           $insert = "INSERT INTO adddeposit(Date,Deposit_Amount,Select_Member) VALUES ('$date', '$Deposit_Amount','$memberFirstName')";
           
            if($conn->query($insert) == TRUE){
                     echo "Add Deposit Money Data Pass";
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
               <h2 class="text-center pb-3">Add Deposit Money</h2>
               <div class="row g-3 ">
                  <div class="col-md-12">
                     <label for="date" class="form-label">Date :<span class="error">*</span></label>
                     <input type="date" name="date" class="form-control" id="date" value="">
                     <span class="error"><?php echo $emptyDate ;?></span>
                  </div>
                  <div class="col-md-12">
                     <label for="Deposit_Amount" class="form-label">Deposit Amount <span class="error">*</span></label>
                     <input type="number" name="Deposit_Amount" class="form-control" id="Deposit_Amount" placeholder="Deposit Amount" value="">
                    <span class="error"><?php  ;?></span>
                  </div>
                  <div class="col-md-12">
                     <label for="inputState" class="form-label">Select Member First Name <span class="error">*</span></label>
                     <?php 

                        $gets = mysqli_query( $conn, "SELECT * FROM massmember");
                        $count_row = mysqli_num_rows($gets);

                        ?>
                        <select id="inputState" class="form-select" name="memberFirstName">
                        <?php
                        if($count_row > 0){
                           while($rows = mysqli_fetch_assoc($gets)){
                     ?>
                               
                        <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['MemberName'] ;?></option>

                     <?php

                     }
                     ?>
                       </select>
                      <?php
                  }
              ?>
                     <span class="error"><?php echo $emptyMemberFirstName;?></span>
                  </div>
               </div>

               <div class="col-md-12 pt-3 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-block" name="addDepositMoney">Add Deposit</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>