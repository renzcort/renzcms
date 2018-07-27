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
          <input type="hidden" class="form-control" name="section" value="entries">
          <div class="row">
            <dir class="col-sm-6">
              <div class="form-group">
                <label>All Field</label> 
                <div class="field-list"> 
                  <ul id="sortable1" class="connectedSortable list-group">
                    <?php foreach ($getAllField as $value) { ?>
                      <li class="ui-state-default list-group-item" id="<?php echo $value->id; ?>"><?php echo $value->name; ?></li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </dir>
            <dir class="col-sm-6">
              <label>Select Field</label>
              <div class="field-list"> 
                <ul id="sortable2" class="connectedSortable">
                  <?php foreach ($getDataByIdSection as $val) { ?>
                    <li class="ui-state-default list-group-item" id="<?php echo $val->id_field; ?>"><?php echo $val->id_field; ?></li>
                  <?php } ?>
                </ul>
                <input type="text" name="sort" class="form-control sort">
              </div>
            </dir>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $( function() {
      $( "#sortable1, #sortable2" ).sortable({
        connectWith: ".connectedSortable",
        /*get val id*/
        stop : function(event, ui) {
            var listVal = [];
            $('#sortable2 li').each(function(){
                var a = $(this).attr('id');
                listVal.push(a);
            });
            $('.sort').val(listVal); 
        }
      }).disableSelection();
    } );

  });
</script>
