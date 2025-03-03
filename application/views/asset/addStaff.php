<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>add staff </title>
</head>
<style>
body {
    font-size: 12px;
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
                <div class="m-1">
                <?php $this->load->view('asset/base'); ?>
                <div style="display: flex; justify-content: flex-end; gap: 10px; font-size: 18px; font-weight: bold; align-items: center;">
                    <span>
                        <?php if (!empty($org_name)): ?>
                            <p style="margin: 0;"><?= $org_name; ?></p>
                        <?php endif; ?>
                    </span> 

                    <?php if (!empty($org_name) && !empty($office_name)): ?>
                        <span>/</span>
                    <?php endif; ?>

                    <span>
                        <?php if (!empty($office_name)): ?>
                            <p style="margin: 0;"><?= $office_name; ?></p>
                        <?php endif; ?>
                    </span>
                </div>

                    <h5 class="text-center"><b>Register your staff here </b></h5>
                    <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <form action="<?php echo  base_url('Management/addStaff');?>" method="post"
                        style=" background-color: white; margin:1px; padding:7px;">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                            <label for="inputAddress">staff Name</label>
                            <input type="text" class="form-control" id="inputAddress" name='staff_name'
                                placeholder="Enter full name">
                                <!-- <label for="">select Organisation</label>
                                <label for="org_id">select Organisation </label>
                                <select name="org_id" id="org_id" class="form-control"
                                    placeholder="what is your master organisation" required>
                                    <option value="">Select Organisation Level</option>

                                    <?php if (!empty($data['org_data'])): ?>
                                    <option value="<?php echo $data['org_data']['org_id']; ?>"
                                        <?php echo ($data['org_data']['org_id'] == $selected_org_id) ? 'selected' : ''; ?>>
                                        <?php echo $data['org_data']['org_name']; ?>
                                    </option>
                                    <?php endif; ?>
                                </select> -->
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="">select Office </label>
                                <select name="office_id" id="office_id" class="form-control"
                                    placeholder="In which organisation you work" name='office_id' required>
                                    <option value="office_id" style="font-size: 12px;">select Office </option>
                                    <?php foreach($office as $deprt): ?>
                                    <option value="<?php echo $deprt['office_id']; ?>"
                                        <?php echo ($deprt['office_id'] == $selected_depart) ? 'selected' : ''; ?>>
                                        <?php echo $deprt['office_name']; ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div> -->
                            <div class="form-group col-md-6">
                                <label for="">Select Office</label>
                                <select name="office_id" id="office_id" class="form-control" required>
                                    <option value="" style="font-size: 12px;">Select Office</option>
                                    <?php foreach($office as $deprt): ?>
                                        <option value="<?php echo $deprt['office_id']; ?>"
                                            <?php echo ($deprt['office_id'] == $selected_depart) ? 'selected' : ''; ?>>
                                            <?php echo $deprt['office_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">select Degisnation </label>
                                <select name="Designation_id" id="Designation_id" class="form-control"
                                    placeholder="what is your designation" required>
                                    <option value="">Select Designation </option>
                                    <?php foreach($Designation_data as $des): ?>
                                    <option value="<?php echo $des['Designation_id']; ?>">
                                        <?php echo $des['Designation_name'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">current salary</label>
                                <input type="text" class="form-control" id="inputCity" name='salary'
                                    placeholder='salary in Rs...'>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name='staff_email'
                                    value="<?php echo set_value('staff_email')?>" placeholder="something@gmail.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name='staff_password'
                                    value="<?php echo set_value('staff_password')?>" placeholder="********">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">joining Date</label>
                                <input type="date" class="form-control" id="inputEmail4" name='joining_date'
                                    placeholder="joining_date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">D.O.B</label>
                                <input type="date" class="form-control" id="inputPassword4" name='date_of_birth'
                                    placeholder="yy-mm-dd">
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
                                <select name="cities" id="city_id" required class="form-control"
                                    style='background-color: #dbdbdb;'>
                                    <option value="">-- select your state's city-- </option>

                                    <?php foreach($data['cities'] as $ct):?>

                                    <option value="<?php echo $ct['city_id']; ?>"> <?php echo $ct['city_name'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Pincode</label>
                                <input type="text" class="form-control" name='pincode' id="inputZip"
                                    placeholder='12345...'>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-primary">
                                <a href="<?= base_url().'Management/getOrg' ?>" style="color: white; text-decoration: none;">Back to Page</a>
                        </button>

                    </form>
                </div>
            </div>
            <?php if(isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="alert alert-success mt-3" role="alert">
                Staff added successfully!
            </div>
            <?php endif; ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#state_id').click(function() {
                    var state_id = $(this).val();
                    console.log("Selected state ID: " + state_id);
                    $.ajax({
                        url: '<?php echo base_url('Management/getCities'); ?>', // URL to your AJAX handler
                        method: 'POST',
                        data: {
                            state_id: state_id
                        },
                        success: function(data) {
                            console.log("Received data: " + data);
                            $('#city_id').html(
                                data); // Update city dropdown with the new data
                        }
                    });
                });
            });
            </script>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
            </script>
</body>

</html>