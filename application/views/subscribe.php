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
                        <?php echo form_open('welcome/subscribe_check/'); ?>
                        <div class="">
                            <form role="form" action="">
                                <div class="form-group">
                                    <label>period</label>
                                    <select name="period" class="form-control">
                                        <option value="1">1 year</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>address(line 1)</label>
                                    <input name= "add1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>address(line 2)</label>
                                    <input name= "add2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>city</label>
                                    <input name= "city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> pin code</label>
                                    <input name= "pin"  class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>country</label>
                                    <input name= "country"  class="form-control" >
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