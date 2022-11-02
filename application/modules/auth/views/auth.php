

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="user" method="post" action="<?= base_url('backend/'); ?>">
                <img src="<?= base_url('assets'); ?>/images/poltekgo.png" width="50px">
              <h1>SIAKAD POLITEKNIK GORONTALO</h1>
              <div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required=""/>
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""/>
              </div>
              <div>
                <button class="btn-info" type="submit" >Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>SIAKAD POLTEKGO</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>