<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Admin Extended Dark</title>
    <link rel="shortcut icon" href="favicon.png" type="image/png">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="resources/vendors/zwicon/zwicon.min.css">
    <link rel="stylesheet" href="resources/vendors/animate.css/animate.min.css">

    <!-- App styles -->
    <link rel="stylesheet" href="resources/css/app.min.css">
</head>

<body>
    <div class="login">

        <!-- Login -->
        <div class="login__block active" id="login-main">
            <div class="login__header">
                <i class="zwicon-user-circle" style="font-size: 80px"></i>
            </div>
            @if ($errors->has('email'))
            <span>
                <h5 style="color: red">{{ $errors->first('email') }}</h5>
            </span>
            @endif
            <form class="login__body" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <div class="login__inputs">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
                <div>
                    <button type="submit" class="login__btn">Masuk</button>
                </div>
                <!-- /.col -->

            </form>
        </div>
    </div>

    <!-- Vendors -->
    <script src="resources/vendors/jquery/jquery.min.js"></script>
    <script src="resources/vendors/popper.js/popper.min.js"></script>
    <script src="resources/vendors/bootstrap/js/bootstrap.min.js"></script>

    <!-- App functions -->
    <script src="resources/js/app.min.js"></script>
</body>

</html>
