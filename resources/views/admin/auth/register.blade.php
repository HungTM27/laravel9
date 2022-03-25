<!DOCTYPE html>
<html>

<head>
    <script nonce="f07e17ff-b699-4a54-9434-2a94d595bc96">
        (function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]},a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('admin.layouts.style')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>Admin</b>LTE</a>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Name"
                        value="{{ old('username') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="EmaiL"
                        value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>

                </div>
            </form>
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign
                    up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign
                    up using
                    Google+</a>
            </div>
            <a href="login.html" class="text-center">I already have a membership</a>
        </div>

    </div>
    @include('admin.layouts.script')
    <script>
        $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
    </script>
</body>

</html>
