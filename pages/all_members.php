<?php 

    $conn = mysqli_connect('localhost','root','','mass_manager');
    if ($conn -> connect_error) {
        echo $conn->connect_error;
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
               <h2 class="text-center pb-3">All Members</h2>
               <div class="row g-3 ">
                    <?php 
                        $gets = mysqli_query($conn, "SELECT * FROM massmember");
                        $count_row = mysqli_num_rows($gets);
                        if($count_row > 0){
                            while($rows = mysqli_fetch_assoc($gets)){
                    ?>
                    <div class="col-md-4">
                        <div class="card d-flex " style="">

                        <?php 
                        //Image row check
                            $imageName = $rows['Profile_Photo'];
                            echo "<img src = '../assets/images/profile_Images/$imageName' class='card-img-top' alt='...' >";
                        ?>
                            <div class="card-body d-flex flex-column ">
                                <h5 class="card-title">Name : <?php echo $rows['MemberName'] ;?></h5>
                                <h5 class="card-title">Email :<?php echo $rows['Email'] ;?></h5>
                                <h5 class="card-title">Number : <?php echo $rows['Phone'] ;?></h5>
                                <a href="#" class="btn btn-primary mb-2 "><?php if ($rows['MemberRoleId'] == 1) {
                                    echo "Manager";
                                }elseif($rows['MemberRoleId'] == 2){ echo "Member" ;}else{ echo "Guest";};
                                ?></a>
                                <a href="#" class="btn btn-primary">Remove Member</a>
                            </div>                       
                        </div>
                    </div>
                    <?php
                        }
                            }
                    ?>
               </div>
            </div>
      </div>
      </form>
      </div>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>