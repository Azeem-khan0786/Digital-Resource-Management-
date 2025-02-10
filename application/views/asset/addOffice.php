<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Office</title>
</head>
<style>
body {
    font-size: 14px;
}


</style>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10 ">
                <?php $this->load->view('asset/base'); ?>
                <div class="  m-1">
        <h5 class="text-center"><b>Add Organisation's Office </b></h5>
        <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p><?php echo $this->session->flashdata('message'); ?></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
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
        <div class=" m-1 p-3">
            <form action="<?= base_url('Management/addOffice') ?>" method="post" class="">
                <div class="form-group">
                    <label for="catagoryName">Office Name</label>
                    <input type="text" class="form-control" name='office_name' placeholder='Enter Your office name....'
                        required>
                </div>
                <div class="form-row">
                    <!-- <div class="form-group col-md-6">
                        <label for="org_id">select Organisation </label>
                        <select name="org_id" id="org_id" class="form-control"
                            placeholder="what is your master organisation" required>
                            <option value="">Select Organisation Level</option>
                            <?php foreach($org_data as $org): ?>
                            <option value="<?php echo $org['org_id']; ?>"
                                <?php echo ($org['org_id'] == $selected_org_id) ? 'selected' : ''; ?>>
                                <?php echo $org['org_name']; ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div> -->
                    <!-- <div class="form-group col-md-6">
                        <label for="catagoryName">created_Date </label>
                        <input type="date" class="form-control" name='created_at' placeholder='....' required>
                    </div> -->

                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">States</label><br>
                    <select name="states" id="state_id" required class="form-control" style='background-color: #dbdbdb;'>

                    <option value="">-- select your state--  </option>
                        <?php foreach($states as $st):?>

                        <option value="<?php echo $st['state_id']; ?>"> <?php echo $st['state_name'];?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">City & Location</label><br>
                    <select name="cities" id="city_id" required class="form-control" style='background-color: #dbdbdb;'>
                    <option value="">-- select your state's city--  </option>

                        <?php foreach($data['cities'] as $ct):?>

                        <option value="<?php echo $ct['city_id']; ?>"> <?php echo $ct['city_name'];?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                    <div class="form-group col-md-4">
                        <label for="catagoryName">Pincode </label>
                        <input type="text" class="form-control" name='pincode'
                            placeholder='enter your city pincode....'>
                    </div>
                </div>
                <h5 class='text-center'><b>Add Organisation Admin Details</b></h5>
                <div class="form-group">
                    <label for="inputAddress">staff Name</label>
                    <input type="text" class="form-control" id="admin_username" name="admin_username"
                        placeholder="Enter full name">
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="admin_username" name='admin_email'
                            value="<?php echo set_value('staff_email')?>" placeholder="something@gmail.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="admin_username" name='admin_password'
                            value="<?php echo set_value('staff_password')?>" placeholder="********">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block m-1">Add Office</button>
            </form>
            </div>
            <a href="<?=base_url().'Management/getOffice'?>" class=" text-center ">  <--Back to page</a>
            </div>
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