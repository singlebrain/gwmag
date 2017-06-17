<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>gwmag</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <br><br>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                        <?php echo validation_errors();?>
                        <?php echo form_open('welcome/create_user/'); ?>
                        <div class="">
                            <form role="form" action="">
                                
                                <div class="form-group">
                                    <label>first Name</label>
                                    <input name= "fname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>last Name</label>
                                    <input name= "lname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>user name</label>
                                    <input name= "username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Password</label>
                                    <input name= "pass1" type="Password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input name= "pass2" type="Password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>E-mail id</label>
                                    <input name= "email" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>mobile number</label>
                                    <input name= "mobile" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>school</label>
                                    <input name= "school" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>class</label>
                                    <input name= "class" class="form-control" >
                                </div>
                               
                                
                                <div class="col-lg-6">
                                <button type="submit" class="btn btn-lg btn-success btn-block">Submit Button</button>
                                </div>
                                <div class="col-lg-6">
                                <button type="reset" class="btn btn-lg btn-success btn-block">Reset Button</button>
                                </div>
                            </form>
                        </div>
                    </div>
                
                   
                
            </div>
        </div>
         
    </div>


</body>

</html>