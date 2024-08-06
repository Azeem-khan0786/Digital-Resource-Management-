<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dropdown .css">
    <title>Dropdown Example</title>
</head>

<style>
.name a {
    text-decoration: none;
    color: #004d00;
    padding: 3px 1px;

}

.list-group-item a {
    text-decoration: none;
   
    color: black;
    font: size 12px;
    font-weight:bold;
}

.list-group-item .dropdown {
    width: 100%;
}

.list-group-item {
    /* padding: 3px 1px; */
    text-align: center;
    margin: 2px;
    background-color: LightGray;
}

.sidebar {
    margin-left: -13px;
}
</style>
<body>
    <div class="sidebar">
        <ul class="list-group">
            <div class="card" style="border-radius: 5px;background-color:LightGray; height:140px;width:206px" ;>
                <div class="card-body text-center p-1 m-1">
                    <div class="mt-1 mb-1">
                        <img src="<?php echo base_url('images/userlogo.png'); ?>" class="rounded-circle img-fluid"
                            style="width: 100px;" />
                    </div>
                    <?php if (isset($_SESSION['staff_name'])) : ?>
                    <h6 class="name"><b><a href=""> <?= $_SESSION['staff_name'] ?></a></b></h6>
                    <?php endif; ?>
                </div>
            </div>

            <li class="list-group-item "><a href="<?=base_url().'Management/'?>">Home</a></li>
            <!-- <li class="list-group-item "><a href="about.php">About</a></li>
            <li class="list-group-item "><a href="contact.php">Contact</a></li> -->

            <!-- Authentication links -->
            <ul class="list-group">
                <?php if (isset($_SESSION['staff_name'])) : ?>
                <!-- <li class="list-group-item "><a href=""> <?= $_SESSION['staff_name'] ?></a></li> -->
                <li class="list-group-item "><a href="<?= base_url('Management/logout') ?>">SignOut</a></li>

                <?php else : ?>

                <li class="list-group-item "><a href="<?= base_url('Management/login') ?>">SignIn</a></li>
                <?php endif; ?>

            </ul>
            <!-- Bootstrap Dropdown -->
            
            <li class="list-group-item "><a href="<?= base_url('Management/addCategory') ?>">Add Catagory</a></li>
            <li class="list-group-item "><a href="<?= base_url('Management/showCategory') ?>">View Catagory</a></li>
            <li class="list-group-item "><a href="<?= base_url('Management/content_add_form') ?>">Add Content</a></li>
            <li class="list-group-item "><a href="<?= base_url('Management/showcontent') ?>">View Content</a></li>
            <li class="list-group-item m-1" style="background-color: Tomato;">
                <a href="https://codeigniter.com/userguide3/installation/downloads.html">Codeigniter3</a><br>
            </li>

        </ul>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>