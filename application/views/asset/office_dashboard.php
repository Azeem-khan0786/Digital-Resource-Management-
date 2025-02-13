 
                <main>
                    <div class="">
                            <h3 class="mt-4">Dashboard</h3>
                            
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row m-auto d-flex justify-content-between">
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
                                    <div class="col-xl-4 col-md-4 p-3">
                                        <div class="card text-white mb-4" style='background: #66a3ff;'>
                                            <div class="card-body">Total Staff:
                                                <b> <?php echo $staff_count_off; ?> records</b>
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" 
                                                    href="<?= base_url('Management/getStaff/'.$office_id) ?>">View as Table</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-xl-4 col-md-4  p-3">
                                        <div class="card text-white mb-4" style='background: #666699;'>
                                            <div class="card-body">Total Content :
                                                <b><?php echo $this->db->count_all('ContentTable'); ?> records</b>
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="<?=base_url().'Management/showcontent'?>">View as Table</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </div> -->
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
                                    <div><a href="<?=base_url().'Management/addStaffByOfficeId/',$office_id?>" class="btn btn-primary">+ Add Staff</a></div>
                                    <div><a href="<?=base_url().'Management/addDesignationByOfficeId/',$office_id?>" class="btn btn-primary">+ Add Designation</a></div>

                                    </div>
                                    </div>
                                    </main>
 