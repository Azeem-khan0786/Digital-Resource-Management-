<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<style>
body {
    font-size: 14px;
}

input[type=text],
input[type=date],
input[type=password] {
    font-size: 12px;
}
</style>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>
    <h5 class="text-center">Add Organisation</h5><br>
    <?php if ($this->session->flashdata('message')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p><?php echo $this->session->flashdata('message'); ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <div class="container">
        <?php if (isset($validation_errors)): ?>
        <div style="color: red;">
            <?php echo $validation_errors; ?>
        </div>
        <?php endif; ?>

        <?php if (isset($db_error)): ?>
        <div style="color: red;">
            <?php echo $db_error; ?>
        </div>
        <?php endif; ?>
        <div class="bg-info m-1 p-3">
            <form action="<?php base_url('Management/addOrg') ?>" method='post' class="">
                <div class="form-group">
                    <label for="catagoryName">Organisation Name</label>
                    <input type="text" class="form-control" name='org_name'
                        placeholder='Enter Your organisation name....' required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="catagoryName">Type of Organisation </label>
                        <input type="text" class="form-control" name='org_type' placeholder='type of Organisation....'
                            required>
                    </div>
                    <div class="form-group col-md-6">
                          <label for="catagoryName">level of Organisation </label>
                          <input type="number" class="form-control" name='org_level' placeholder='level of Organisation....' required>
                          </div>
                    
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">States</label><br>
                    <select name="states" id="state_id" required class="form-control"
                        style='background-color: #dbdbdb;'>

                        <option value="">-- select your state-- </option>
                        <?php foreach($states as $st):?>

                        <option value="<?php echo $st['state_id']; ?>"> <?php echo $st['state_name'];?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">City & Location</label><br>
                    <select name="cities" id="city_id" required class="form-control" style='background-color: #dbdbdb;'>
                        <option value="">-- select your state's city-- </option>

                        <?php foreach($data['cities'] as $ct):?>

                        <option value="<?php echo $ct['city_id']; ?>"> <?php echo $ct['city_name'];?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Pincode</label>
                    <input type="text" class="form-control" name='pincode' id="inputZip" placeholder='12345...'>
                </div>
            </div>
                <h5 class ='text-center'><b>Add Organisation Admin Details</b></h5>
                <div class="form-group">
                <label for="inputAddress">staff Name</label>
                <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Enter full name">
            </div>
            <div class="form-row">
             
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="admin_username" name='admin_email' value="<?php echo set_value('staff_email')?>" placeholder="something@gmail.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control"id="admin_username" name= 'admin_password' value="<?php echo set_value('staff_password')?>" placeholder="********">
                  </div>
            </div>

                <button type="submit" class="btn btn-primary btn-block m-1">Add Organisation</button>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#state_id').click(function() {
                        var state_id = $(this).val();
                        console.log("Selected state ID: " + state_id);
                        $.ajax({
                            url: '<?php echo base_url('Management/getCities'); ?>', // URL to your AJAX handler
                            method: 'POST',
                            data: { state_id: state_id },
                            success: function(data) {
                                console.log("Received data: " + data);
                                $('#city_id').html(data); // Update city dropdown with the new data
                            }
                        });
                    });
                });
                </script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>