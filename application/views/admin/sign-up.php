<!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                                <div class="mt-2 text-center">
                                    <h2>Create Your Account</h2>
                                </div>
                                <p class="mt-4 text-white lead text-center">
                                    Sign up to get started with Authority
                                </p>

                                <?php
                                    $message = $this->session->flashdata('message');
                                    if($message) { ?>
                                    <p class="mt-4 text-white lead text-center">
                                        <?php echo $message; ?>
                                    </p>
                                <?php }?>
                                <div class="mt-4">
                                    <?php $attributes = array('class' => 'form-control', 'id' => 'form-sign-up')?>
                                    <?php echo form_open('admin/login/signUp', '', $attributes); ?>
                                    <!-- <form> -->
                                        <div class="form-group">
                                            <input type="username" class="form-control" name="username" value="" placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="" placeholder="Enter email address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" value="" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="passconf" value="" placeholder="Confirm password">
                                        </div>
                                        <div class="form-group">
                                            <input type="firstname" class="form-control" name="firstname" value="" placeholder="Enter firstname">
                                        </div>
                                        <div class="form-group">
                                            <input type="lastname" class="form-control" name="lastname" value="" placeholder="Enter lastname">
                                        </div>
                                        <button type="submit" name="create" value="create" class="btn btn-primary btn-block">Create Account</button>
                                    <!-- </form> -->
                                    <?php echo form_close(); ?>
                                    <div class="clearfix"></div>
                                    <p class="content-divider center mt-4"><span>or</span></p>
                                </div>
                                <p class="mt-4 social-login text-center">
                                    <a href="#" class="btn btn-twitter"><em class="ion-social-twitter"></em></a>
                                    <a href="#" class="btn btn-facebook"><em class="ion-social-facebook"></em></a>
                                    <a href="#" class="btn btn-linkedin"><em class="ion-social-linkedin"></em></a>
                                    <a href="#" class="btn btn-google"><em class="ion-social-googleplus"></em></a>
                                    <a href="#" class="btn btn-github"><em class="ion-social-github"></em></a>
                                </p>
                                <p class="text-center">
                                    Already have an account? <a href="<?php echo base_url('admin/login'); ?>">Login Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mt-5 footer">
                        <p class="text-white small text-center">
                            &copy; 2017 Login/Register Forms. A FREE Bootstrap 4 component by 
                            <a href="https://wireddots.com">Wired Dots</a>. Designed by <a href="https://twitter.com/attacomsian">@attacomsian</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
