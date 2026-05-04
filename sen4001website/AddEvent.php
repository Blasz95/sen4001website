<!DOCTYPE html>
<html>
<head>
    <title>Add Event Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/style.css" />

    <script>
        function validate(form) {
           
            var fail = "";
   
            fail += validateAddedBy(form.AddedBy.value);
            fail += validateEName(form.EName.value);
            fail += validateEDesc(form.EDesc.value);
            fail += validateCategory(form.Category.value);
            fail += validateSDate(form.SDate.value);
            fail += validateEDate(form.EDate.value);
            fail += validateIURL(form.IURL.value);
   

            if (fail === "") {
                return true;
            } else {
                alert(fail);
                return false;
            }
        }


        function validateAddedBy(field) {
            if (field.trim() === "")
                return "No Added By was entered.\n";
            return "";
        }

        function validateEName(field) {
            return (field.trim() === "") ? "No Event Name was entered.\n" : "";
        }

        function validateEDesc(field) {
            return (field.trim() === "") ? "No Event Description was entered.\n" : "";
        }

        function validateCategory(field) {
            if (field.trim() === "")
                return "No Category was entered.\n";
            return "";
        }

        function validateSDate(field) {
            if (field.trim() === "")
                return "No Start Date was entered.\n";
            return "";
        }

        function validateEDate(field) {

            if (field.trim() === "")
                return "No End Date was entered.\n";
            return "";
          }

        function validateIURL(field) {
            if (field.trim() === "")
                return "No Image Url was entered.\n";
            return "";
        }


        function ResetForm(){
        document.getElementById("SignUpForm").reset(); 
        }
    </script>
</head>

<body>
        <?php include "NavBar.php" ; ?>
    <h2> Add Event</h2>

    <form id="AddEventForm" method="post" action="AddEventLogic.php" onsubmit="return validate(this);">
        <table border="0" cellpadding="2" cellspacing="5">
            <tr>    
                <td>Added By</td>
                <td><input type="text" maxlength="32" name="AddedBy"></td>
            </tr>
            <tr>
                <td>Event Name</td>
                <td><input type="text" maxlength="32" name="EName"></td>
            </tr>
            <tr>
                <td>Event Description</td>
                <td><input type="text" maxlength="64" name="EDesc"></td>
            </tr>
                <td> Event Category </td>
                <td>
                <select name="Category" required> 
                <option value="">-- Select Category --</option>
                <option value="Music">Music</option>
                <option value="Sports">Sports</option>
                <option value="Tech">Tech</option>
                <option value="Gaming">Gaming</option>
                <option value="Other">Other</option>
                </select>
                </td>
            <tr>
                <td>Start Date</td>
                <td><input type="date" name="SDate" min="2026-01-01" max="2030-01-01"></td>
            </tr>
            <tr>
                <td>End Date</td>
                <td><input type="date" name="EDate" min="2026-01-01" max="2030-01-01"></td>
            </tr>
            <tr>
                <td>Image URL</td>
                <td><input type="text" maxlength="64" name="IURL"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Add Event"> 
                    <button type="button" onclick="ResetForm()">Reset</button> <br>                   
                </td>
            </tr>
        </table>


        
        
    </form> 
</body>
</html>
