<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Css-->
    <link rel="stylesheet" href="{{asset('ui/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('ui/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('ui/css/responsive.css')}}">
        <!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
</head>
<body style="background: #fff;">
    
  <section class="Login-body">
    <div class="container-login">
      <div class="wrap-login">
        <h1>Welcome to ZORRRO Admin.</h1>
        <div id="failure" class="alert alert-danger" style="display: none;">
        </div>
        <form class="login-form">
          @csrf
          <div class="form-group">
            <label>Email address</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-row m-0 pl-0 pl-md-3 mb-5 mt-3">
            <div class="col-5">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="col-7 text-right fpw">
              <a href="#">Forgot your password?</a>
            </div>
          </div>
          <button type="button" id="admin_signup" name="admin_signup" class="btn login-button">LOGIN</button>
        </form>
      </div>
      <div class="login-right-bg d-none d-md-block"> 
        <div class="text-center">
          <img src="{{asset('ui/img/logo.png')}}">
          <h2>Delivering at the speed of woof!</h2>
        </div>
      </div>
    </div>
  </section>

    <!--Script-->
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    <script>
      $(document).ready(function() {
         
          $('#admin_signup').click(function(e) {
              // alert('hi');
              // e.preventDefault();
              var email = $("#email").val();
              var password = $("#password").val();
              var token = $('input[name="_token"]').val();

              var formData = new FormData(); //append data
              formData.append('email', email);
              formData.append('password', password);
              formData.append('_token', token);

              $.ajax({
                  type: 'post',
                  url: '{{ route("admins.login") }}',
                  cache: false, 
                  processData: false,
                  contentType: false,
                  data: formData,
                  dataType: "json",
                  success: function(response) {
               
                      if (response.status == 1) {
                          window.location.href = '{{ route("admin.dashboard") }}';
                      } else {
                          $('#failure').show();
                          $('#failure').html(response.message);
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                        $('#failure').show();
                        $('#failure').html(errorThrown);
                  }
              });
          });
      });
  </script>
		
		<script type="text/javascript" src="{{asset('ui/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('ui/js/Bootstrap.js')}}"></script>
		<script type="text/javascript" src="{{asset('ui/js/smoothscroll.js')}}"></script>
		<script type="text/javascript" src="{{asset('ui/js/custom.js')}}"></script>
    
</body>
</html>