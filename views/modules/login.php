<div id="back"></div>

<div class="login-box">

  <div class="login-logo">

    <img class="img-responsive" src="views/img/template/SDPlogo-blanco-bloque.png" style="padding: 30px 100px 0 100px height=200% width=200% -webkit-filter: drop-shadow(10px 10px 10px #222);
  filter: drop-shadow(10px 10px 10px #222);">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Silahkan Login untuk Masuk Aplikasi</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="NIP" name="loginUser" required>

        <span class="fa fa-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Password" name="loginPass" required>

        <span class="fa fa-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>

        </div>
       
      </div>

      <?php

        $login = new ControllerUsers();
        $login -> ctrUserLogin();

      ?>

    </form>

  </div>

</div>
