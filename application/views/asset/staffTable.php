<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Staff Table</title>
</head>
<style>
body {
    font-size: 12px;
}

.table td {
    font-size: 12px;
    padding: 5px;
    border: 1px #9ca0a3;
}
</style>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>
    <?php if(isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <div class="alert alert-success mt-3" role="alert">
        Staff added successfully!
    </div>
    <?php endif; ?>
    <div class="container-fluid">
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong>

            <div class="alert alert-success ">
                <?= $this->session->flashdata('success'); ?>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-md-2"><?php $this->load->view('asset/DashSidebar'); ?></div>
                <div class="col-md-10">
                    <!-- <h5 class="text-center">Registered Staff Table</h5><br> -->
                    <ol class=" text-center breadcrumb mb-4 mt-3 "><h5 class=" mr-auto text-center">Registered Staff Table</h5></ol>
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <div><i class="fas fa-table me-1 m-1"></i>Registered Staff Data</div>
                            <?php if (!$this->session->userdata('desig_level') != 4): ?>
                            <div><a href="<?=base_url().'Management/addStaff'?>" class="btn btn-primary">+ Add Staff</a></div>
                            <?php endif;?>
                        </div>
                        <div class="card-body">
                            <table class='table table-striped ' id='search-data-table'>
                                <tr style="font-weight:bold;">
                                    <td>staff_id</td>
                                    <td>StaffName</td>
                                    <td>Email Address</td>
                                    <td>Designation_name</td>
                                    <!-- <td>Orgnisation name</td> -->
                                    <td>Office Name</td>
                                    <td>Salary</td>
                                    <td>Created_at</td>
                                    <td>joining-date</td>
                                    <td>Date of Birth</td>
                                    <td>City</td>
                                    <td>State</td>
                                    <td>Action</td>
                                
                                </tr>
                                <?php if (empty($staffdata)): ?>
                                <tr>
                                    <td colspan="8" class="text-center"><b>No  have any staff Created  </b></td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($staffdata as $row): ?>

                                <tr>
                                    <td><?php echo $row['staff_id']; ?></td>
                                    <td><?php echo $row['staff_name']; ?></td>
                                    <td><?php echo $row['staff_email']; ?></td>
                                    <td><?php echo $row['Designation_name']; ?> </td>
                                    <!-- <td><?php echo $row['org_name']; ?></td> -->
                                    <td><?php echo $row['office_name']; ?> </td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td><?php echo $row['created_at']; ?> </td>
                                    <td><?php echo $row['joining_date']; ?></td>
                                    <td><?php echo $row['date_of_birth']; ?></td>
                                    <td><?php echo $row['city_name']; ?></td>
                                    <td><?php echo $row['state_name']; ?></td>
                                    <!-- <td><?php echo $row['pincode']; ?></td> -->
                                    <!-- <td><?php echo $row['level']; ?></td> -->
                                    <td> <a href="<?= base_url('Management/delStaff/'.$row['staff_id']) ?>"
                                            class="btn btn-dark btn-sm">Delete</a></td>



                                    <!-- Add other columns as needed -->
                                </tr>

                                <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>

                    


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- staffTable.php or your appropriate view file -->
    <!-- Your HTML content for staff table -->

    <!-- jQuery script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
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