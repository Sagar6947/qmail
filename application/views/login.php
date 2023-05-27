<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min2167.css?v=3.2.0">
    <link rel="stylesheet" href="<?= base_url() ?>assets/sagar.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1">
                    <img src="<?= base_url() ?>assets/img/logo-trans.png" alt="logo" width="150px">
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div id="login-message"></div>
                <?php
                if ($this->session->has_userdata('msg')) {
                    echo $this->session->userdata('msg');
                    $this->session->unset_userdata('msg');
                }
                ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 password">
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" id="passwordShow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="mb-3 col-8">
                            <a href="<?= base_url('forgot-password') ?>">I forgot my password</a>
                        </p>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" id="login_btn">Sign In</button>
                        </div>

                    </div>
                </form>
                <div class="row">

                    <p class="mb-0 mt-3 col-12 text-center border rounded">
                        <a href="<?= base_url('register') ?>" class="text-center">Create Account</a>
                    </p>
                </div>
            </div>

        </div>

    </div>


    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/dist/js/adminlte.min2167.js?v=3.2.0"></script>


    <script>
        $(document).ready(function() {
            let eyeButton = document.querySelector('#passwordShow');
            let passwordBox = document.querySelector('#password');

            eyeButton.onclick = () => {
                eyeButton.classList.toggle("active");
                if (passwordBox.type === "text") {
                    passwordBox.type = "password";
                } else {
                    passwordBox.type = "text";
                }

            }
            $('#login_btn').click(function(e) {
                e.preventDefault();
                $(this).html('<div class="spinner-border text-light" role="status"><span class = "sr-only" > Loading... < /span></div>');
                var email = $('#email').val();
                var password = $('#password').val();
                $.ajax({
                    url: "<?= base_url('Home/login') ?>",
                    type: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    beforeSend: function() {
                        $('.card-body').css('opacity', '0.6');
                        $(this).attr("disabled", true);
                    },

                    success: function(data) {
                        setTimeout(() => {
                            $('.card-body').css('opacity', '1');
                            $('#login_btn').attr("disabled", false);
                            $('#login_btn').html('');
                            $('#login_btn').text('Sign In');
                            var msg = JSON.parse(data);
                            var type = msg.type;
                            var message = msg.message;
                            $("#login-message").html(`<div class="alert alert-${type}">${message}</div>`);
                            if (msg.access == 'granted') {
                                window.location.href = "<?= base_url('inbox') ?>";
                            }
                        }, 2000);
                    },
                });
            });
        });
    </script>

</body>


</html>