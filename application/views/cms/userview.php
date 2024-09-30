<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
    body {
        font-size: 12px;
    }
    </style>
</head>

<body>
    <div class="">
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
            <?php $this->load->view('navbar'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>UserId</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>RoleID</th>
                        <th>Download</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($items as $row): ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>

                        <td><?php echo $row['RoleId']; ?></td>
                        <!-- <td><?php echo $row['RoleName']; ?></td> -->


                        <td> <a href="<?php echo base_url();?>/download/<?php echo $row['user_id']; ?>">Download</a>
                        </td>
                        <td> <button class="btn btn-primary btn-sm"><a
                                    href="<?php echo base_url();?>/edit/<?php echo $row['user_id']; ?>"></a>Edit</button>
                        </td>
                        <td> <a href="<?= base_url('welcome/delete_user/'.$row['user_id']) ?>" class="btn btn-dark btn-sm">Delete</a></td>


                    </tr>
                    <?php endforeach; ?>
                </table>
                <button class="btn btn-secondary btn-lg btn-block"> <a href="<?= base_url('welcome/add_user'); ?>"
                        style="color: black; text-decoration: none;">Add user</a></button>
                
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                        <?php endif; ?>

                         <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                       <?php endif; ?>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>