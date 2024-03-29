<?php 

     $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }

    $Select_For_Member = $date = $Breakfast = $Lunch = $Dinner ="";
    $emptySelect_For_Member = $emptyDate = "";

    if (isset($_POST['addMeal'])) {
       $Select_For_Member = $_POST['Select_For_Member'];
       $date = $_POST['date'];
       $Breakfast = $_POST['Breakfast'];
       $Lunch = $_POST['Lunch'];
       $Dinner = $_POST['Dinner'];


       if(empty($Select_For_Member)){
            $emptySelect_For_Member = "Please Input Your Member Select";
        }
      if(empty($date)){
            $emptyDate = "Please Input Your Date";
        }



        if (!empty($Select_For_Member) && !empty($date) && !empty($Breakfast) && !empty($Lunch) && !empty($Dinner)) {
           $insert = "INSERT INTO add_meal(Select_For_Member,Date,Breakfast,Lunch,Dinner) VALUES ('$Select_For_Member', '$date','$Breakfast','$Lunch','$Dinner')";
           
            if($conn->query($insert) == TRUE){
                     echo "Mial Add";
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
      <title>Add Meal</title>
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

      <style>
        .error{color: #FF0000;}
            .highlight {
                display:none;
            }
    </style>

   </head>
   <body>
    <?php echo  $Select_For_Member; ?>
      <div class="container pt-5 ">
         <!-- ======================  From  ============================= -->
         <form action="" method="POST">
            <div class='container py-5'>
               <h2 class="text-center pb-3">Add Meal</h2>
               <div class="row g-3 ">
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Select For Member <span class="error">*</span></label>
                        <select id="inputState" class="form-select" name="Select_For_Member">
                            <option value="0">For all Member</option>
                            <option value="1">For Single Member</option>
                        </select>
                        <span class="error"><?php echo $emptySelect_For_Member; ?></span>
                    </div>
                  <div class="col-md-12">
                     <label for="date" class="form-label">Date <span class="error">*</span></label>
                     <input type="date" name="date" class="form-control" id="date" value="">
                     <span class="error"><?php  echo $emptyDate;?></span>
                  </div>
                  <div class="row g-3 ">
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Breakfast</label>
                        <select id="inputState" class="form-select" name="Breakfast">
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select> 
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Lunch</label>
                        <select id="inputState" class="form-select" name="Lunch">
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select>      
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Dinner</label>
                        <select id="inputState" class="form-select" name="Dinner">
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select>      
                    </div>
                  </div>   
                  
                    <select id="mySelect">
                    <option value="option1">Option 1</option>
                    <option value="option2" >Option 2 (Disabled)</option>
                    <option value="option3">Option 3</option>
                    </select>

                   
               </div>

               <div class="col-md-12 pt-5 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-block" name="addMeal">Add Meal</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/app.js"></script>
   </body>
</html>