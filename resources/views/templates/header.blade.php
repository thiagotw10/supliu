<header class="header white-bg" style="display: flex;
    justify-content: space-between;
    align-items: center;">
          <div class="sidebar-toggle-box" style="margin-top: 10px !important; display: flex; justify-content:center; align-items:center;">
                <div style="margin: 5px;">
                    <i class="fa fa-bars"></i>
                </div>
                <div style="margin: 5px;">
                    <a href="" class="logo"><img style="margin-top: -20px;" width="100" height="50" src="{{asset('img/logo.png')}}" alt=""></a>
                </div>

          </div>
          <!--logo start-->

          <!--logo end-->

          <div class="top-nav ">
              <!--search & user info start-->
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" style="margin-top: -6px;" href="#">
                          <img alt="" src="img/avatar1_small.jpg">
                          <span class="username">{{ session()->get('usuario') }}</span>


                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout dropdown-menu-right">
                          <div class="log-arrow-up"></div>
                          <li><p>Email</p><a href="">{{ session()->get('email') }}</a></li>

                          <li><a href="">Sair</a></li>
                      </ul>
                  </li>

                  <!-- user login dropdown end -->
              </ul>
              <!--search & user info end-->
          </div>
      </header>
