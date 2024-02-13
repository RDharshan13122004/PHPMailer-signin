<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jak.css">
    <title>Send Email</title>
</head>
<body>
<div class="container">
        <div class="gop">
            <h1>Crack code</h1>
            <span>Sign In</span>
            <form action="send.php" method="post" class="form">
                <div class="con ur">
                    <label class="form-control">
                        Username :
                    </label> <br>
                    <input type="text" name="name" class="lcon" placeholder="enter the Username" require>  
                </div>
                <div class="con pass">
                    <label class="form-control">
                        E-mail : 
                    </label><br>
                    <input type="email" name="email" class="lcon" id="email" placeholder="Enter the email" require>  
                </div>
                <div class="con pass">
                    <label class="form-control">
                        Password : 
                    </label><br>
                    <input type="password" name="password" class="lcon password" id="password" placeholder="Enter the Password" require>  
                </div>
                <div class="con pass">
                    <label class="form-control">
                       Confirm Password : 
                    </label><br>
                    <input type="password" name="confpassword" class="lcon password" id="confirmPassword" placeholder="Enter the Password" require>  
                </div>
                <div>
                    <label for="ck" class="showLabel">
                        <input type="checkbox" name="ck" id="showPassword"> Show password
                    </label>
                    <script>
                        const passwordInput = document.getElementById('password');
                        const confirmPasswordInput = document.getElementById('confirmPassword');
                        const showPasswordCheckbox = document.getElementById('showPassword');

                        showPasswordCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            passwordInput.type = 'text';
                            confirmPasswordInput.type = 'text';
                        } else {
                            passwordInput.type = 'password';
                            confirmPasswordInput.type = 'password';
                        }
                        });
                    </script>
                </div>
                <br><br>
                <div class="opg">
                    <button type="submit" class="oob" name="send">Sign In</button>        
                </div>
                <div class="ll">
                    Are you a not amember ? then <a href="login.php">Login In</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
