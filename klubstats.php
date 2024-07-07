<h3> Club Stats </h3>
<table border="1"> 
    <tr>
        <th>Nama Klub</th>
        <th>Menang</th>
        <th>Seri</th>
        <th>Kalah</th>
        <th>Gol</th>
        <th>Kebobolan</th>
    </tr>

    <?php
    include "koneksi.php";
    $no=1;
    $query = "SELECT * FROM team_stats";
    $hasil = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($hasil)) {
        echo "<tr>";
        echo "<td>$row[Nama]</td>";
        echo "<td>$row[Menang]</td>";
        echo "<td>$row[Seri]</td>";
        echo "<td>$row[Kalah]</td>";
        echo "<td>$row[Gol]</td>";
        echo "<td>$row[Kebobolan]</td>";
        echo "</tr>";
    }
    ?>
</table>