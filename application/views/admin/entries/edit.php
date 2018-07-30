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
    <?php echo form_open_multipart(base_url($action).'/'.$segment.'/edit/'.$getDataById->id, $attributes); ?>
    <!-- <form role="form"> -->
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $title ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <input type="hidden" name="id" value="<?php echo $getDataById->id ?>">
          <input type="hidden" name="id_section" value="<?php echo $getDataById->id_section ; ?>">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $getDataById->title; ?>" required>
          </div>
          <?php foreach ($getGroupByIdSection as $key) { ?>
            <div class="form-group">
              <label for="exampleInput<?php echo $key->label; ?>"><?php echo $key->label; ?></label>
              <?php if($key->type_field != 'TEXT') { ?>
                <?php if ($key->field == 'field_photo') { ?>
                  <input type="file" id="photoId" name="<?php echo $key->field; ?>" placeholder="Enter Photo">
                  <div class="image-preview">
                    <img src="<?php echo $filepath.'/'.$getDataById->{$key->field}; ?>" alt="" class="picture">
                  </div>
                <?php } elseif($key->field == 'field_actived') { ?>
                  <div class="checkbox-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $key->field; ?>" id="inlineRadio1" value="1" <?php echo ($getDataById->{$key->field} == 1) ? 'selected' : '' ?> required>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="checkbox-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $key->field; ?>" id="inlineRadio2" value="0" <?php echo ($getDataById->{$key->field} == 0) ? 'selected' : '' ?>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                  </div>
                <?php } elseif($key->field == 'field_email') { ?>
                  <input type="email" class="form-control" id="exampleInputUrl" name="<?php echo $key->field; ?>" value="<?php echo $getDataById->{$key->field} ;?>" placeholder="Enter <?php echo $key->label; ?>" required>
                <?php } else { ?>
                  <input type="text" class="form-control" id="exampleInputUrl" name="<?php echo $key->field; ?>" value="<?php echo $getDataById->{$key->field} ;?>" placeholder="Enter <?php echo $key->label; ?>" <?php echo ($key->field == 'field_title') ? "required" : ''; ?>>
                <?php } ?>
              <?php } else {  ?>
                <textarea name="<?php echo $key->field; ?>" class="form-control"><?php echo $getDataById->{$key->field}; ?></textarea>
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