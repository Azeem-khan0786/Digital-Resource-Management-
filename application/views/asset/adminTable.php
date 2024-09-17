<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>admin Table</title>
  </head>
  <style>
    body
    {
        font-size:12px;
    }
    td {font-size: 12px;}
  </style>
  <body> 
  <?php $this->load->view('asset/assetNavbar'); ?>


    <h5 class="text-center">admin Table</h5><br>
    <?php if(isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <div class="alert alert-success mt-3" role="alert">
            admin added successfully!
        </div>
    <?php endif; ?>
    <div class="container-fluid">
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Holy guacamole!</strong>
                  
                      <div class="alert alert-success ">
                          <?= $this->session->flashdata('success'); ?>
                      </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
          </div>
        <?php endif; ?>  
   
            
    <table class ='table table-striped ' id='search-data-table'>
        <tr>
            <td>adminId</td>
            <td>staffId</td>
            <td>StaffName</td>
            <td>Email Address</td>
            <td>Designation_name</td>
            <td>Orgnisation name</td>
            <!-- <td>Designation_id</td> -->
            <td>Office Name</td>
            
            <!-- <td>OrgLevel</td> -->
            
        </tr>
       
        <?php foreach ($admindata as $row): ?>
          
            <tr>
                <td><?php echo $row['admin_id']; ?></td>
                <td><?php echo $row['staff_id']; ?></td>
                <td><?php echo $row['staff_name']; ?></td>
                <td><?php echo $row['staff_email']; ?></td>
                <td><?php echo $row['Designation_name']; ?> </td>
                <td><?php echo $row['org_name']; ?></td>
                <!-- <td><?php echo $row['Designation_id']; ?> </td> -->
                <td><?php echo $row['offie_name']; ?> </td>
                
                
                
                <!-- <td> <a href="<?= base_url('Management/delete_admin/'.$row['admin_id']) ?>" class="btn btn-dark btn-sm">Delete</a></td> -->

                

                <!-- Add other columns as needed -->
            </tr>
            
        <?php endforeach; ?>
    </table>
             
             <!-- <a href="<?=base_url().'Management/addStaff'?>" class="btn btn-primary">+ Add Staff</a> -->
    
    
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
