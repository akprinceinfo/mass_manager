<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        table tr td{
            border:1px solid black;
        }
    </style>
</head>
<body>


        <?php 
        
             // Database Connect
                $conn = mysqli_connect('localhost','root','','mass_manager');
                    if($conn->connect_error){
                        echo $conn->connect_error;
                    }else{
                        echo "";
                    }

        ?>

   
          <!-- =================== Table ================== -->

      
        <div class="container">
            
            <table class="table table-primary">
                <h3 class="text-center pt-5 pb-2">Register Data View</h3>
            <thead>
                
                <tr class="border-1">
                    <th scope="col">firstName</th>
                    <th scope="col">lastName</th>
                    <th scope="col">password</th>
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

              <?php 

                  $gets = mysqli_query( $conn, "SELECT * FROM register");
                  $count_row = mysqli_num_rows($gets);


                  if($count_row > 0){
                     while($rows = mysqli_fetch_assoc($gets)){
               ?>
                                        
                  <tr>
                     <td><?php echo $rows['firstName'] ;?></td>
                     <td><?php echo $rows['lastName'] ;?></td>
                     <td><?php echo $rows['password'] ;?></td>
                     <td><?php echo $rows['emailAddress'] ;?></td>
                     <td><?php echo $rows['address'] ;?></td>
                     <td><?php echo $rows['city'] ;?></td>
                     <td><?php echo $rows['state'] ;?></td>
                     <td><?php echo $rows['zip'] ;?></td>
                     <td><?php echo $rows['gender'] ;?></td>
                     <td><?php echo $rows['photo'] ;?></td>
                     <td><?php echo $rows['checkbox'] ;?></td>
                  </tr>
               <?php
                  }
               }
              ?>
            </tbody>
        </table>
    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>