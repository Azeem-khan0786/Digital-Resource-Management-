<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Organisation</title>
</head>
<style>
body {
    font-size: 14px;
}

td {
    font-size: 12px;
}
</style>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"><?php $this->load->view('asset/DashSidebar'); ?></div>
            <div class="col-md-10">
            <!-- <h5 class="text-center">Organisation Table</h5><br> -->
            <ol class=" text-center breadcrumb mb-4 mt-3 "><h5 class=" mr-auto text-center">Organisation Table</h5></ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Organisation Table
                    </div>
                    <div class="card-body">

                        <table class='table table-striped ' id='search-data-table'>
                            <tr style="font-weight:bold;">
                                <td>OrgID</td>
                                <td>OrgName</td>
                                <td>OrgType</td>
                                <td>OrgLevel</td>
                                <td>Orglocation</td>
                                <td>created_at</td>
                            </tr>
                            <?php foreach ($org_data as $row): ?>
                            <tr>
                                <td><?php echo $row['org_id']; ?></td>
                                <td><?php echo $row['org_name']; ?></td>
                                <td><?php echo $row['org_type']; ?></td>
                                <td><?php echo $row['org_level']; ?></td>
                                <td><?php echo $row['org_location']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>


                                <!-- Add other columns as needed -->
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <a href="<?=base_url().'Management/addOrg'?>" class="btn btn-primary">+ Add Organisation</a>

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