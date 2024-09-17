<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Office</title>
</head>
<style>
body,
td,
tr {
    font-size: 12px;
}
</style>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"><?php $this->load->view('asset/DashSidebar'); ?></div>
            <div class="col-md-10">
                <!-- <h5 class="text-center"> Orgnisation's Office Table </h5><br> -->
                <ol class=" text-center breadcrumb mb-4 mt-3 ">
                    <h5 class=" mr-auto text-center">Orgnisation's Office Table </h5>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Orgnisation's Office Table
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id='search-data-table'>
                            <thead class="thead-dark">
                                <tr>
                                    <td>Office ID</td>
                                    <td>Organisation Id</td>
                                    <td>Office Name</td>
                                    <td> Office Admin</td>
                                    <!-- <td>Designation_name</td> -->
                                    <!-- <td>Created By</td> -->
                                    <td>Create At</td>
                                    <td>Location</td>
                                    
                                </tr>
                            </thead>
                            <?php foreach ($office as $row): ?>
                            <tr>
                                <td><?php echo $row['office_id']; ?></td>
                                <td><?php echo $row['org_id']; ?></td>
                                <td><?php echo $row['office_name']; ?></td>
                                <td><?php echo $row['staff_name']; ?></td>

                                <!-- <td><?php echo $row['created_by']; ?></td> -->
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['city_name']; ?><?php echo $row['state_name']; ?></td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <a href="<?=base_url().'Management/addOffice'?>" class="btn btn-primary">+ Add
                            Office</a>

                    </div>
                </div>
            </div>
        </div>
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