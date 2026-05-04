<?php 
include 'connect.php';
include "NavBar.php";

// pages per page 
$limit = 4;

// get page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// get selected category
$category = isset($_GET['category']) ? $_GET['category'] : "";


$where = "";
if (!empty($category)) {
    $category = $conn->real_escape_string($category);
    $where = "WHERE EventCategory = '$category'";
}

$offset = ($page - 1) * $limit;

// total events 
$totalQuery = "SELECT COUNT(*) as total FROM events $where";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalEvents = $totalRow['total'];

$totalPages = ceil($totalEvents / $limit);

// main query 
$sql = "SELECT EventID, AddedBy, EventName, EventDescription, EventCategory, StartDate, EndDate, ImageURL 
        FROM events
        $where
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

<h1>Events</h1>

<h2>All Events</h2>

<!-- Filter by category -->
<form method="GET">
    <label for="category">Filter by Category:</label>
    <select name="category" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="Music" <?php if($category=="Music") echo "selected"; ?>>Music</option>
        <option value="Sports" <?php if($category=="Sports") echo "selected"; ?>>Sports</option>
        <option value="Tech" <?php if($category=="Tech") echo "selected"; ?>>Tech</option>
        <option value="Gaming" <?php if($category=="Gaming") echo "selected"; ?>>Gaming</option>
        <option value="Other" <?php if($category=="Other") echo "selected"; ?>>Other</option>
    </select>
</form>

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

<!-- Pagination with category filter-->
<div class="pagination">

<?php if ($page > 1): ?>
    <a href="?page=<?php echo $page - 1; ?>&category=<?php echo $category; ?>">Previous</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?page=<?php echo $i; ?>&category=<?php echo $category; ?>" 
       class="<?php if ($i == $page) echo 'active'; ?>">
        <?php echo $i; ?>
    </a>
<?php endfor; ?>

<?php if ($page < $totalPages): ?>
    <a href="?page=<?php echo $page + 1; ?>&category=<?php echo $category; ?>">Next</a>
<?php endif; ?>

</div>

</body>
</html>