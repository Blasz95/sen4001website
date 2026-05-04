

<?php
include 'connect.php';
include 'NavBar.php';

// get event ID
$EventID = isset($_GET['EventID']) ? (int)$_GET['EventID'] : 0;

$sql = "SELECT * FROM events WHERE EventID = $EventID";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>
    <link rel="stylesheet" href="Styles/style.css">
</head>

<body>

<h2 class="title">Event Details</h2>

<div class="details-container">

    <!-- Event Image -->
    <div class="image-section">
        <img src="ProjImages/<?php echo $row['ImageUrl']; ?>" alt="Event Image">
    </div>

    <!-- Event details -->
    <div class="info-section">
        <h2><?php echo $row['EventName']; ?></h2>

        <p><strong>Description:</strong> <?php echo $row['EventDescription']; ?></p>

        <p><strong>Category:</strong> <?php echo $row['EventCategory']; ?></p>

        <p><strong>Start Date:</strong> <?php echo $row['StartDate']; ?></p>

        <p><strong>End Date:</strong> <?php echo $row['EndDate']; ?></p>

        <p><strong>Added By:</strong> <?php echo $row['AddedBy']; ?></p>
    </div>

</div>



</body>
</html>