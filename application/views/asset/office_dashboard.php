<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Office Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body, td, tr {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10">
            <?php 
                    $org_name = $this->session->userdata('org_name') ?? ''; 
                    $office_name = $this->session->userdata('office_name') ?? $office_name; 
            ?>

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


                  
                <!-- <h5 class="mt-1 d-flex justify-content-end"><b><?= $office_name; ?></h5></b> -->
                <main>
                    <h3 class="mt-4">Dashboard</h3>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <!-- <div class="row m-auto d-flex justify-content-between">
                        <div class="col-xl-4 col-md-4 p-3">
                            <div class="card text-white mb-4" style='background: #4d88ff;'>
                                <div class="card-body">
                                    Total Category : <b><?php echo $this->db->count_all('categoryTable'); ?> records</b>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?=base_url().'Management/showCategory'?>">View as Table</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 p-3">
                            <div class="card text-white mb-4" style='background: #66a3ff;'>
                            <?php $staff_count_off = $this->Manage_model->countStaffByOffice($office_id);?>
                                            <div class="card-body">Total Staff :
                                                <b> <?php echo $staff_count_off; ?> records</b>
                                            </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('Management/getStaff/'.$office_id) ?>">View as Table</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 p-3">
                            <div class="card text-white mb-4" style="background-color:#1a8cff;">
                                <?php $desig_count = $this->Manage_model->countDesignationsByOffice($office_id); ?>
                                <div class="card-body">
                                    Total Designation : <b><?php echo $desig_count; ?> records</b>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="nav-link text-white" href="<?= base_url() . 'Management/getDesignationByOffice' ?>">View as Table</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div> -->
                    <div class="row m-auto d-flex justify-content-between">       
                        <div class="col-xl-4 col-md-4 p-3">
                            <div class="card text-white mb-4" style='background: #66a3ff;'>
                            <?php $staff_count_off = $this->Manage_model->countStaffByOffice($office_id);?>
                                            <div class="card-body">Total Staff :
                                                <b> <?php echo $staff_count_off; ?> records</b>
                                            </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('Management/getStaff/'.$office_id) ?>">View as Table</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 p-3">
                            <div class="card text-white mb-4" style="background-color:#1a8cff;">
                                <?php $desig_count = $this->Manage_model->countDesignationsByOffice($office_id); ?>
                                <div class="card-body">
                                    Total Designation : <b><?php echo $desig_count; ?> records</b>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?= base_url('Management/getDesignationByOffice/' . ($office_id ?? '')) ?>">View as Table</a>

                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        </div>    
                            <a href="<?=base_url().'Management/addStaffByOfficeId/'.$office_id?>" class="btn btn-primary">+ Add Staff</a>
                            <a href="<?=base_url().'Management/addDesignation/'.$office_id?>" class="btn btn-primary">+ Add Designation</a>
                        </div>
                        <div>
                           
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
