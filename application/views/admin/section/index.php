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
            <a href="<?php echo base_url($action.'/'.$nameSection.'/create') ?>" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp; Create <?php echo ucfirst($nameSection); ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
          <?php if ($total_rows) { ?>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <?php foreach ($getFieldByIdSection as $value) { ?>
                <th><?php echo $value->label ?></th>
                <?php } ?>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php foreach ($getAllEntries as $key ) {?>
              <tr>
                <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                <td><?php echo $i = $i + 1; ?></td>
                <?php 
                  foreach ($getFieldByIdSection as $value) {
                    if (in_array($value->field, $fields)) {
                      if ($value->field == 'field_actived') { ?>
                      <td style="width: 10%" class="status"><?php echo ($key->{$value->field} == 1 ) ?  
                          '<button type="button" class="btn btn-success btn-flat">Active</button>'  : 
                          '<button type="button" class="btn btn-danger btn-flat">Non Active</button>'; ?>
                      </td>
                      <?php } else {?>
                
                      <td><?php echo $key->{$value->field}; ?></td>
                <?php 
                      }
                    }
                } ?>
                <td colspan="2" class="action">
                  <a class="btn btn-sm btn-info" href="<?php echo base_url($action.'/'.$nameSection.'/edit/').$key->id ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url($action.'/'.$nameSection.'/delete/').$key->id ?>" data-userid="2" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php } else { ?>
            <p>Data doesn't Exists</p>
          <?php } ?>
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
<!-- /.content