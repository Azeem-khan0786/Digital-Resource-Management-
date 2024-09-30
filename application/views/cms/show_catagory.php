<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
body {
    font-size: 12px;
}
</style>

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
                <div class="row">
                    <div class="col-md-12">
                       <?php $this->load->view('navbar')?>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-12">
                    <h5 class="text-center">Manage Your Catagory Records</h5>
                        <table class="table table-striped">
                            <tr>
                                <th>catagoryID</th>
                                <th>catagoryName</th>
                                <th>operation</th>
                            </tr>
                            <?php foreach($catagory as $cata):?>
                            <tr>
                                <td><?php  echo $cata['catagoryId'];?></td>
                                <td><?php   echo $cata['catagoryName'];?></td>
                                <td> <a href="<?= base_url('welcome/delete_catagory/'. $cata['catagoryId']) ?>" class="btn btn-dark btn-sm">Delete</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                         <a href="<?=base_url().'welcome/add_catagory'?>" class="btn btn-primary btn-block">Add Catagory</a>
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