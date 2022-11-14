<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">

        <section class="login_content">
          <form method="post" action="<?= base_url('auth'); ?>">
            <img src="<?= base_url('assets'); ?>/images/poltekgo.png" width="50px">
            <h1>SIAKAD POLITEKNIK GORONTALO</h1>
            <?= $this->session->flashdata('message'); ?>
            <div class="text-left">
              <input type="text" class="form-control" name="user" placeholder="Username" value="<?= set_value('user'); ?>" required />

            </div>
            <div class="text-left">
              <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password'); ?>" required />

            </div>
            <div class="text-center">
              <!-- <input type="submit" class="btn btn-info" value="login"> -->
              <button class="btn-info" type="submit">Login</button>
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