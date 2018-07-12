<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $title ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php $message = $this->session->flashdata('message'); ?>
          <?php if($message) { ?>
          <div class="alert alert-danger" role="alert">
            <p class="text-center"><?php echo $message; ?></p>
          </div>
          <?php } ?>
          <?php $attributes = array('role' => 'form', 'class' => 'form-horizontal') ?>
          <?php echo form_open_multipart(base_url($action).'/create', $attributes); ?>
          <!-- <form role="form"> -->
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputUsername">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Enter Username" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputEmail">Email address</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputFirstname">First Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputFirstname" name="firstname" placeholder="Enter Firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputLastname">Last Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputLastname" name="lastname" placeholder="Enter Lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputPassword">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputPassconf">Passconf</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="exampleInputPassconf" name="passconf" placeholder="Passconf" required>
            </div>
          </div>
          <!-- select -->
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputRole">Role</label>
            <div class="col-sm-9">
              <select name="role" class="form-control">
                <?php foreach ($role as $key) { ?>
                <option value="<?php echo $key->id ?>"><?php echo $key->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputFile">File input</label>
            <div class="col-sm-9">
              <input type="file" id="photoId" name="photo">
              <div class="image-preview">
                <img src="" alt="" class="profile">
              </div>
              <p class="help-block">File only jpg/png max 2MB</p>
            </div>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> I agree to the terms of services
            </label>
          </div>
          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary btn-flat">Submit</button>
            <button type="reset" class="btn btn-warning btn-flat">Reset</button>
            <a href="<?php echo base_url($action) ?>" class="btn btn-default btn-flat">Cancel</a>
          </div>
          <!-- </form> -->
          <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->