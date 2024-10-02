
<?php 
 require('inc/essentials.php'); 
 adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - QUIRIES</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>


<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h4 class="mb-4">USER QUERIES</h4>

 
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-end mb-4">
                        <a class="btn btn-dark rounded-pill shadow-none btn-sm">
                            <i class="bi bi-check-circle"></i> Mark All As Read
                        </a>
                        <a class="btn btn-danger rounded-pill shadow-none btn-sm">
                            <i class="bi bi-trash3-fill"></i> Delete All
                        </a>
                    </div>
                    
                    <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" width="20%">Subject</th>
                                    <th scope="col" width="30%">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample static data -->
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>johndoe@example.com</td>
                                    <td>Subject Example</td>
                                    <td>This is a sample message.</td>
                                    <td>2024-09-30</td>
                                    <td>
                                        <a class='btn btn-sm rounded-pill btn-primary'>Mark As Read</a><br>
                                        <a class='btn btn-sm rounded-pill btn-danger'>Delete</a>
                                    </td>
                                </tr>
                                <!-- Add more static rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>









    


<?php require('inc/scripts.php');?>




</body>
</html>

