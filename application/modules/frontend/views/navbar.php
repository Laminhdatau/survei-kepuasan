   <!-- top navigation -->
          <div class="top_nav" style="background-color:#75006a;">
            <div class="nav_menu" style="background-color:#75006a;">
                <div class="nav toggle" style="background-color:#75006a;">
                  <a id="menu_toggle"><i class="fa fa-bars" style="color:#fabb00"></i></a>
                </div>
                <nav class="nav navbar-nav" style="background-color:#75006a;">
                  <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;"  class="user-profile dropdown-toggle x text-danger" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?= base_url('assets'); ?>/images/img.jpg" alt="">
                      <span style="color:white;"><?= $user['username']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        
                      <a class="dropdown-item"  href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                 
                  </ul>
                </nav>
            </div>
          </div>
        <!-- /top navigation -->