<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/dashboard.css'?> ">

    <title>Content List</title>
    <style>
    body {
        font-size: 12px;
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>

<body>

    <div class="">
        <div class="row">
            <div class="col-md-2 main_daish">
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
                <h4 class="text-center"><b class="">Your Resources management Table</b></h4>
                <table class="">
                    <thead>
                        <tr>
                            <th>Content ID</th>
                            <th>Content Title</th>
                            <th>Catagory Id</th>
                            <th>Catagory Name</th>
                            <!-- <th>Uploaded File</th> -->
                            <th>Content Description</th>
                            <th>Download</th>
                            
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contents as $content): ?>
                        <tr>
                            <td><?php echo $content->content_id; ?></td>
                            <td><?php echo $content->content_title; ?></td>
                            <td><?php echo $content->categoryId; ?></td>
                            <td><?php echo $content->categoryName; ?></td>
                            <!-- <td><?php echo $content->filename; ?></td> -->
                            <td><?php echo $content->content_description; ?></td>
                            <td> <a href="">Download</a></td>
                            
                            <td> <button class="btn btn-primary btn-sm"><a href=""></a>Edit</button></td>
                            <td> <a href="<?= base_url('welcome/delete_content/'.$content->content_id) ?>"
                                    class="btn btn-dark btn-sm">Delete</a></td>

                            <?php endforeach; ?>
                    </tbody>
                </table> <br>
                <a href="<?=base_url().'welcome/content_add_form'?>" class="btn btn-primary btn-block">Add Catagory</a>
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

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>