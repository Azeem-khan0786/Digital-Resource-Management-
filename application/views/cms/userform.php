<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <style>
    body{
      font-size:12px;
    }
    .form-control{
      background-color: #fff;
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
        <?php $this->load->view('navbar'); ?>
        <h4 class="text-center"><b>User Registration Form</b></h4>
    <div class="container">
        <div class="row-md-6">
        <form method="post" action="<?php echo base_url('welcome/add_user');?>" style=" background-color: lightblue; margin:15px">
        <div class="form-group m-3 p-1">
              <label for="username" >Enter Username</label>
              <input type="text" class="form-control" id="username" name="username" value="" aria-describedby="emailHelp" placeholder="Enter yourname" required>
        </div>
        <div class="form-group m-3">
          
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group m-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name='password' id="exampleInputPassword" aria-describedby="emailHelp" placeholder="Enter Password" required>
        </div>
        <div class="form-group m-3">
          <label for="">Select User Role</label>
            <select name="RoleId" id="" class="form-control" placeholder="Select User Role" required>
              <option value="">Select Role</option>
              <?php foreach($roles as $role): ?>
                <option value="<?php echo $role['RoleId']; ?>"> <?php echo $role['RoleName'];?> </option>
                 <?php endforeach;?>
              </select>
              <br>
        </div>
         
        </div>
        <button type="submit" class="btn btn-primary m-3">Submit</button>
    </form>
        </div>
    </div>
        </div>
    </div>
</div>

    
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>