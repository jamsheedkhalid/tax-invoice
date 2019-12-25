<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: tax-invoice.php');
}
?>

<!doctype html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://s3.amazonaws.com/api_play/src/js/jquery-2.1.1.min.js"></script>
    <script src="https://s3.amazonaws.com/api_play/src/js/vkbeautify.0.99.00.beta.js"></script>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/mainLogin.css">
    <!--===============================================================================================-->


    <script>
        $(function () {
            $("#generate-button").click(function () {
                var instanceurl = $("#instanceurl").val();
                var client_id = $("#client_id").val();
                var client_secret = $("#client_secret").val();
                var redirect_uri = $("#redirect_uri").val();
                var username = $("#username").val();
                var password = $("#password").val();
                if (username !== "" || password !== "") {
                    var token_input = $("#token");
                    var result_div = $("#result");
                    document.getElementById("iurl").value = document.getElementById("instanceurl").value;
                    generate_token(instanceurl, client_id, client_secret, redirect_uri, username, password, token_input, result_div);
                }
            });
        });
    </script>

    <script>
        function generate_token(instanceurl, client_id, client_secret, redirect_uri, username, password, token_input, result_div) {
            token_input.val("");
            result_div.html("");
            try {
                var xmlDoc;
                var xhr = new XMLHttpRequest();
                xhr.open("POST", instanceurl + "/oauth/token", true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function (e) {
                    if (xhr.readyState === 4) {
                        var a = JSON.parse(e.target.responseText);
                        token_input.val(a["access_token"]);
                        if (token_input.val() !== "") {
                            document.getElementById('invalidCredentials').style.display = 'none';

                            $('#welcome-modal').modal('show');
                            setTimeout(function () {
                                $('#welcome-modal').modal('hide');
                            }, 6000);
                            document.getElementById("generate-report").click();
                        } else
                            document.getElementById('invalidCredentials').style.display = 'inline';

                        result_div.html(show_response(e.target.responseText));
                        xmlDoc = this.responseText;
                        txt = "";
                    }


                };
                xhr.send("client_id=" + client_id + "&client_secret=" + client_secret + "&grant_type=password&username=" + username + "&password=" + password + "&redirect_uri=" + redirect_uri);
            } catch (err) {
                alert(err.message);
            }
        }
        ;

        function show_response(str) {
            str = vkbeautify.xml(str, 4);
            return str.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br />");
        }
        ;

        function validateForm() {
            var x = document.forms["frm"]["token"].value;
            if (x === "") {
                alert("Generate an access token first");
                return false;
            }
        }
        ;
    </script>


</head>
<body>

<!--API Connecting with demo-->
<input id="instanceurl" type="hidden" name="instanceurl" value="https://alsanawbar.school/"/>
<input id="client_id" type="hidden" value="f58a497cc122dc35edd7b016b7819ca601db2c787304e654751f8a2052e55733"/>
<input id="client_secret" type="hidden" value="2fc65b759590f5f7e07c8711e35423bb25d9d509e619528693d1b6503d1ceabf"/>
<input id="redirect_uri" type="hidden" value="https://invoices.alsanawbar.school"/>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" onsubmit="event.preventDefault();">
                    <span class="login100-form-title p-b-32">
                        TAX INVOICE
                    </span>
                <?php
                if (isset($_SESSION['notloggedin'])) {
                    ?>

                    <div id='noaccess' class="alert alert-warning wrap-input100  m-b-12">
                        <strong>Not Logged in!</strong> Please login first to continue.
                    </div>

                    <?php
                    unset($_SESSION['notloggedin']);
                }
                ?>

                <?php
                if (isset($_SESSION['noaccess'])) {
                    ?>

                    <div id='noaccess' class="alert alert-danger wrap-input100  m-b-12">
                        <strong>Unauthorized!</strong> You are unauthorized to use this system. <br>Only authorized
                        staffs have the access. <br>Please contact system administrator.
                    </div>

                    <?php
                    unset($_SESSION['noaccess']);
                }
                ?>
                <div id='invalidCredentials' class="alert alert-danger wrap-input100  m-b-12" style="display: none;">
                    <strong>Invalid!</strong> Username/Password is inavlid.
                </div>
                <span class="txt1 p-b-11">
                        Username
                    </span>
                <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                    <input class="input100" id="username" type="text" placeholder="Username" autofocus/>
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
                        Password
                    </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                    <input class="input100" id="password" type="password" placeholder="Password"/>
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-48">

                </div>

                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" id="generate-button" value="Login">
                </div>

            </form>
        </div>
    </div>

</div>
<form name="frm" onsubmit="return validateForm()" action="login.php" method="POST" style="display: none">
    <input id="token" type="hidden" name="token">
    <input id="iurl" type="hidden" name="iurl">
    <input id="user" name="user">
    <input type="submit" id="generate-report" value="Generate Reports">
</form>
<div id="welcome-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p style="text-align: center"><strong> Successfully Logged in. </strong></p>
            </div>
        </div>
    </div>
</div>


<script>


    var input = document.getElementById("password");
    input.addEventListener("keyup", function (event) {
        document.getElementById("user").value = document.getElementById("username").value;
        if (event.keyCode === 13)
            document.getElementById("generate-button").click();
    });
</script>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
</body>
</html>

