<!-- <!DOCTYPE html>
<html>

<head>
    <title>Membuat Login Dengan CodeIgniter | www.malasngoding.com</title>
</head>

<body>
    <h1>Membuat Login Dengan CodeIgniter <br /> www.malasngoding.com</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>

</html> -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        /* body {
            background-color: #e9e0ff;
        } */

        .login-clean {
            /* background-color: #f1f7fc; */
            padding: 90px 0;

            /* 
            width: 1980px;
            height: 1080px; */
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: block;
            position: relative;

        }

        .login-clean::after {
            content: "";
            /* background: url(<?php echo base_url('assets/img/bg.jpg'); ?>); */
            background-color: #e1e4ed;
            background-repeat: no-repeat;
            /* background-position: center; */
            /* background-size: cover; */
            /* background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100vh; */
            /* margin: 3px auto 0;/ */
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center top;
            opacity: 0.65;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
        }

        .login-clean form {
            max-width: 320px;
            width: 90%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 4px;
            color: #000000;
            /* box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1); */
            -webkit-box-shadow: 0px 0px 333px 11px #4ea34d;
            -moz-box-shadow: 0px 0px 333px 11px #4ea34d;
            box-shadow: 0px 0px 333px 11px #4ea34d;
        }

        .login-clean .illustration {
            text-align: center;
            padding: 0 0 20px;
            font-size: 100px;
            color: rgb(244, 71, 107);
        }

        .login-clean form .form-control {
            background: #f7f9fc;
            border: none;
            border-bottom: 1px solid #dfe7f1;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
            text-indent: 8px;
            height: 42px;
        }

        .login-clean form .btn-primary {
            background: #274d30;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 26px;
            text-shadow: none;
            outline: none !important;
        }

        .login-clean form .btn-primary:hover,
        .login-clean form .btn-primary:active {
            background: #4d4227;
        }

        .login-clean form .btn-primary:active {
            transform: translateY(1px);
        }
    </style>
</head>

<body>
    <div class="login-clean">
        <form action="<?php echo base_url('index.php/loginadmin/aksi_login'); ?>" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img class="img-responsive" src="<?php echo base_url('assets/img/logologin.jpg'); ?>" alt=""></div>
            <div class="row">
                <div class="col-12 text-center">
                    <h4><b>Login Admin</b></h4>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
        </form>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>