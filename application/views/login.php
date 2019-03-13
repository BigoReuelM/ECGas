<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="<?php echo base_url() ?>public/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg mt-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="text-gray-900 mb-4">ECGas</h1>
                  </div>
                  <hr>
                  <form class="user" id="login" autocomplete="off">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username" valrequired="true" elementname="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password" valrequired="true" elementname="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>public/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>

  <script type="text/javascript">
    $('#login').submit(function(e){
      e.preventDefault();
      var username = $('#username').val().trim();
      var password = $('#password').val().trim();

      // $('p').remove('.text-warning');

      // if (!username || !password) {

      //   if (!username && !password) {
      //     $('#username').after('<p class="text-warning text-center"><small>The Username field is required!</small></p>')
      //     $('#password').after('<p class="text-warning text-center"><small>The Password field is required!</small></p>');
      //   }else if(!username && password){
      //     $('#username').after('<p class="text-warning text-center"><small>The Password field is required!</small></p>')
      //   }else if (username && !password){
      //     $('#password').after('<p class="text-warning text-center"><small>The Password field is required!</small></p>');
      //   }
      // }else{

      //   $.ajax({
      //     type: 'POST',
      //     url: '<?php echo base_url('user/login') ?>',
      //     data: $(this).serialize(),
      //     dataType: 'json'
      //   }).done(function(response){
      //     if (response.success == true) {
      //       window.location.replace("<?php echo base_url('pages') ?>");
      //     }else{
      //       $('#login').prepend('<div class="alert alert-warning"><p class="text-center"><small>Something went wrong. Try Again!</small></p></div>');
      //     }
      //   })

      // }

      if (validateRequired($(this).attr('id'))) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url('user/login') ?>',
          data: $(this).serialize(),
          dataType: 'json'
        }).done(function(response){
          if (response.success == true) {
            window.location.replace("<?php echo base_url('pages') ?>");
          }else{
            $('#login').prepend('<div class="alert alert-warning"><p class="text-center"><small>Something went wrong. Try Again!</small></p></div>');
          }
        })
      }

    });
  </script>

</body>

</html>
