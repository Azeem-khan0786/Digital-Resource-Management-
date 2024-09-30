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
                                    <div class="card-body">Organisation Table :
                                        <!-- <b><?php echo $this->db->count_all('OrganisationTable'); ?> records</b> -->
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
                                    <div class="card-body">Office Table :
                                        <!-- <b><?php echo $this->db->count_all('OfficeTable'); ?> records</b> -->
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
                                    <div class="card-body">Designation Table :
                                        <!-- <b><?php echo $this->db->count_all('DesignationTable'); ?> records</b> -->
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
                                    <div class="card-body">Staff Table :
                                        <!-- <b><?php echo $this->db->count_all('staffTable'); ?> records</b> -->
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
                                    <div class="card-body">Category Table :
                                        <!-- <b><?php echo $this->db->count_all('categoryTable'); ?> records</b> -->
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
                                    <div class="card-body">Staff Table :
                                        <!-- <b><?php echo $this->db->count_all(''); ?> records</b> -->
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
                                    <div class="card-body">Others Table :
                                        <!-- <b><?php echo $this->db->count_all(''); ?> records</b> -->
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