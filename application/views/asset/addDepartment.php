<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Department</title>
</head>
<style>
body {
    font-size: 14px;
}

input[type=text],
input[type=date],
input[type=password] {
    font-size: 12px;
}
</style>

<body> 
    <?php $this->load->view('asset/assetNavbar'); ?>
    
    <div class="container">
    <h5 class="text-center">Add Organisation's Department </h5><br>
       <?php if ($this->session->flashdata('message')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p><?php echo $this->session->flashdata('message'); ?></p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
          </div>
      <?php endif; ?> 
        <?php if (isset($validation_errors)): ?>
        <div style="color: red;">
            <?php echo $validation_errors; ?>
        </div>
        <?php endif; ?>

        <?php if (isset($db_error)): ?>
        <div style="color: red;">
            <?php echo $db_error; ?>
        </div>
        <?php endif; ?>
        <div class="bg-info m-1 p-3">
            <form action="<?php base_url('Management/addDepartment') ?>" method='post' class="">
                <div class="form-group">
                    <label for="catagoryName">Department Name</label>
                    <input type="text" class="form-control" name='department_name'
                        placeholder='Enter Your department name....' required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">select  Organisation </label>
                         <select name="org_id" id="" class="form-control" placeholder="what is your master organisation" required>
                         <option value="">Select Organisation Level</option>
                         <?php foreach($org_data as $org): ?>
                             <option value="<?php echo $org['org_id']; ?>"> <?php echo $org['org_name'];?> </option>
                             <?php endforeach;?>
                         </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="catagoryName">level of Department </label>
                        <input type="text" class="form-control" name='department_level' placeholder=' how many level of your Department....'
                            required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="catagoryName">Location </label>
                        <input type="text" class="form-control" name='department_location'
                            placeholder='where is your organisation....' required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="catagoryName">created_Date </label>
                        <input type="date" class="form-control" name='created_at' placeholder='....' required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block m-1" >Add Department</button>
            </form>
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