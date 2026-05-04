<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/style.css" />

    <script>
        function validate(form) {
            var fail = "";

            fail += validateFirstName(form.FirstName.value);
            fail += validateSurname(form.Surname.value);
            fail += validateUsername(form.Username.value);
            fail += validateEmail(form.Email.value);
            fail += validateDOB(form.DOB.value);
            fail += validatePassword(form.Password.value);
            fail += validateConPass(form.Password.value, form.ConPass.value);

            if (fail === "") {
                return true;
            } else {
                alert(fail);
                return false;
            }
        }

        function validateFirstName(field) {
            return (field === "") ? "No First Name was entered.\n" : "";
        }

        function validateSurname(field) {
            return (field === "") ? "No Surname was entered.\n" : "";
        }

        function validateUsername(field) {
            if (field === "")
                return "No Username was entered.\n";
            else if (field.length < 5)
                return "Usernames must be at least 5 characters.\n";
            else if (/[^a-zA-Z0-9_-]/.test(field))
                return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n";
            return "";
        }

        function validateEmail(field) {
            if (field === "")
                return "No Email was entered.\n";
            else if (!((field.indexOf(".") > 0) &&
                       (field.indexOf("@") > 0)) ||
                     (/[^a-zA-Z0-9.@_-]/.test(field)))
                return "The Email address is invalid.\n";
            return "";
        }

        function validateDOB(field) {
    if (field === "")
        return "No Date of Birth was entered.\n";
    return "";
}


        function validatePassword(field) {
            if (field === "")
                return "No Password was entered.\n";
            else if (field.length < 6)
                return "Passwords must be at least 6 characters.\n";
            else if (
                     !(/[A-Z]/.test(field)) ||
                     !(/[0-9]/.test(field)))
                return "Passwords require one each of a-z, A-Z and 0-9.\n";
            return "";
        }

        function validateConPass(password, confirmPassword) {
            if (confirmPassword === "")
                return "Please confirm your password.\n";
            else if (password !== confirmPassword)
                return "Passwords do not match.\n";
            return "";
        }

        function ResetForm(){
        document.getElementById("SignUpForm").reset();
        }
    </script>
</head>

<body>
        <?php include "NavBar.php" ; ?>
    <h2>Sign Up</h2>
    
    <form id="SignUpForm" method="post" action="SignUpLogic.php" onsubmit="return validate(this);">
        <table border="0" cellpadding="2" cellspacing="5">
            <tr>
                <td>First Name</td>
                <td><input type="text" maxlength="32" name="FirstName"></td>
            </tr>
            <tr>
                <td>Surname</td>
                <td><input type="text" maxlength="32" name="Surname"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" maxlength="16" name="Username"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" maxlength="32" name="Email"></td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><input type="date" name="DOB" min="1900-01-01" max="2008-01-01"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password"  maxlength="64" name="Password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" maxlength="64" name="ConPass"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Signup"> 
                    <button type="button" onclick="ResetForm()">Reset</button> <br>
                    Already have an account? 
                    <a  href="Login.php">Log in</a>
                   
                </td>
            </tr>
        </table>
        
    </form>
</body>
</html>
