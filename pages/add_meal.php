<?php 

    $conn = mysqli_connect('localhost','root','','mass_manager');
    if($conn->connect_error){
        echo $conn->connect_error;
    }

    $Select_For_Member = $Date = $Breakfast = $Lunch = $Dinner = $Member_Name = "";
    $emptySelect_For_Member = $emptyDate = $emptySelect_Shoppers = "" ;

    if (isset($_POST['addMeal'])) {
       $Select_For_Member = $_POST['Select_For_Member'];
       $Date = $_POST['date'];
       $Breakfast = $_POST['Breakfast'];
       $Lunch = $_POST['Lunch'];
       $Dinner = $_POST['Dinner'];
       $Member_Name = $_POST['Member_Name'];

       if(empty($Select_For_Member)){
            $emptySelect_For_Member = "Please Input Your Member Select";
        }
       if(empty($Date)){
            $emptyDate = "Please Input Your Date";
        }



        if (!empty($Select_For_Member) && !empty($Date) && !empty($Breakfast) && !empty($Lunch) && !empty($Dinner)) {
           $insert = "INSERT INTO add_meal(Select_For_Member,Date,Breakfast,Lunch,Dinner ,Member_Name) VALUES ('$Select_For_Member', '$Date','$Breakfast','$Lunch','$Dinner','$Member_Name')";
           
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
      <div class="container pt-5 ">
         <!-- ======================  From  ============================= -->
         <form action="" method="POST">
            <div class='container py-5'>
               <h2 class="text-center pb-3">Add Meal</h2>
               <div class="row g-3 ">
                    <div class="col-md-12">
                        <label for="Select_For_Member" class="form-label">Select For Member <span class="error">*</span></label>
                        <select id="Select_For_Member" class="form-select" name="Select_For_Member" onchange="toggleOptions()">
                            <option>Select Member</option>
                            <option value="2">For all Member</option>
                            <option value="1">For Single Member</option>
                        </select>
                        <span class="error"><?php echo $emptySelect_For_Member; ?></span>
                    </div>
                  <div class="col-md-12">
                     <label for="date" class="form-label">Date <span class="error">*</span></label>
                     <input type="date" name="date" class="form-control" id="date" value="">
                     <span class="error"><?php echo $emptyDate;?></span>
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
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
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
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
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
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                        </select>      
                    </div>
                  </div>   
                
                    <div class="col-md-12 ">
                        <label for="inputState" class="form-label" id="SelectMassMembers">Select Mass Members<span class="error">*</span></label>
                        <?php 
                            $gets = mysqli_query($conn, "SELECT * FROM massmember");
                            $count_row = mysqli_num_rows($gets);
                        ?>
                        <select id="mySelect" class="form-select" name="Member_Name">
                        <?php
                            if($count_row > 0){
                            while($rows = mysqli_fetch_assoc($gets)){
                        ?>
                         <option value="<?php echo $rows['MemberName'] ;?>"><?php echo $rows['MemberName'] ;?></option>
                         <?php

                        }
                        ?>
                        </select>
                        <span class="error"><?php echo $emptySelect_Shoppers ;?></span>
                        <?php
                            }
                        ?>    
                    </div>
                   
               </div>

               <div class="col-md-12 pt-5 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger baddMealtn-block" name="addMeal">Add Meal</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/app.js"></script>
      <script>
        function toggleOptions() {
            var inputState = document.getElementById("Select_For_Member");
            var mySelect = document.getElementById("mySelect");
            var SelectMassMembers = document.getElementById("SelectMassMembers");

            if (Select_For_Member.value === "2") {
                // mySelect.disabled = true;
                mySelect.style.display = "none";
                SelectMassMembers.style.display= "none";
                
            }  else if (Select_For_Member.value === "1") {
                // mySelect.disabled = false;
                mySelect.style.display = "block";
                SelectMassMembers.style.display= "block";
            }
        }
      </script>
   </body>
</html>