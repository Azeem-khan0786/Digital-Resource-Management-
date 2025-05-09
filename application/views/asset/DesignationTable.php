<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Designation Table</title>
</head>
<style>
body {
    font-size: 14px;
}

input[type=text],
input[type=date],
input[type=password],
td {
    font-size: 12px;
}
</style>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success">
    <?= $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<div class="alert alert-danger">
    <?= $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>

<body> <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"><?php $this->load->view('asset/DashSidebar'); ?></div>
            <div class="col-md-10">
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
            <ol class=" text-center breadcrumb mb-4 mt-3 "><h5 class=" mr-auto text-center">Designation Table</h5>  </ol>
           

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div><i class="fas fa-table me-1 m-1"></i>Designation Data</div>
                        <div><a class="btn btn-primary" href="<?= base_url('Management/addDesignation' . (isset($office_id) ? '/' . $office_id : '')) ?>">
                            + Add Designation</a>
                        </div>  
                        
  
                    </div>
                    <div class="card-body">
                    <?php if (empty($Designation_data)): ?>
                            <tr>
                                <h3 colspan="3" class="text-center">Dont have any designation creaeted </h3>
                            </tr>
                        <?php else: ?>
                   
                    <table class='table table-striped' id='search-data-table'>
                        <tr>
                            <td>Designation_ID</td>
                            <td>Designation_Name</td>
                            <!-- <td>Organisation Name</td>
                            <td>Organisation Id</td> -->
                            <td>Created_at</td>
                            <td>Action</td>
                        </tr>

                        
                            <?php foreach ($Designation_data as $row): ?>
                                <tr>
                                    <td><?php echo $row['Designation_id']; ?></td>
                                    <td><?php echo $row['Designation_name']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td> <a href="<?= base_url('Management/delDesig/'.$row['Designation_id']) ?>"
                                            class="btn btn-dark btn-sm">Delete</a></td>
                                    <!-- <?php
                                    // Assuming $org_data is structured like: $org_data[$row['org_id']] = ['org_name' => 'Org Name'];
                                    if (isset($org_data[$row['org_id']])) {
                                        echo '<td>' . $org_data[$row['org_id']]['org_name'] . '</td>';
                                    } else {
                                        echo '<td>No Org Name</td>'; // Handle case where org_name is not found
                                    }
                                    ?> -->
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>

                     </div>
                </div>
            </div>
        </div>
    <!-- use office name -->
    <?php if ($this->session->userdata('office_name')): ?>
            <p>office_name: <?php echo $this->session->userdata('office_name'); ?></p>
    <?php endif; ?>
    <!-- use org org_name -->
    <?php if ($this->session->userdata('org_name')): ?>
             <p>org_name: <?php echo $this->session->userdata('org_name'); ?></p>
    <?php endif; ?>
    <!--  use span organisation/office/designation/assets -->
    <?php if ($this->session->userdata('Designation_name')): ?>
            <p>Designation: <?php echo $this->session->userdata('Designation_name'); ?></p>
    <?php endif; ?>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>