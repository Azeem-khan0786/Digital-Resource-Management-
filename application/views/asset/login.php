<!doctype html>
<html lang="en">
  <head>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php $this->load->view('asset/assetNavbar'); ?>  

       <?php if ($this->session->flashdata('message')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p><?php echo $this->session->flashdata('message'); ?></p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
          </div>
      <?php endif; ?> 
       <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p><?php echo $this->session->flashdata('error'); ?></p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
          </div>
      <?php endif; ?> 
    
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
            
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <div class="card shadow-lg border-0 rounded-lg mt-1">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4">Login</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php echo form_open('Management/login', array('staff_id' => 'loginForm')) ?>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="staff_email" id="email" class="form-control"
                                                    placeholder="Email" />
                                                <?php echo form_error('staff_email', '<div class="error">', '</div>') ?>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" name="staff_password" id="password"
                                                    class="form-control" placeholder="Password"
                                                    autocomplete="current-password">
                                                <?php echo form_error('staff_password', '<div class="error">', '</div>') ?>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword"
                                                    type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember
                                                    Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" name="submit" value="Login"
                                                    class="btn btn-primary" />
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="card-footer text-center py-3">
                                            <div class="small"><a href="register.html">Need an account? Sign up!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                
            </div>
    </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<!-- <script>
    $(document).ready(function() {
        // Event listener for the modal launch button
        $('.nav-link.btn-primary').on('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            
            // URL to fetch the modal content from
            var url = $(this).attr('href');
        
            // Perform Ajax GET request
            $.get(url, function(response) {
                // On successful response, update modal content
                $('#exampleModal').find('.modal-content').html(response);
                // Show the modal
                $('#exampleModal').modal('show');
            });
        });
    });
</script> -->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    </body>
</html>

