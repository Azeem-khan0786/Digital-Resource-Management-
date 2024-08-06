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
                <div class="">
                   <div class=" w-50 h-50  p-5" style="background-color:#80b3ff; margin: left 30px;">
                       <div class="bg-info text-center text-black h-50" style="width:540px height:500Px">Digital Resource center</div><br>
                       <h4 class="text-center">Login Page</h4>
                       <form action="<?=base_url('welcome/loginPage')?>" method="post">
                           <div class="form-group">
                               <label for="username">Username</label>
                               <input class="form-control" type="text" id="username" name="username" placeholder="username" required>
                           </div>
                           <div class="form-group">
                               <label for="password">Password</label>
                               <input class="form-control" type="password" id="password" name="password" placeholder="password" required>
                           </div>
                           <div class="form-group">
                           <button class="btn btn-primary btn-center mr-auto">Login </button> <br><br>
                           <h6 class="text-center">if you dont have Login <a href="#">Create user Account </a>here!!</h6>
                           </div>
                           
                       </form>
                     </div>
                    </div>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>