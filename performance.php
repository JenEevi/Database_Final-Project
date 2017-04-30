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
$sql = "SELECT WORKOUT_SET.Choreography_Theme, PERFORMANCE.SET_IDNum, COUNT(SET_IDNum) AS numTimes, PERFORMANCE.Date, MAX(Date) as recentDate FROM PERFORMANCE, WORKOUT_SET 
WHERE WORKOUT_SET.Set_ID=PERFORMANCE.SET_IDNum
GROUP BY SET_IDNum";
$result = $DB->query($sql);

if ($result->num_rows > 0)	{
    echo "<br><br>";
    echo "<table align=\"center\" style =\"width:35%\">
<caption><h2>Performance Information</h2></caption>
<tr>
<th>Set ID</th>
<th>Choreography Theme</th>
<th>Times Performed</th>
<th>Last Date Performed</th>";
    while ($row = $result->fetch_assoc())	{
        echo "<tr>";
        echo "<td>".$row["SET_IDNum"]."</td>";
        echo "<td>".$row["Choreography_Theme"]."</td>";
        echo "<td>".$row["numTimes"]."</td>";
        echo "<td>".$row["recentDate"]."</td>";
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