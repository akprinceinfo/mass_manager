<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register View</title>
    <style>
        table tr td{
            border:1px solid black;
        }
    </style>
</head>
<body>

   

    
        <table class="table table-primary ">
            <thead>
                <tr>
                    <th scope="col">firstName</th>
                    <th scope="col">lastName</th>
                    <th scope="col">password</th>
                    <th scope="col">conformPass</th>
                    <th scope="col">emailAddress</th>
                    <th scope="col">address</th>
                    <th scope="col">state</th>
                    <th scope="col">zip</th>
                    <th scope="col">gender</th>
                    <th scope="col">photo</th>
                    <th scope="col">checkbox</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row"><?php $firstName?></td>
                    <td><?php $lastName ?></td>
                    <td><?php $password ?></td>
                    <td><?php $conformPass ?></td>
                    <td><?php $emailAddress ?></td>
                    <td><?php $address ?></td>
                    <td><?php $state?></td>
                    <td><?php $zip ?></td>
                    <td><?php $gender ?></td>
                    <td><?php $photo ?></td>
                    <td><?php $checkbox ?></td>
                </tr>
                
            </tbody>
        </table>
    
</body>
</html>