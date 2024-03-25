

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
               <h2 class="text-center pb-3">Add Meal</h2>
               <div class="row g-3 ">
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Select For Member<span class="error">*</span></label>
                        <select id="inputState" class="form-select" name="memberRoll">
                            <option value="0">For all Member</option>
                            <option value="1">For Single Member</option>
                        </select>      
                    </div>
                  <div class="col-md-12">
                     <label for="date" class="form-label">Date </label>
                     <input type="date" name="date" class="form-control" id="date" value="">
                     
                  </div>
                  <div class="row g-3 ">
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Breakfast</label>
                        <select id="inputState" class="form-select" name="memberRoll">
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select>      
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Lunch</label>
                        <select id="inputState" class="form-select" name="memberRoll">
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select>      
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Dinner</label>
                        <select id="inputState" class="form-select" name="memberRoll">
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select>      
                    </div>
                  </div>
                  
               </div>

               <div class="col-md-12 pt-5 ">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-block" name="addDepositMoney">Add Meal</button>
                    </div>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>