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
          <input type="hidden" name="id" value="<?php echo $getDataById->id; ?>">
          <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $getDataById->name; ?>" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" class="form-control" id="exampleInputTitle" name="title" value="<?php echo $getDataById->title; ?>" placeholder="Enter Title" required>
          </div>
          <div class="form-group">
            <label for="exampleInputUrl">Url</label>
            <input type="text" class="form-control" id="exampleInputUrl" name="url" value="<?php echo $getDataById->url ?>" placeholder="Enter Url">
          </div>
          <div class="form-group">
            <label for="exampleInputPicture">Picture</label>
            <input type="file" id="photoId" name="photo" placeholder="Enter Photo">
            <div class="image-preview">
              <img src="<?php echo $filepath.'/'.$getDataById->photo; ?>" alt="" class="picture">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea name="description" class="form-control" id="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo $getDataById->description ?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputStatus">Active</label>
            <div class="checkbox-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <?php if($getDataById->status == 1) echo "checked"; ?> required>
              <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="checkbox-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <?php if($getDataById->status == 0) echo "checked"; ?>>
              <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
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
