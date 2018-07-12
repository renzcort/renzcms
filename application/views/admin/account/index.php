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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $title ?></h3>
          <div class="button-submit">
            <a href="<?php echo base_url($action.'/create') ?>" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp; Create <?php echo ucfirst($segment); ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php foreach ($getAll as $key ) {?>
              <tr>
                <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                <td><?php echo $i = $i + 1; ?></td>
                <td><?php echo $key->username; ?></td>
                <td><?php echo $key->email; ?></td>
                <td><?php echo $key->firstname; ?></td>
                <td><?php echo $key->lastname; ?></td>
                <td><?php echo $key->role; ?></td>
                <td colspan="2" class="action">
                  <a class="btn btn-sm btn-info" href="<?php echo base_url($action.'/edit/').$key->id ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url($action.'/delete/').$key->id ?>" data-userid="2" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
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
      </div>
      <!-- /.box -->
      
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->