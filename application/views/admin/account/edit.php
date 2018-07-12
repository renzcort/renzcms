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
          <?php echo form_open_multipart(base_url($action).'/edit/'.$getDataById->id, $attributes); ?>
          <!-- <form role="form"> -->
          <input type="hidden" name="id" value="<?php echo $getDataById->id; ?>">
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputUsername">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputUsername" name="username" value="<?php echo $getDataById->username; ?>" placeholder="Enter Username" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputEmail">Email address</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo $getDataById->email; ?>" placeholder="Enter email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputFirstname">First Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputFirstname" name="firstname" value="<?php echo $getDataById->firstname; ?>" placeholder="Enter Firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputLastname">Last Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputLastname" name="lastname" value="<?php echo $getDataById->lastname; ?>" placeholder="Enter Lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputPassword">Password</label>
            <div class="col-sm-9">
              <button type="button" class="btn btn-primary" id="exampleInputPassword" placeholder="Password">Change Password</button>
            </div>
          </div>
          <!-- select -->
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputRole">Role</label>
            <div class="col-sm-9">
              <select name="role" class="form-control">
                <?php foreach ($role as $key) { ?>
                <option value="<?php echo $key->id ?>" <?php echo ($key->id == $getDataById->role)? 'selected':''; ?>><?php echo $key->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="exampleInputFile">File input</label>
            <div class="col-sm-9">
              <input type="file" id="photoId" name="photo">
              <p class="help-block">File only jpg/png max 2M</p>
              <div class="image-preview">
                <img src="<?php echo $filepath.'/'.$getDataById->photo; ?>" alt="" class="profile">
              </div>
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