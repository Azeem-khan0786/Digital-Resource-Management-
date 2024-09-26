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
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10">

                <div class="card-header "><i class="fas fa-table me-1 m-1"></i>Manage your content</div>

                <div class="card-body ">
                    <table class='table table-striped ' id='search-data-table' style="font-size: 12px;">
                        <tr style="font-weight: bold;">

                            <th>Content ID</th>
                            <th>Content Title</th>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Uploaded File</th>
                            <th>Content Description</th>
                            <th>Download</th>
                            <td>Created_at</td>
                            <!-- <th>Edit</th> -->
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
                                <td><?php echo $content->filename; ?></td>
                                <td><?php echo $content->content_description; ?></td>
                                <td><?php echo $content->created_at; ?> </td>
                                <td><a href="<?php echo base_url().'uploads/'.$content->filename; ?>"      class="btn btn-success btn-sm" download>
                                <i class="fa fa-download"></i> Download
                            </a></td>
                                <!-- <td> <button class="btn btn-primary btn-sm"><a href=""></a>Edit</button></td> -->
                                <td> <a href="<?= base_url('Management/delete_content/'.$content->content_id) ?>"
                                        class="btn btn-dark btn-sm">Delete</a></td>

                                <?php endforeach; ?>
                        </tbody>
                    </table> <br>
                    <a href="<?=base_url().'Management/content_add_form'?>" class="btn btn-primary btn-block">Add
                        Category</a>
                    

                </div>
            </div>
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

