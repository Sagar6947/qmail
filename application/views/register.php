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
                <p class="login-box-msg">Create an account</p>
                <?php
                if($this->session->has_userdata('msg')){
                    echo $this->session->userdata('msg');
                    $this->session->unset_userdata('msg');
                }
                ?>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="div mb-3">
                        <div class="input-group ">
                            <input type="text" name="email" id="emailId" onblur="validateInputs();" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @qmail.com
                                </div>
                            </div>
                        </div>
                        <span id="emailError" class="text-danger"></span>
                    </div>
                    <div class="input-group mb-3 password">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" id="passwordShow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 cpassword">
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" id="cpasswordShow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 password">
                        <input type="date" name="dob" class="form-control" placeholder="Date-of-birth" required>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" id="register_btn">Sign Up</button>
                        </div>
                    </div>
                </form>
                <div class="row">

                    <p class="mb-0 mt-3 col-12 text-center border rounded">
                        <a href="<?= base_url('login') ?>" class="text-center">Login</a>
                    </p>
                </div>
            </div>

        </div>

    </div>


    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/dist/js/adminlte.min2167.js?v=3.2.0"></script>


    <script>
        let eyeButton = document.querySelector('#passwordShow');
        let passwordBox = document.querySelector('input[name=password]');

        eyeButton.onclick = () => {
            eyeButton.classList.toggle("active");
            if (passwordBox.type === "text") {
                passwordBox.type = "password";
            } else {
                passwordBox.type = "text";
            }

        }
        let eyeButtonc = document.querySelector('#cpasswordShow');
        let passwordBoxc = document.querySelector('input[name=cpassword]');

        eyeButtonc.onclick = () => {
            eyeButtonc.classList.toggle("active");
            if (passwordBoxc.type === "text") {
                passwordBoxc.type = "password";
            } else {
                passwordBoxc.type = "text";
            }

        }

        function regExpGmail() {
            return RegExp(/([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/g);
        }

        function regExpOutlook() {
            return RegExp(/([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@outlook([\.])com/g);
        }

        function regExpYahoo() {
            return RegExp(/^[^@]+@(yahoo|ymail|rocketmail)\.(com|in|co\.uk)$/i);
        }


        function regExpGmail() {
            return RegExp(/([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/g);
        }

        function regExpOutlook() {
            return RegExp(/([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@outlook([\.])com/g);
        }

        function regExpYahoo() {
            return RegExp(/^[^@]+@(yahoo|ymail|rocketmail)\.(com|in|co\.uk)$/i);
        }

        function validateInputs() {
            reGmail = regExpGmail();
            reYahoo = regExpYahoo();
            reOutlook = regExpOutlook();

            var result = true;
            var emailCheck = $('#emailId').val();
            if (emailCheck.includes('qmail.com')) {
                console.log(emailCheck);
            } else {
                emailCheck = emailCheck + "qmail.com";
                console.log(emailCheck);
            }
            if (!emailCheck) {
                result = false;
                $('#emailError').html('');
            } else if (reGmail.test(emailCheck)) {
                result = false;
                $('#emailError').html('Gmail is not allowed!');
            } else if (reYahoo.test(emailCheck)) {
                result = false;
                $('#emailError').html('Yahoo is not allowed!');

            } else if (reOutlook.test(emailCheck)) {
                result = false;
                $('#emailError').html('Outlook is not allowed!');

            } else {
                $('#emailError').html('');

            }

            if (result == true) {
                $('#register_btn').removeAttr('disabled');
                $('#register_btn').css("cursor", "");
                var cMail = emailCheck
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Ajax/checkEmail') ?>",
                    data: {
                        cMail: cMail
                    },
                    success: function(response) {
                        if (response == '1') {
                            $('#emailError').html('<i class="fas fa-times-circle"></i> email is alerady exists');
                            $("#register_btn").attr("disabled", true);
                        } else if (response == '0') {
                            $('#emailError').html('<div class="text-success"><i class="fas fa-check-circle"></i> email is available</div>');
                            $("#register_btn").attr("disabled", false);
                        }
                    }
                });
            } else {
                $("#register_btn").attr("disabled", true);
                $('#register_btn').css("cursor", "");
            }
        }


        $(document).ready(function() {


            $("#emaId").blur(function() {
                var email = $(this).val();
                // RegExp(/([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@qmail([\.])com/g)
                console.log(email);
                // // if email field is null then return
                // if (email == "") {
                //     return;
                // }
                // // send ajax request if email is not empty
                // $.ajax({
                //     url: '<?= base_url('Web/checkemail') ?>',
                //     type: 'post',
                //     data: {
                //         'email': email,
                //         'email_check': 1,
                //     },
                //     success: function(response) {
                //         if (response == '1') {
                //             $("#email").after("<span id='email_error' class='text-danger'>Email already exist</span>");
                //         } else {
                //             $("#email").after("<span id='email_error' class='text-danger'></span>");
                //         }
                //     },
                // });
            });
        });
    </script>
</body>


</html>