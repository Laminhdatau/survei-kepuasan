
        <body class="nav-md" style="background-color:#e19ee4;">
    <div class="container body" >
      <div class="main_container" style="background-color:#e19ee4;">
        <div class="col-md-3 left_col" style="background-color:#e19ee4;">
          <div class="left_col scroll-view"  style="background-color:#e19ee4;">

            <div class="navbar nav_title" style=" background-color:#75006a;">
              <a href="<?= base_url(); ?>" class="site_title" >
                <img class="ml-1 img-circle" src="<?= base_url('assets'); ?>/images/poltekgo.png"  width="30px">
                <span class="h6">SISTEM INFORMASI AKADEMIK</span>
              </a>
            </div>

            <div class="clearfix"></div><br>

           
            <style >
              
              .nav.side-menu > li > a, .nav.child_menu > li > a 
              {
                color: #75006e;
                font-weight: 500;
              }              
                .nav.side-menu > li.current-page, .nav.side-menu > li.active 
              {
                  border-right: 5px solid #75006A;
                  border-right-color: #75006A;
                  border-right-style: solid;
                  border-right-width: 5px;
                  color: white;
              }
              .nav.side-menu > li.active > a 
              {
                text-shadow: rgba(0,0,0,0.25) 0 -1px 0;
                background: -webkit-gradient(linear, left top, left bottom, from(#334556), to(#2C4257)),#2A3F54;
                background: #ae6fb1;
                -webkit-box-shadow: rgba(0,0,0,0.25) 0 1px 0,inset rgba(255,255,255,0.16) 0 1px 0;
                box-shadow: rgba(0,0,0,0.25) 0 1px 0,inset rgba(255,255,255,0.16) 0 1px 0;
              }
              .nav-md ul.nav.child_menu li::after 
              {
                border-left: 1px solid #fabb00;
                bottom: 0;
                content: "";
                left: 27px;
                position: absolute;
                top: 0;
              }
                .nav-md ul.nav.child_menu li::before 
                {
                background: #fabb00;
                bottom: auto;
                content: "";
                height: 8px;
                left: 23px;
                margin-top: 15px;
                position: absolute;
                right: auto;
                width: 8px;
                z-index: 1;
                border-radius: 50%;
                }
                .h6, h6 
                {
                font-size: 9pt;
                }

                .nav.child_menu li:hover, .nav.child_menu li.active 
                {
                  background-color: rgb(225, 158, 228);
                }
            </style>
<!-- =================================================ADMIN -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
              <div class="menu_section">


                <?php 
                $role_id =$this->session->userdata('role_id');
                $queryMenu = "SELECT `t_user_menu`.`menu_id`, `menu`
                                FROM `t_user_menu` JOIN `t_user_access_menu`
                                  ON `t_user_menu`.`menu_id` = `t_user_access_menu`.`menu_id`
                                WHERE `t_user_access_menu`.`role_id` = $role_id
                            ORDER BY `t_user_access_menu`.`menu_id` ASC
                              ";
              $menu = $this->db->query($queryMenu)->result_array(); ?>  
              
                <ul class="nav side-menu">
              <!-- LOOPING MENU -->
              <?php foreach($menu as $m): ?>
                <h3><?= $m['menu']; ?></h3>
                 <!-- SIAPKAN SUB-MENU SESUAI MENU -->
              <?php 
              $menuId = $m['menu_id'];
              $querySubMenu = "SELECT *
                               FROM `t_user_sub_menu` JOIN `t_user_menu` 
                                 ON `t_user_sub_menu`.`menu_id` = `t_user_menu`.`menu_id`
                              WHERE `t_user_sub_menu`.`menu_id` = $menuId
                                AND `t_user_sub_menu`.`is_active` = 1
                              ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>


            <?php foreach($subMenu as $sm): ?>
              <?php if($title == $sm['title']): ?>
              
              <li class="active text-white"> 
                
              <?php else  : ?>
              <li>

              <?php endif ; ?>   
              
              <a href="<?= base_url($sm['url']); ?>">
                  <i class="<?= $sm['icon']; ?>" 
                  style="color:#75006a"></i> 
                  <?= $sm['title']; ?>
              </a>

              </li>

              
           <?php endforeach; ?>
           
            <?php endforeach; ?>
                

              </div>

            </div>
           
            <!-- /sidebar menu -->
                <div class="sidebar-footer  hidden-small">
                </div>
          </div>
        </div>






  