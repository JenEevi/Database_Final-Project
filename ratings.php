<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE>
        Jennfier Guidotti HW10
    </TITLE>
</HEAD>
<BODY>
<H1>Workout Performance Database</H1>

<nav>
    <?php
    require 'links.php';
    ?>
</nav>
<?php
require 'connect.php';
$sql = "SELECT WORKOUT_SET.Choreography_Theme, RATINGS.Rating, RATINGS.Comment FROM RATINGS, WORKOUT_SET 
WHERE WORKOUT_SET.Set_ID=RATINGS.Set_Referenced
ORDER BY Choreography_Theme, Rating";
$result = $DB->query($sql);

if ($result->num_rows > 0)	{
    echo "<br><br>";
    echo "<table align=\"center\" style =\"width:35%\">
<caption><h2>Rating Information</h2></caption>
<tr>
<th>Choreography Theme</th>
<th>Rating</th>
<th>Comments</th>";
    while ($row = $result->fetch_assoc())	{
        echo "<tr>";
        echo "<td>".$row["Choreography_Theme"]."</td>";
        echo "<td>".$row["Rating"]."</td>";
        echo "<td>".$row["Comment"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<br><br>";
    echo "No results found";
}

$DB->close();
?>

</BODY>
</HTML>