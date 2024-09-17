<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous">
    <title>Content List</title>
    <style>
    body {
        font-size: 12px;
    }
    
    li {
  list-style-type: none;
}

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <!--Main Navigation-->
                <!--  -->
                <?php $this->load->view('header'); ?>
                <!--Main Navigation-->

                <!--Main layout-->
                <main style="margin-top: 58px;">
                    <div class="container pt-4"></div>
                </main>
                <!--Main layout-->
            </div>
            <div class="col-md-10">
                <?php $this->load->view('navbar')?>

                <?php if ($this->session->userdata('user_id')): ?>
                    <div class="row">
                        <div class="p-3" style="height:7vh ; width:80vw; background-color:lightgreen;margin-left: 17px;display: flex;justify-content: space-between;
                                align-items: center;">
                            <li class="">Welcome, <?php echo $this->session->userdata('username'); ?></li>
                            <li class=""><?php echo $this->session->flashdata('success'); ?></li>
                            <li class=""><a href="<?php echo base_url('welcome/logout'); ?>"
                                    style="text-decoration:none;">Logout</a></li>
                        </div>
                    </div>
                    <br><br>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Catagories</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                            <h6 class="card-header bg-white text-center"><a
                                    href="<?=base_url().'welcome/showcatagory'?>"
                                    style="color: black; text-decoration:none; "><b>Catagories Details </b></a></h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Users</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                            <h6 class="card-header bg-white text-center"><a
                                    href="<?=base_url().'welcome/showUserTable'?>"
                                    style="color: black; text-decoration:none; "><b>Users Details </b></a></h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Resources</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                            <h6 class="card-header bg-white text-center"><a href="<?=base_url().'welcome/showcontent'?>"
                                    style="color: black; text-decoration:none; "><b>Resources Details </b></a></h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Comments</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                            <h6 class="card-header bg-white text-center"><a href="#"
                                    style="color: black; text-decoration:none; "><b>Comments Details </b></a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
