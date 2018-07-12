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
          <?php $attributes = array('role' => 'form') ?>
          <?php echo form_open_multipart(base_url($action).'/create', $attributes); ?>
          <!-- <form role="form"> -->
          <input type="hidden" class="form-control" name="title" value="section">
          <div class="form-group">
            <label for="exampleInputUsername">Name</label>
            <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="Enter name" required>
          </div>
          <!-- select -->
          <div class="form-group">
            <label>Section</label>
            <select class="form-control" name="section">
              <option value="0">None</option>
              <?php foreach ($getAllSection as $key) { ?>
              <option value="<?php echo $key->id ?>"><?php echo $key->name ?></option>
              <?php } ?>
            </select>
          </div>
          <!-- select -->
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type">
              <option value="0">None</option>
              <option value="INT">INT</option>
              <option value="VARCHAR">VARCHAR</option>
              <option value="TEXT">TEXT</option>
              <option value="DATE">DATE</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea name="description" class="form-control" id="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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