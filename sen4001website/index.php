<?php 
include 'connect.php';
include "NavBar.php";

// pagination
$limit = 4; // events per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

//gets total events
$totalQuery = "SELECT COUNT(*) as total FROM events";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalEvents = $totalRow['total'];

$totalPages = ceil($totalEvents / $limit);
 //selects the data
$sql = "SELECT EventID, AddedBy, EventName, EventDescription, EventCategory, StartDate, EndDate, ImageURL 
        FROM events
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
?>

<html>
<head>      
    <title>Event Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/style.css" />
</head>

<body>

<h1>Welcome To Eventify</h1>

<h2> Popular Events </h2>

<div class="events-container">

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    
    <div class="event-card">

        <img src="ProjImages/<?php echo $row['ImageURL']; ?>" 
             alt="<?php echo $row['EventName']; ?>">

        <div class="event-info">
            <h3><?php echo $row['EventName']; ?></h3>

            <p><?php echo $row['EventDescription']; ?></p>

            <p><strong>Category:</strong> <?php echo $row['EventCategory']; ?></p>

            <p><strong>Start:</strong> <?php echo $row['StartDate']; ?></p>

            <p><strong>End:</strong> <?php echo $row['EndDate']; ?></p>

            <p><strong>By:</strong> <?php echo $row['AddedBy']; ?></p>

            <a href="EventDetails.php?EventID=<?php echo $row['EventID']; ?>">
                View Details
            </a>
        </div>

    </div>

<?php } ?>

</div>

<!-- Pagination without category filter -->
<div class="pagination">

<?php if ($page > 1): ?>
    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?page=<?php echo $i; ?>" 
       class="<?php if ($i == $page) echo 'active'; ?>">
        <?php echo $i; ?>
    </a>
<?php endfor; ?>

<?php if ($page < $totalPages): ?>
    <a href="?page=<?php echo $page + 1; ?>">Next</a>
<?php endif; ?>

</div>

</body>
</html>