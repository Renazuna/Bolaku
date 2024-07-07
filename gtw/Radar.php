<?php
$koneksi = mysqli_connect("localhost", "root", "", "bolaku");

$query = "SELECT * FROM player_stats";
$hasil = mysqli_query($koneksi, $query);

$data = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Radar Chart</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Bevle/X+R7YkIZDRvuzKMRqH+OrBnVFBL6D0itfPri4tjfHxaNutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

  <h1 class="text-center mb-5">Menampilkan Status Pemain</h1>
  <canvas id="myChart" width="400" height="400"></canvas>
    
  <section>
    <table class="table table-bordered mx-auto" style="width: 400px;">
      <tr>
        <th>Speed</th>
        <th>Shooting</th>
        <th>Passing</th>
        <th>Dribbling</th>
        <th>Defense</th>
        <th>Stamina</th>
      </tr>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo $row['speed']; ?></td>
        <td><?php echo $row['shooting']; ?></td>
        <td><?php echo $row['passing']; ?></td>
        <td><?php echo $row['dribbling']; ?></td>
        <td><?php echo $row['defense']; ?></td>
        <td><?php echo $row['stamina']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+303U5yEx1q6G5YGSHk7tPXikyn57ogEvDej/m4"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3873KE6t16bjs2QrFaJ6z5/SUsLqktiwsUTF553fv3qYSDhgCecCxW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
    integrity="sha512-jkoY+oDUwVKuLRBoOv2yl4KvQKlvLaOGuD5YVZcdYQmbPgAGcRMb4VbxNlMgX0+qeCGgdPKd+QHsOQa6lw16Mw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    const data = {
      labels: [
        'Speed',
        'Shooting',
        'Passing',
        'Dribbling',
        'Defense',
        'Stamina',
      ],
      datasets: [{
        label: 'Player Stats',
        data: [
          <?php foreach ($data as $row): ?>
            <?php echo $row['speed']; ?>,
            <?php echo $row['shooting']; ?>,
            <?php echo $row['passing']; ?>,
            <?php echo $row['dribbling']; ?>,
            <?php echo $row['defense']; ?>,
            <?php echo $row['stamina']; ?>,
          <?php endforeach; ?>
        ],
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
      }]
    };

    const config = {
      type: 'radar',
      data: data,
      options: {
        elements: {
          line: {
            borderWidth: 3
          }
        }
      },
    };

    var myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>

</body>

</html>
