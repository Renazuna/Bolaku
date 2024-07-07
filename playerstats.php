<h3> Player Stats </h3>
<table border="1"> 
    <tr>
        <th>Nama Pemain</th>
        <th>klub</th>
        <th>Speed</th>
        <th>Shooting</th>
        <th>Passing</th>
        <th>Dribbling</th>
        <th>Defense</th>
        <th>Stamina</th>
    </tr>

    <?php
    include "koneksi.php";
    $no=1;
    $query = "SELECT * FROM player_stats";
    $hasil = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($hasil)) {
        echo "<tr>";
        echo "<td>$row[nama]</td>";
        echo "<td>$row[klub]</td>";
        echo "<td>$row[speed]</td>";
        echo "<td>$row[shooting]</td>";
        echo "<td>$row[passing]</td>";
        echo "<td>$row[dribbling]</td>";
        echo "<td>$row[defense]</td>";
        echo "<td>$row[stamina]</td>";
        echo "</tr>";
    }
    ?>
</table>