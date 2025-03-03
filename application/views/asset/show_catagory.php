<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Dashboard Page</title>
</head>
<style>
body {
    font-size: 12px;
}
</style>

<body>
    <?php $this->load->view('asset/assetNavbar'); ?> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 ">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10 w-100 ">
            <?php $this->load->view('asset/base'); ?>
                <main>
                    <div class="">
                    <?php $this->load->view('asset/cardPage'); ?>
                        <!-- <h3 class="mt-4">Dashboard</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        
                        <!-- Admin Table -->
                        <div class="card mb-2">
                            <div class="card-header d-flex justify-content-between">
                                <div><i class="fas fa-table me-1 m-1"></i>Manage your content`s category</div>
                                <div>
                                    <a href="<?= base_url('Management/addCategory/' . ($office_id ?? '')) ?>" 
                                            class="btn btn-primary btn-block">Add Category
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body ">
                                <table class='table table-striped ' id='search-data-table' style="font-size: 12px;">
                                    <tr style="font-weight: bold;">

                                        <th>CategoryID</th>
                                        <th>CategoryName</th>
                                        <th>Created_At</th>
                                        <th>operation</th>
                                    </tr>
                                    <?php if (empty($category)): ?>
                                <tr>
                                    <td colspan="8" class="text-center"><b>Don`t have any category Created </b></td>
                                </tr>
                                <?php else: ?>
                                        <?php foreach($category as $cata):?>
                                        <tr>
                                            <td><?php  echo $cata['categoryId'];?></td>
                                            <td><?php   echo $cata['categoryName'];?></td>
                                            <td><?php   echo $cata['created_at'];?></td>

                                            <td> <a href="<?= base_url('Management/delete_category/'. $cata['categoryId']) ?>"
                                                    class="btn btn-dark btn-sm">Delete</a></td>
                                        </tr>

                                        <?php endforeach; ?>
                                <?php endif; ?>
                                </table>
                            </div>
                        </div>
                        
                    </div>
            </div>

            </main>
        </div>
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



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

</body>

</html>

