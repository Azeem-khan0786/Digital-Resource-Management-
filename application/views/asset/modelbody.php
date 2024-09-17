
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
