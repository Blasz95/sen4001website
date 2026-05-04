<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/style.css" />
    
    <script>
        function validate(form) {
            var fail = "";

            fail += validateUsername(form.Username.value);
            fail += validateEmail(form.Email.value);
            fail += validatePassword(form.Password.value);
            

            if (fail === "") {
                return true;
            } else {
                alert(fail);
                return false;
            }
        }

        function validateUsername(field) {
            return (field === "") ? "No First Name was entered.\n" : "";
        }

        function validatePassword(field) {
            return (field === "") ? "No Password was entered.\n" : "";
        }

        function validateEmail(field) {
            return (field === "") ? "No Email was entered.\n" : "";
        }
        
        function ResetForm(){
        document.getElementById("LogInForm").reset();
        }

      
    </script>
</head>

<body>
        <?php include "NavBar.php" ; ?>
    <h2>Login</h2>

    <form id="LogInForm" method="post" action="LogInLogic.php" onsubmit="return validate(this);">
        <table border="0" cellpadding="2" cellspacing="5">
            <tr>
                <td>Username</td>
                <td><input type="text" maxlength="16" name="Username"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" maxlength="32" name="Email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" maxlength="64" name="Password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" >
                    <input type="submit" value="Login"> 
                    <button type="button" onclick="ResetForm()">Reset</button> <br>
                    Don't have an account? 
                    <a  href="SignUp.php">Sign up</a>
                </td>   
            </tr>
        </table>
    </form>
</body>
</html>
