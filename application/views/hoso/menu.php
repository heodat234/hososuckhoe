


    <nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header" id="menu-trai">
        <a href="<?php echo base_url() ?>"><img class="img-logo" style="width: 200px;" src="<?php echo base_url() ?>public/images/2.png"></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li  class="<?php echo isset($welcome)?$welcome : '' ?>">
            <a id="menu-welcome"  href="<?php echo base_url() ?>account.html" class="<?php echo isset($welcome)?$welcome : '' ?>">
                 Thông tin cá nhân
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>
            </a>
        </li>
   
        <?php if($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
            <li data-ng-repeat="item in menu" class="<?php echo isset($a)?$a : '' ?>">
                <a id="menu-mednow" href="<?php echo base_url() ?>hoso.html" class="<?php echo isset($a)?$a : '' ?>"> Hồ sơ<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-folder-open"></span></a>
            </li>
        <?php }else if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] != '0') { ?>
            <li data-ng-repeat="item in menu" class="<?php echo isset($a)?$a : '' ?>">
                <a id="menu-mednow" href="<?php echo base_url() ?>admin.html" class="<?php echo isset($a)?$a : '' ?>"> Thông báo<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bullhorn"></span></a>
            </li>
        <?php  } ?>
  
        <?php if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] != '0') { ?>
            <li class="<?php echo isset($nhaplieu)?$nhaplieu : '' ?>">
                <a id="menu-mednow" href="<?php echo base_url() ?>chisoAdmin.html" class="<?php echo isset($nhaplieu)?$nhaplieu : '' ?>"> Nhập liệu<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a>
            </li>
        <?php  } ?>

        <?php if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '2') { ?>
            <li class="<?php echo isset($tintuc)?$tintuc : '' ?>">
                <a id="menu-mednow" href="<?php echo base_url() ?>tintucAdmin.html" class="<?php echo isset($tintuc)?$tintuc : '' ?>"> Quản lý tin tức<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
            </li>
        <?php  } ?>

        <?php if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
        <li class="<?php echo isset($tk)?$tk : '' ?>">
            <a id="menu-message-center" href="<?php echo base_url() ?>thongke.html" class="<?php echo isset($tk)?$tk : '' ?>">
                 Trang tổng quan
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-signal"></span>
            </a>
        </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</nav>

