

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
                        <select id="inputState" class="form-select" name="memberRoll">
                            <option value="0">Add Market Cost</option>
                            <option value="1">Add Other Cost</option>
                        </select>      
                    </div>
                    <div class="col-md-12">
                        <label for="date" class="form-label">Date <span class="error">*</span></label>
                        <input type="date" name="date" class="form-control" id="date" value="">
                    </div>
                    <div class="col-md-12 g-3 ">
                        <div class="col-md-12">
                            <label for="Deposit_Amount" class="form-label">Market Cost Amount <span class="error">*</span></label>
                            <input type="number" name="Deposit_Amount" class="form-control" id="Deposit_Amount" placeholder="Deposit Amount" value="">
                            <span class="error"><?php  ;?></span>
                        </div>
                    </div>
                    <div class="col-md-12 g-3">
                        <label for="comment">Bazer Details : <span class="error">*</span></label>
                        <textarea class="form-control" rows="5" id="comment" name="text" placeholder="Bazar List"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Select Shoppers<span class="error">*</span></label>
                        <select id="inputState" class="form-select" name="memberRoll">
                            <option value="0">Select Shoppers Name 1</option>
                            <option value="1">Select Shoppers Name 2</option>
                        </select>      
                    </div>
               </div>

               <div class="col-md-12 pt-5 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-block" name="addDepositMoney">Add Market Cost</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>