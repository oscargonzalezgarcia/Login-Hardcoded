<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8" />
    <title>Login Hardcoded</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,700');

        *{
        margin: 0;
        padding: 0;
        outline: none;
        box-sizing: border-box;
        font-family: 'Raleway', sans-serif;
        }

        body{ background: #473f40; }

        .cont{
        position: relative;
        width: 25%;
        height: 475px;
        padding: 10px 25px;
        margin: 10vh auto;
        background: #fff;
        border-radius: 8px;
        }

        .form{ width: 100%; height: 100%; }

        h1, h2, .user, .pass, .pwdRec{ 
        text-align: center;
        display: block;
        }

        h1{ 
        color: #606060;
        font-weight: bold;
        font-size: 40px;
        margin: 30px auto;
        }

        .user, .pass, .login{
        width: 100%;
        height: 45px;
        border: none;
        border-radius: 5px;
        font-size: 20px;
        font-weight: lighter;
        margin-bottom: 30px;
        }

        .user, .pass{ background: #ecf0f1; }

        .login{
        color: #fff;
        cursor: pointer;
        margin-top: 20px;
        background: #d62f44;
        }

        .pwdRec{
            color: #473f40;
            margin-top: 20px;
        }

        .login:hover{ background: #473f40; }

        @media only screen and (min-width : 280px) {
        .cont{ width: 90% }
        }

        @media only screen and (min-width : 480px) {
        .cont{ width: 60% }
        }

        @media only screen and (min-width : 768px) {
        .cont{ width: 40% }
        }

        @media only screen and (min-width : 992px) {
        .cont{ width: 30% }
        }

    </style>
    <script>
        function validarForm(){
            var email = btoa(document.getElementById("email").value);
            document.getElementById("email").setAttribute("type","hidden");
            document.getElementById("email").value = email;

            var pass = btoa(document.getElementById("pwd").value);
            document.getElementById("pwd").setAttribute("type","hidden");
            document.getElementById("pwd").value = pass;
        }

        function usuariIncorrecte(){
            alert("Usuari incorrecte!");
            document.getElementById("email").value = null;
            document.getElementById("pwd").value = null;
        }

    </script>
</head>
<body>
    <div class="cont">
    <div class="form">
        <form name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return validarForm()">
            <h1 id="hola">Login Hardcoded</h1>
            <input id="email" type="text" class="user" name="email" placeholder="Email"/>
            <input id="pwd" type="password" class="pass" name="pwd" placeholder="Contrasenya"/>
            <button class="login" type="submit">Login</button>
            <a class="pwdRec" href="#">He oblidat la contrasenya</a>
        </form>
    </div>
    </div>
</body>
<?php

    define('CORREUS',[
        '0'       => 'admin@educem.com',
        '1'       => 'donald@educem.com',
        '2'       => 'gilete@educem.com',
        '3'       => 'gon@educem.com',
    ]);

    define('PASSWORDS',[
        '0'       => 'iloveu',
        '1'       => 'm4k3Am3r1caGr3atAg41n!',
        '2'       => 'ErF4ryS1empr3',
        '3'       => 'Fatality!',
    ]);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = base64_decode($_POST["email"]);
        $password = base64_decode($_POST["pwd"]);

        for($i=0;$i<count(CORREUS);$i++)
        {
            if(CORREUS[$i]==$email && password_verify($password,password_hash(PASSWORDS[$i],PASSWORD_DEFAULT)))
             header("Location: https://educem.com");
        }
        echo "<script type='text/javascript'>usuariIncorrecte();</script>";
    }
?>
</html>