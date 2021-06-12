<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="zQjhwWjL2wQlGpeW6FMkOP0LstaIZCmXNVwNMt9x">
    <title>Blood Bank            </title>
    <link rel="stylesheet" href="http://localhost:8000/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://localhost:8000/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="http://localhost:8000/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="register-page" >
<div class="register-box">
    <div class="register-logo">
        <a href="http://localhost:8000/home">
            <img src="http://localhost:8000/vendor/adminlte/dist/img/AdminLTELogo.png" height="50">
            <b>Blood</b>Bank
        </a>
    </div>
    <div class="card card-outline card-primary">
        <div class="card-header ">
            <h3 class="card-title float-none text-center">
                Register a new membership                    </h3>
        </div>
        <div class="card-body register-card-body ">
            <form action="http://localhost:8000/register" method="post">
                <input type="hidden" name="_token" value="zQjhwWjL2wQlGpeW6FMkOP0LstaIZCmXNVwNMt9x">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control "
                           value="" placeholder="Full name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user "></span>
                        </div>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control "
                           value="" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope "></span>
                        </div>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control "
                           placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock "></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                           class="form-control "
                           placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock "></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="date" name="dob" class="form-control "
                           value="" placeholder="Date of Birth" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar "></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="age" class="form-control "
                           value="" placeholder="Age" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar "></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="address" class="form-control "
                           value="" placeholder="Address" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-location-arrow "></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="phone" class="form-control "
                           value="" placeholder="Phone" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone "></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-user-plus"></span>
                    Register
                </button>

            </form>
        </div>


        <div class="card-footer ">
            <p class="my-0">
                <a href="http://localhost:8000/login">
                    I already have a membership
                </a>
            </p>
        </div>

    </div>

</div>
<script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>





<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>







<script src="http://localhost:8000/vendor/adminlte/dist/js/adminlte.min.js"></script>





</body>

</html>
