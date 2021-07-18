<?php
    if ($this->session->userdata('msg')!=""){ ?>
      <script>
      alert("Username atau Password salah !");
      document.getElementById("username").focus();
      </script><?php
      $this->session->set_userdata('msg','');
      $this->session->unset_userdata('msg');
    } else {
      $this->session->set_userdata('msg','');
      $this->session->unset_userdata('msg');
    }
    $this->session->sess_destroy(); 
?>
<html>

<head>
  <title>Klinik Al-Syafi</title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/ico-title.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">
</head>

<body class="login" style="background: url('<?php echo base_url(); ?>assets/images/irongrip.png') repeat #444;">

  <div class="form-signin">
    <!-- alert messages -->
  <div class='alert alert-danger' role='alert' id='alertuname' style="display: none">
    <strong>Warning!</strong> Username Belum Diisi
  </div>
  <div class='alert alert-danger' role='alert' id='alertpass' style="display: none">
    <strong>Warning!</strong> Password Belum Diisi
  </div>
    <div class="tab-content">
        <div>
            <form action="<?php echo base_url() ?>App/val_login" method="POST" name="formlogin">
                <p class="text-muted text-center" id="pandu"  style="margin-bottom: 5px;">
                    Enter your username and password
                </p>
                <input type="text" placeholder="Username" class="form-control top" id="username" name="username" autocomplete="off">
                <input type="password" placeholder="Password" class="form-control bottom" id="password" name="password">
                <button type="submit" class="btn btn-lg btn-info btn-block btn-login" name="login" id="login" onclick="return validasi_input()">Sign in</button>
            </form>
        </div>
    </div>
    <hr style="margin-bottom: 5px;">
    <div class="text-muted text-center" style="margin-bottom: -10px; padding: 0;">
        &copy;2018 Klinik Al Syafi
    </div>
  </div>

  
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
  <script src="<?php echo base_url() ?>assets/js/ie10-viewport-bug-workaround.js"></script>
  <script>
  function validasi_input()
    {
      if(formlogin.username.value == ""){
        document.getElementById("alertuname").classList.toggle("show");
        formlogin.username.focus();
        return (false);
      }
      else if(formlogin.password.value == ""){
        document.getElementById("alertpass").classList.toggle("show");
        formlogin.password.focus();
        return (false);
      } 
      else {
        return (true);
      }
    }
  </script>
  
</body> 

</html>