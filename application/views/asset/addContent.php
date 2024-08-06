<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Content List</title>
    <style>
    input.form-control {
        background-color: #dbdbdb;
    }


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
    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10">

                <h4 class="text-center "><b>Add Digital Resources</b></h4>
                <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p><?php echo $this->session->flashdata('message'); ?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <form method="post" action='<?php echo base_url('Management/content_add_form');?>'
                    enctype="multipart/form-data" style=" background-color: lightblue; margin:0px">
                    <div class="form-row">
                        <div class="form-group m-3 col-md-4">
                            <label for="title">Content Title</label>
                            <input type="text" class="form-control" name='content_title' id="" placeholder="Add Title">
                        </div>
                        <div class="form-group m-3 col-md-4">
                            <label for="">CategoryName</label><br>
                            <select name="categoryId" id="" required class="form-control"
                                style='background-color: #dbdbdb;'>


                                <?php foreach($category as $cata):?>

                                <option value="<?php echo $cata['categoryId']; ?>"> <?php echo $cata['categoryName'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group m-3 col-md-4">
                            <label for="inputAddress">Add Date</label>
                            <input type="date" class="form-control" name='created_date' id="" placeholder="yy-mm-dd">
                        </div>
                        <div class="form-group m-3 col-md-4">
                            <label for="inputAddress2">Content Description</label>
                            <textarea rows="1" cols="" class="form-control" id="inputAddress2"
                                name='content_description' placeholder="Apartment, studio, or floor"
                                style='background-color: #dbdbdb;'></textarea>
                        </div>
                        <div class="form-group m-3 col-md-6">
                            <label for="file">File name:</label>
                            <input type="file" name="filename" /> 
                            <!-- <input type="submit" name="submit" class="bg-dark" value="Upload" /><br> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm m-3">Add here</button>
                    <button type="cancel" class="btn btn-dark ml-auto btn-sm m-3">cancel</button>

                </form>
                <br>
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