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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10 ">
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
                <div class="m-1">
                    <h4 class="text-center">Add New Designation</h4>
                    <hr>
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
                    <!-- <form action="<?php echo base_url('Management/addDesignation'); ?>" method="post"> -->
                    <form action="<?= base_url('Management/addDesignation/' . ($office_id ?? '')) ?>" method="post">
                    <input type="hidden" name="office_id" value="<?= $office_id; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="catagoryName">Designation Name</label>
                                <input type="text" class="form-control" name='Designation_name'
                                    value="<?php echo set_value('Designation_name')?>" placeholder='Add Designation....'
                                    required>
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="catagoryName">Designation Assigned level</label>
                                <input type="number" class="form-control" name='desig_level'
                                    value="<?php echo set_value('desig_level')?>" placeholder='Add Assigned level....'
                                    required>
                            </div> -->
                            <?php 
                            $desig_level = $this->session->userdata('desig_level'); // Get logged-in user's designation level
                            $allowed_levels = range($desig_level + 1, 4); // Generate allowed levels (e.g., if 2 → [3,4])
                            ?>
                            <div class="form-group col-md-6">
                                <label for="catagoryName">Designation Assigned Level</label>
                                <select class="form-control" name="desig_level" required>
                                    <option value="">Select Assigned Level...</option>
                                    <?php foreach ($allowed_levels as $level): ?>
                                        <option value="<?php echo $level; ?>" <?php echo set_select('desig_level', $level); ?>>
                                            <?php echo $level; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Select OrgLevel</label>
                            <select name="org_id" id="" class="form-control" required>
                                <option value="">Select Organisation Level</option>
                                <?php foreach($org_data as $org): ?>
                                <option value="<?php echo $org['org_id']; ?>"
                                    <?php echo ($org['org_id'] == $selected_org_id) ? 'selected' : ''; ?>>
                                    <?php echo $org['org_name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->
                        <button style=" z-index: 50;" type="submit" class="btn btn-primary btn-block">Add Designation</button>  
                    </form>
                </div>
                
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous">
                </script>

            </div>

        </div>
    </div>
</body>

</html>