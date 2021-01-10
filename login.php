<html>
    <head>
        <title>halnet:Auth</title>
        <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    </head>
    <body>
        <div id="form-login">
            <h1>Log in</h1>
            <input type="login" id="login" placeholder="(your login)"><br>
            <input type="password" id="passw" placeholder="(your password)"><br>
            <input type="submit" id="subauth" value="Log in" onclick="auth();">
            <a href="register.php">not registered?</a><br>
            <p id="res"></p>
        </div>
        <script>
            let login = document.getElementById("login");
            let password = document.getElementById("passw");
            let res = document.getElementById("res");
            let restime = "";
            
            function auth() {
                var dat = {
                    login: login.value,
                    passw: passw.value
                };
                
                $.post("check.php",dat,function(data) {
                    if (restime != "") {
                        clearTimeout(restime);
                    }
                    
                    if (data == "t") {
                        document.cookie = "login="+login.value;
                        document.location.href = "/";
                    } else if (data == "f") {
                        res.textContent = "Not valid password or login";
                        restime = setTimeout(function() {
                            res.textContent = "";
                        },2000);
                    } else {
                        console.log(data);
                    }
                });
            }
        </script>
        <style>
            #res {
                color: #e02424;
            }
        </style>
    </body>
</html>