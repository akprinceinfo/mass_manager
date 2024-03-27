<?php 

    $conn = mysqli_connect('localhost','root','','mass_manager');
    if ($conn -> connect_error) {
        echo $conn->connect_error;
    }

    $marketCostRoll =  $date = $Market_Cost_Amount = $BazerDetails = $Select_Shoppers = "";
    $emptyMarketCostRoll =  $emptyDate = $emptyMarket_Cost_Amount = $emptySelect_Shoppers = "";


    if(isset($_POST['addMarketCost'])){
        if (empty($marketCostRoll)) {
            $emptyMarketCostRoll = "Please Input Your Market Cost Roll";
        }
        if (empty($date)) {
            $emptyDate = "Please Input Your Date";
        }
        if (empty($Market_Cost_Amount)) {
            $emptyMarket_Cost_Amount = "Please Input Your Amount";
        }
        if (empty($Select_Shoppers)) {
            $emptySelect_Shoppers = "Please Input Your Select Shoppers";
        }


    };
  

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
               <h2 class="text-center pb-3">Add Market Cost</h2>
               <div class="row g-3 ">
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Select Market Cost<span class="error">*</span></label>
                        <select id="inputState" class="form-select" name="marketCostRoll">
                            <option value="0">Add Market Cost</option>
                            <option value="1">Add Other Cost</option>
                        </select>
                        <span class="error"><?php echo $emptyMarketCostRoll ;?></span>
                    </div>
                    <div class="col-md-12">
                        <label for="date" class="form-label">Date <span class="error">*</span></label>
                        <input type="date" name="date" class="form-control" id="date" value="">
                        <span class="error"><?php echo $emptyDate ;?></span>
                    </div>
                    <div class="col-md-12 g-3 ">
                        <div class="col-md-12">
                            <label for="Market_Cost_Amount" class="form-label">Market Cost Amount <span class="error">*</span></label>
                            <input type="number" name="Market_Cost_Amount" class="form-control" id="Market_Cost_Amount" placeholder="Deposit Amount" value="">
                            <span class="error"><?php echo $emptyMarket_Cost_Amount ;?></span>
                        </div>
                    </div>
                    <div class="col-md-12 g-3">
                        <label for="comment">Bazer Details : <span class="error">*</span></label>
                        <textarea class="form-control" rows="5" id="comment" name="BazerDetails" placeholder="Bazar List"></textarea>
                    </div>
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
                       <span class="error"><?php echo $emptySelect_Shoppers ;?></span>
                    <?php
                        }
                    ?>
                       
                    </div>
               </div>

               <div class="col-md-12 pt-5 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-block" name="addMarketCost">Add Market Cost</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>