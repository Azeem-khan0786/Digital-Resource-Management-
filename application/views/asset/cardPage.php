<main>
    <div class="">
        <h3 class="mt-4">Dashboard</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row m-auto">
            <div class="col-xl-3 col-md-4 p-1">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Organisation Table :
                        <b><?php echo $this->db->count_all('OrganisationTable'); ?> records</b>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?=base_url().'Management/getOrg'?>">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        <?php if ($this->session->userdata('desig_level') == 2): ?>
            <div class="col-xl-3 col-md-6 p-1">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Office Table :
                        <b><?php echo $this->db->count_all('OfficeTable'); ?> records</b>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?=base_url().'Management/getOffice'?>">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 p-1">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Designation Table :
                        <b><?php echo $this->db->count_all('DesignationTable'); ?> records</b>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="<?=base_url().'Management/getDesignation'?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 p-1">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Staff Table :
                        <b><?php echo $this->db->count_all('staffTable'); ?> records</b>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?=base_url().'Management/getStaff'?>">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <?php endif;?>   
        </div>


</main>
<?php if ($this->session->userdata('desig_level') == 2): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url() . 'Management/getOffice' ?>">Office</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url() . 'Management/getDesignation' ?>">Designation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url() . 'Management/getStaff' ?>">Staff</a>
                    </li>
<?php endif;?>