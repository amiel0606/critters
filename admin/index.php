<?php 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('inc/links.php'); ?>

    <style>
    div.login-form{ position: absolute; top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }
    </style>


</head>
    <body class="bg-light">
     
        <div class="login-form text-center rounded bg-white shadow overflow-hidden">
            <form method="POST">
                <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
                <div class="p-4">
                    <div class="mb-3">
                        <input  name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name"> 
                    </div>
                    <div class="mb-4">
                        <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                    </div>
                    <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
                </div>
            </form>
        </div>



        <?php 


            
        ?>
             

        <!--Password reset modal and code-->
        <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-data-bs-keyboard="false" tabindex="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="recovery-form">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-shield-lock fs-3 me-2"></i>Set Up new Password
                            </h5> 
                        </div>
                        <div class="modal-body">
                            <div class="mb-4">
                                <label class="form-label">New Password</label>
                                <input type="pw" name="pass" required class="form-control shadow-none">
                            </div>
                        
                            <div class="mb-2 text-end">
                                
                                <button type="button" class="btn  shadow-none p-0 me-2" data-data-bs-dismiss="modal">Cancel
                                </button>
                                <button type="submit" class="btn btn-dark shadow-none">Submit</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
     </div>
             
            



    <?php require('inc/scripts.php'); ?>
    </body>
</html>