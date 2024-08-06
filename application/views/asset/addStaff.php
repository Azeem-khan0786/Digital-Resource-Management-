<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>add staff </title>
  </head>
  <style>
        body {font-size: 12px;}
        input[type=text],
        input[type=date],
        input[type=email],
        input[type=password] ,option {font-size: 12px;}
  </style>
  <body>
  <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container">
      <h5 class="text-center" >Register your staff here  </h5>
      <?php if ($this->session->flashdata('message')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p><?php echo $this->session->flashdata('message'); ?></p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
          </div>
      <?php endif; ?>  
      
      <form action="<?php echo  base_url('Management/addStaff');?>" method="post">
            <div class="form-group">
                <label for="inputAddress">staff Name</label>
                <input type="text" class="form-control" id="inputAddress" name='staff_name' placeholder="Enter full name">
            </div>
            <div class="form-row">
                 
                 <div class="form-group col-md-6">
                       <label for="">select Organisation</label>
                       <select name="org_id" id="" class="form-control" placeholder="In which organisation you work" name='org_id' required>
                       <option value=""  style="font-size: 12px;">Select Organisation Level</option>
                       <?php foreach($org_data as $org): ?>
                           <option value="<?php echo $org['org_id']; ?>"> <?php echo $org['org_name'];?> </option>
                           <?php endforeach;?>
                       </select>
                 </div>
                 <div class="form-group col-md-6">
                        <label for="">select Department </label>
                         <select name="department_id" id="" class="form-control" placeholder="what is your department" required>
                         <option value="">Select  your department</option>
                         <?php foreach($department as $des): ?>
                             <option value="<?php echo $des['department_id']; ?>"> <?php echo $des['department_name'];?> </option>
                             <?php endforeach;?>
                         </select>
                 </div>
            </div>
            <div class="form-row">
                 
                 <div class="form-group col-md-6">
                 <label for="">select Degisnation </label>
                         <select name="Designation_id" id="" class="form-control" placeholder="what is your designation" required>
                         <option value="">Select Designation Level</option>
                         <?php foreach($Designation_data as $des): ?>
                             <option value="<?php echo $des['Designation_id']; ?>"> <?php echo $des['Designation_name'];?> </option>
                             <?php endforeach;?>
                         </select>
                 </div>
                 <div class="form-group col-md-6">
                 <label for="inputCity">current salary</label>
                 <input type="text" class="form-control" id="inputCity" name='salary' placeholder='salary in Rs...'>
                 </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4"  name='staff_email' value="<?php echo set_value('staff_email')?>" placeholder="something@gmail.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name='staff_password' value="<?php echo set_value('staff_password')?>" placeholder="********">
                  </div>
            </div>

            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">joining Date</label>
                    <input type="date" class="form-control" id="inputEmail4" name='joining_date' placeholder="joining_date">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">D.O.B</label>
                    <input type="date" class="form-control" id="inputPassword4" name='date_of_birth' placeholder="yy-mm-dd">
                  </div>
            </div>
            
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Address</label>
                    <input type="text" class="form-control" id="inputCity" name='address' placeholder='where you live...'>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <input type="text" class="form-control" id="inputCity" name='state' placeholder='select your state...'>
                  </div>  
                  <div class="form-group col-md-2">
                    <label for="inputZip">Pincode</label>
                    <input type="text" class="form-control" name='pincode' id="inputZip"placeholder='12345...'>
                  </div>
            </div>
            
             <button type="submit" class="btn btn-primary">Sign in</button>
     </form>
     <?php if(isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <div class="alert alert-success mt-3" role="alert">
            Staff added successfully!
        </div>
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

