<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/backend/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $session_data->username; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!-- <ul class="treeview-menu">
          <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul> -->
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Manage Accounts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/account') ?>"><i class="fa fa-circle-o"></i> List Account</a></li>
          <li><a href="<?php echo base_url('admin/account/create') ?>"><i class="fa fa-circle-o"></i> Add Account</a></li>>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>General Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/general/section');?>"><i class="fa fa-circle-o"></i>Section</a></li>
          <li><a href="<?php echo base_url('admin/general/field');?>"><i class="fa fa-circle-o"></i>Fields</a></li>
          <li><a href="<?php echo base_url('admin/general/group');?>"><i class="fa fa-circle-o"></i>Group</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>General Section</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php foreach ($getAllSection as $key) { ?>
          <li><a href="<?php echo base_url('admin/section/?id=').$key->id;?>"><i class="fa fa-circle-o"></i><?php echo ucfirst($key->name); ?></a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>