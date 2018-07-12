<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 mx-auto">
                <div class="card border-none">
                    <div class="card-body">
                        <div class="mt-2">
                            <img src="<?php echo base_url('assets/backend/images/'); ?>male.jpg" alt="Male" class="brand-logo mx-auto d-block img-fluid rounded-circle"/>
                        </div>
                        <p class="mt-4 text-white lead text-center">
                            Sign in to access your Authority account
                        </p>
                        <?php
                        $message = $this->session->flashdata('message');
                        if($message) { ?>
                        <p class="mt-4 text-white lead text-center">
                            <?php echo $message; ?>
                        </p>
                        <?php }?>
                        <div class="mt-4">
                            <?php $attributes = array('class' => 'login-form', 'id' => 'login-form'); ?>
                            <?php echo form_open('admin/login/cek_login/', $attributes);  ?>
                            <!-- <form> -->
                            <!-- <div class="form-group">
                                <input type="email" class="form-control" id="email" value="" placeholder="Enter email address">
                            </div> -->
                            <?php echo form_error('username'); ?>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Enter username">
                            </div>
                            <?php echo form_error('password'); ?>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Enter password">
                            </div>
                            <label class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description text-white">Keep me logged in</span>
                            </label>
                            <button type="submit" name="sign-in" value="sign-in" class="btn btn-primary float-right">Sign in</button>
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
                            Don't have an account yet? <a href="<?php echo base_url('admin/login/signup'); ?>">Sign Up Now</a>
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