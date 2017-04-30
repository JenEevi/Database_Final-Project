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
$sql = "SELECT WORKOUT_SET.Set_ID, PIECE_OF_MUSIC.M_Genre, WORKOUT_SET.Choreography_Theme, PIECE_OF_MUSIC.M_WorkoutCategory, PIECE_OF_MUSIC.SongName, MUSIC_IN_SET.Order_Num, PIECE_OF_MUSIC.SongName, PIECE_OF_MUSIC.SongLength, PIECE_OF_MUSIC.M_Placement 
from WORKOUT_SET 
INNER JOIN MUSIC_IN_SET ON WORKOUT_SET.Set_ID=MUSIC_IN_SET.Set_Num
INNER JOIN PIECE_OF_MUSIC ON MUSIC_IN_SET.M_ID=PIECE_OF_MUSIC.Music_ID
ORDER BY Set_ID, Order_Num";
$result = $DB->query($sql);

if ($result->num_rows > 0)	{
    echo "<br><br>";
    echo "<table align=\"center\" style =\"width:35%\">
<caption><h2>Set Information by Set and Song Information</h2></caption>
<tr>
<th>Set ID</th>
<th>Music Genre</th>
<th>Choreography Theme</th>
<th>Workout Category</th>
<th>Song Name</th>
<th>Order</th>
<th>Song Length</th>
<th>Placement</th>";
    while ($row = $result->fetch_assoc())	{
        echo "<tr>";
        echo "<td>".$row["Set_ID"]."</td>";
        echo "<td>".$row["M_Genre"]."</td>";
	echo "<td>".$row["Choreography_Theme"]."</td>";
        echo "<td>".$row["M_WorkoutCategory"]."</td>";
        echo "<td>".$row["SongName"]."</td>";
	echo "<td>".$row["Order_Num"]."</td>";
        echo "<td>".$row["SongLength"]."</td>";
        echo "<td>".$row["M_Placement"]."</td>";
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