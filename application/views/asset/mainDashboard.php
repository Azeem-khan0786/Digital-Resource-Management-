<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* For mobile phones, ensure columns fill the width */
        @media (max-width: 768px) {
            .col-sm-12 {
                width: 100%;
            }

            /* Optional: Adjust cards for smaller screens */
            .card-body {
                font-size: 14px;
            }
        }
    </style>
</head>

<?php  $office_id = $this->session->userdata('office_id');?>
<?php  $org_id = $this->session->userdata('org_id');?>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-none d-md-block">
                <?php $this->load->view('asset/DashSidebar'); ?>

            </div>
            <div class="col-md-9 col-lg-10 col-sm-12">
            <?php $this->load->view('asset/base'); ?>
                <main>

                    <div class="">
                        <h3 class="mt-4">Dashboard</h3>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row m-auto d-flex justify-content-between">
                            <?php if ($this->session->userdata('desig_level') == 1): ?>
                            <div class="col-xl-4 col-md-6 col-sm-12 p-3">
                                <div class="card text-white mb-4" style="background-color: #6699ff;">
                                    <?php $org_count = $this->Manage_model->countOrg();?>
                                    <div class="card-body">Total Organisation :
                                        <b><?php echo $org_count;?>
                                         records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="<?=base_url().'Management/getOrg'?>">View as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if ($this->session->userdata('desig_level') == 2): ?>
                            <div class="col-xl-4 col-md-6 col-sm-12 p-3">
                                <div class="card text-white mb-4" style="background-color:#99bbff;">
                                    <?php $office_count = $this->Manage_model->countOfficesByOrg($org_id);?>
                                    <div class="card-body">Total Office:
                                        <b><?php echo $office_count;  ?>
                                            records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getOffice' ?>">View as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div><?php endif;?>
                            <?php if ($this->session->userdata('desig_level') == 2): ?>
                            <div class="col-xl-4 col-md-6 col-sm-12 p-3">
                                <div class="card text-white mb-4" style="background-color:#1a8cff;">
                                    <?php $desig_count = $this->Manage_model->countDesignationsByOrg($org_id);?>
                                    <div class="card-body">Total Designation :
                                        <b><?php echo $desig_count; ?>
                                            records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getDesignation' ?>">View
                                            as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12 p-3">
                                <div class="card text-white mb-4" style="background-color:#ff4d4d;">
                                    <?php $staff_count_org = $this->Manage_model->countStaffByOrg($org_id);?>
                                    <div class="card-body">Total Staff :
                                        <b><?php echo $staff_count_org; ?>
                                            records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getStaff' ?>">View as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if (($this->session->userdata('desig_level') == 3) ): ?>
                            <div class="col-xl-4 col-md-4  p-3">
                                <div class="card text-white mb-4" style='background: #4d88ff;'>
                                    <div class="card-body"> Total Category :
                                        <b><?php echo $this->db->count_all('categoryTable'); ?> records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="<?=base_url().'Management/showCategory'?>">View as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4  p-3">
                                <div class="card text-white mb-4" style='background: #66a3ff;'>
                                    <?php $staff_count_off = $this->Manage_model->countStaffByOffice($office_id);?>
                                    <div class="card-body">Total Staff :
                                        <b> <?php echo $staff_count_off; ?> records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="<?=base_url().'Management/getStaff'?>">View as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4  p-3">
                                <div class="card text-white mb-4" style='background: #666699;'>
                                    <div class="card-body">Total Content :
                                        <b><?php echo $this->db->count_all('ContentTable'); ?> records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=base_url().'Management/showcontent'?>">View as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4  p-3">
                                <div class="card text-white mb-4" style="background-color:#1a8cff;">
                                    <?php $desig_count = $this->Manage_model->countDesignationsByOffice($office_id);?>
                                    <div class="card-body">Total Designation :
                                        <b><?php echo $desig_count; ?>
                                            records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getDesignationByOffice' ?>">View
                                            as Table</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            
                            <?php
                                if ($this->session->userdata('desig_level') == 4) {
                                    // Redirect to the specified URL
                                    redirect('Management/showcontentbystaff');
                                }
                                ?>
                        </div>
                </main>
            </div>
        </div>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
