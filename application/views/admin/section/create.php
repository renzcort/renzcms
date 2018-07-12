<!-- Main content -->
<section class="content">
  <div class="row">
    <?php $message = $this->session->flashdata('message'); ?>
    <?php if($message) { ?>
    <div class="alert alert-danger" role="alert">
      <p class="text-center"><?php echo $message; ?></p>
    </div>
    <?php } ?>
    <?php $attributes = array('role' => 'form') ?>
    <?php echo form_open_multipart(base_url($action).'/'.$segment.'/create', $attributes); ?>
    <!-- <form role="form"> -->
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $title ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php foreach ($getGroupByIdSection as $key) { ?>
            <input type="hidden" name="id_section" value="<?php echo $key->id_section?>">
            <div class="form-group">
              <label for="exampleInput<?php echo $key->label; ?>"><?php echo $key->label; ?></label>
              <?php if($key->type_field != 'TEXT') { ?>
                <?php if ($key->field == 'field_photo') { ?>
                  <input type="file" id="photoId" name="<?php echo $key->field; ?>" placeholder="Enter Photo">
                  <div class="image-preview">
                    <img src="" alt="" class="picture">
                  </div>
                <?php } elseif($key->field == 'field_actived') { ?>
                  <div class="checkbox-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $key->field; ?>" id="inlineRadio1" value="1" required>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="checkbox-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $key->field; ?>" id="inlineRadio2" value="0">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                  </div>
                <?php } elseif($key->field == 'field_email') { ?>
                  <input type="email" class="form-control" id="exampleInputUrl" name="<?php echo $key->field; ?>" placeholder="Enter <?php echo $key->label; ?>" required>
                <?php } else { ?>
                  <input type="text" class="form-control" id="exampleInputUrl" name="<?php echo $key->field; ?>" placeholder="Enter <?php echo $key->label; ?>" <?php echo ($key->field == 'field_title') ? "required" : ''; ?>>
                <?php } ?>
              <?php } else {  ?>
                <textarea name="<?php echo $key->field; ?>" class="form-control"></textarea>
              <?php } ?>
            </div>
          <?php } ?>

          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary btn-flat">Submit</button>
            <button type="reset" class="btn btn-warning btn-flat">Reset</button>
            <a href="<?php echo base_url($action.'/?id=').$id_section ?>" class="btn btn-default btn-flat">Cancel</a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  <!-- </form> -->
  <?php echo form_close(); ?>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->