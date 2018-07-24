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
  <?php 
    $message = $this->session->flashdata('message'); 
    $error = $this->session->flashdata('error'); 
  ?>
  <?php if($message) { ?>
  <div class="alert alert-success alert-dismissible">
    <i class="icon fa fa-check"></i>
    <?php echo $message; ?>
  </div>
  <?php } else { ?>
  <div class="alert alert-success alert-dismissible">
    <i class="icon fa fa-check"></i>
    <?php echo $error; ?>
  </div>
<?php } ?>
  <div class="row">
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <!-- <h3 class="box-title"><?php echo $title; ?></h3> -->
        </div>
        <div class="box-body">
          <?php $attributes = array('role' => 'form') ?>
          <?php echo form_open_multipart(base_url($action).'/create', $attributes); ?>
          <div class="form-group">
            <label for="exampleInputUsername">Name</label>
            <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername">Type</label>
            <select class="form-control" name="type">
              <option value="0">- None -</option>
              <option value="1">Single</option>
              <option value="2">Channel</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea name="description" class="form-control" id="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
          </div>
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
                <th>Name</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php if ($total_rows) {?>
              <?php foreach ($getAll as $key ) {?>
              <tr>
                <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                <td><?php echo $i = $i + 1; ?></td>
                <td><?php echo $key->name; ?></td>
                <td><?php echo $key->type; ?></td>
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
              <th>Name</th>
              <th>Type</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <style>
          .pagination-dive li {
          list-style: none;
          display: inline-block;
          }
          .pagination-dive a:hover, .pagination-dive .active a {
          background: #040404;
          }
          .pagination-dive a {
          display: inline-block;
          height: initial;
          background: #939890;
          padding: 10px 15px;
          border: 1px solid #fff;
          color: #fff;
          }
          </style>
          
          <div class="pagination-dive" >
            <?php echo $nav; ?>
          </div>
        </div>
        <!-- /.box -->
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->