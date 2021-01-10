<html>
    <head>
        <title>halnet:Reg</title>
        <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    </head>
    <body>
        <div id="form-reg">
            <h1>Registration</h1>
            <input type="login" id="login" placeholder="(login)"><br>
            <input type="password" id="passw" placeholder="(password)"><br>
            <input type="password" id="reppas" placeholder="(repeat password)"><br>
            <input type="submit" id="subreg" value="Reg" onclick="check();">
            <a href="login">registered?</a>
            <p id="res"></p>
        </div> 
        <script>
            let login = document.getElementById("login");
            let passw = document.getElementById("passw");
            let reppas = document.getElementById("reppas");
            let res = document.getElementById("res");
            
            function check() {
                var dat = {
                    login: login.value,
                    passw: passw.value
                }
                
                if (dat["login"].length > 3) {
                    if (dat["passw"].length > 7) {
                        if (dat["login"].length < 21) {
                            if (dat["passw"].length < 21) {
                                if (dat["passw"] == reppas.value) {
                                    reg(dat);
                                } else {
                                    res.textContent = "passwords don't match";
                                }
                            } else {
                                res.textContent = "password more than 20 characters";
                            }
                        } else {
                            res.textContent = "login more than 20 characters";
                        }
                    } else {
                        res.textContent = "password less than 8 characters";
                    }
                } else {
                    res.textContent = "login less than 4 characters";
                }
            }
            
            function reg(dat) {
                $.post("reg.php",dat,function(data) {
                    if (data == "t") {
                        document.cookie = "login="+dat["login"];
                        document.location.href = "/";
                    } else if (data == "f") {
                        res.textContent = "login already exists"
                    }
                })
            }
        </script>
        <style>
            #res {
                color: #e02424;
            }
        </style>
    </body>
</html>