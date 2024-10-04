<?php  $office_id = $this->session->userdata('office_id');?>
<?php  $org_id = $this->session->userdata('org_id');?>
<?php  $org_id = $this->session->userdata('org_id');?>

<div class="col-md-12 w-100 ">
                <main>
                    <div class="">
                        
                        <ol class="breadcrumb mb-2 mt-2">
                            <li class="breadcrumb-item active"><b>Dashboard</b></li>
                        </ol>
                        <div class="row m-1 d-flex justify-content-between">
                        <?php if ($this->session->userdata('desig_level') == 1): ?>
                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card text-white mb-4" style="background-color: #6699ff;">
                                    <div class="card-body">Organisation Data :
                                    <b><?php echo $this->db->where('org_id', $this->session->userdata('org_id'))->count_all('OrganisationTable'); ?> records</b>

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="<?=base_url().'Management/getOrg'?>">View
                                            Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php if ($this->session->userdata('desig_level') == 2): ?>
                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card  text-white mb-4" style="background-color:#99bbff;">
                                <?php $office_count = $this->Manage_model->countOfficesByOrg($org_id);?>
                                    <div class="card-body">Total Office:
                                        <b><?php echo $office_count;  ?>
                                            records</b>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getOffice' ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card text-white mb-4" style="background-color:#1a8cff;">
                                <?php $desig_count = $this->Manage_model->countDesignationsByOrg($org_id);?>
                                    <div class="card-body">Designation Data :
                                    <b><?php echo $desig_count; ?> records</b>

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getDesignation' ?>">View
                                            Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card   text-white mb-4" style="background-color:#ff4d4d;">
                                <?php $staff_count_org = $this->Manage_model->countStaffByOrg($org_id);?>
                                    <div class="card-body">Staff Data :
                                    <b><?php echo $staff_count_org; ?>records</b>
        
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link text-white"
                                            href="<?= base_url() . 'Management/getStaff' ?>">View
                                            Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php if ($this->session->userdata('desig_level') == 3): ?>
                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card  text-white mb-4" style='background: #4d88ff;'>
                                    <div class="card-body">Category Data :
                                          <b><?php echo $this->db->count_all('categoryTable'); ?> records</b>

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="<?=base_url().'Management/showCategory'?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card  text-white mb-4" style='background: #66a3ff;'>
                                <?php $staff_count_off = $this->Manage_model->countStaffByOffice($office_id);?>
                                    <div class="card-body">Staff Data :
                                    <b><?php echo $staff_count_off; ?>records</b>
        
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="<?=base_url().'Management/getStaff'?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 p-3">
                                <div class="card  text-white mb-4" style='background: #666699;'>
                                    <div class="card-body">Others Data :
                                  

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        </div>


                </main>
            </div>