<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title; ?></h3>
        </div>
        <div class="box-body">
          <?php $message = $this->session->flashdata('message'); ?>
          <?php if($message) { ?>
          <div class="alert alert-danger" role="alert">
            <p class="text-center"><?php echo $message; ?></p>
          </div>
          <?php } ?>
          <?php $attributes = array('role' => 'form') ?>
          <?php echo form_open_multipart(base_url($action).'/create', $attributes); ?>
<<<<<<< HEAD
          <!-- <div class="form-group">
=======
          <div class="form-group">
>>>>>>> 05f80e2747075c945644ea1cfd53e469768b1689
            <label for="exampleInputUsername">Name</label>
            <input type="text" class="form-control" id="exampleInputname" name="title" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername">Name</label>
            <select class="form-control" name="type">
              <option value="0">- None -</option>
              <option value="1">Single</option>
              <option value="2">Channel</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea name="description" class="form-control" id="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
<<<<<<< HEAD
          </div> -->
          <div class="form-group">
            <label>Name Field</label>
            <select class="multiple"></select>
          </div>

=======
          </div>
>>>>>>> 05f80e2747075c945644ea1cfd53e469768b1689
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>
          <!-- </form> -->
        <?php echo form_close(); ?>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>