<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <div class="col-md-6">
            <h4><i class="fa fa-list"></i> &nbsp; <?php echo $title ?></h4>
          </div>
          <div class="col-md-6 text-right">
            <div class="btn-group margin-bottom-20">
              <a href="http://scripts.codeglamour.com/ci_adminlte/admin/users/create_users_pdf" class="btn btn-success">Export as PDF</a>
              <a href="http://scripts.codeglamour.com/ci_adminlte/admin/users/export_csv" class="btn btn-success">Export as CSV</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $message = $this->session->flashdata('message'); ?>
  <?php if($message) { ?>
  <div class="alert alert-success alert-dismissible">
    <i class="icon fa fa-check"></i>
    <?php echo $message; ?>
  </div>
  <?php } ?>
  <div class="row">
<<<<<<< HEAD

    <div class="col-xs-12">
=======
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <!-- <h3 class="box-title"><?php echo $title; ?></h3> -->
        </div>
        <div class="box-body">
        <?php $attributes = array('role' => 'form') ?>
          <?php echo form_open_multipart(base_url($action).'/create', $attributes); ?>
          <input type="hidden" class="form-control" name="name" value="entries">
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
            <label>Entries</label>
            <select class="form-control" name="field">
              <option value="0">None</option>
              <?php foreach ($getAllField as $key) { ?>
              <option value="<?php echo $key->id ?>"><?php echo $key->name ?></option>
              <?php } ?>
            </select>
          </div>
          <!-- select -->
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
    <!-- /.col -->
    <div class="col-xs-6">
>>>>>>> 05f80e2747075c945644ea1cfd53e469768b1689
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $title ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Section</th>
<<<<<<< HEAD
                <th>handle</th>
                <th>Type</th>
                <th>URL Format</th>
=======
                <th>Field</th>
>>>>>>> 05f80e2747075c945644ea1cfd53e469768b1689
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php if($total_rows) {?>
              <?php $i = 0 ?>
<<<<<<< HEAD
              <?php foreach ($getAllSection as $key ) {?>
              <tr>
                <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                <td><?php echo $i = $i + 1; ?></td>
                <td><?php echo $key->name ?></td>
                <td></td>
                <td><?php echo $key->type ?></td>
                <td><?php echo $key->slug ?></td>
=======
              <?php foreach ($getAll as $key ) {?>
              <tr>
                <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                <td><?php echo $i = $i + 1; ?></td>
                <?php foreach ($getAllSection as $value) {
                    if ($value->id == $key->id_section) {
                ?>
                  <td><?php echo $value->name ?></td>
                <?php
                    }
                } 
                ?>
                <?php foreach ($getAllField as $value) {
                    if ($value->id == $key->id_field) {
                ?>
                  <td><?php echo $value->name ?></td>
                <?php
                    }
                } 
                ?>
>>>>>>> 05f80e2747075c945644ea1cfd53e469768b1689
                <td colspan="2" class="action">
                  <a class="btn btn-sm btn-info" href="<?php echo base_url($action.'/edit/').$key->id ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url($action.'/delete/').$key->id ?>" data-userid="2" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              <?php } ?>
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>Section</th>
              <th>Field</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
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