

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
          <?php echo form_open_multipart(base_url($action).'/edit/'.$getDataById->id, $attributes); ?>
          <!-- <form role="form"> -->
          <input type="hidden" class="form-control" name="name" value="entries">
          
          <div class="form-group">
            <ul id="sortable1" class="connectedSortable">
              <?php foreach ($getAllField as $value) { ?>
                <li class="ui-state-default"><?php echo $value->name; ?></li>
              <?php } ?>
            </ul>
            <ul id="sortable2" class="connectedSortable">
            </ul>
          </div>
          <!-- select -->
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

