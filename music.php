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
$sql = "SELECT * FROM PIECE_OF_MUSIC ORDER BY M_WorkoutCategory, SongLength";
$result = $DB->query($sql);

if ($result->num_rows > 0)	{
    echo "<br><br>";
    echo "<table align=\"center\" style =\"width:35%\">
<caption><h2>Music Information by Workout Category and Song Length</h2></caption>
<tr>
<th>Music ID</th>
<th>Workout Category</th>
<th>Song Length</th>
<th>Song Name</th>
<th>Artist</th>
<th>Placement</th>
<th>Body Part</th>
<th>Music Genre</th>";
    while ($row = $result->fetch_assoc())	{
        echo "<tr>";
        echo "<td>".$row["Music_ID"]."</td>";
        echo "<td>".$row["M_WorkoutCategory"]."</td>";
        echo "<td>".$row["SongLength"]."</td>";
        echo "<td>".$row["SongName"]."</td>";
        echo "<td>".$row["Artist"]."</td>";
        echo "<td>".$row["M_Placement"]."</td>";
        echo "<td>".$row["M_BodyPart"]."</td>";
        echo "<td>".$row["M_Genre"]."</td>";

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