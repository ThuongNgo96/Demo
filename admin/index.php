<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if (!isset($_SESSION['useradmin'])) {
    redirectAdmin("./login.php");
}

?>
<!doctype html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">

<head>
    <title>Sakura</title>
    <style>
        a:hover {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <?php
    include("headAmin.php")
    ?>

    <div class="container-fluid pt-48 ">
        <div class="row ">
            <?php include("leftAdmin.php") ?>
            <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                    <div class=" ">
                        <h2>Drashboard</h2>
                    </div>
                    <div class=" ">
                        <button class=" btn btn-outline-secondary">Share</button>
                        <button class=" btn btn-outline-secondary">Export</button>
                        <button class=" btn btn-outline-secondary"><i class="far fa-calendar-alt"></i> This week <i class="fas fa-caret-down"></i></button>
                    </div>
                </div>
                <hr>
                <div class=" Char">
                    <canvas id="myChart"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
                <div class=" Table mt-3 ">
                    <h2>Section title</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Header</th>
                                <th scope="col">Header</th>
                                <th scope="col">Header</th>
                                <th scope="col">Header</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>amet</td>
                                <td>consectetur </td>
                                <td>adipiscing </td>
                                <td>elit</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Integer </td>
                                <td>nec</td>
                                <td>odio</td>
                                <td>Praesent</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footerAdmin.php")
    ?>
</body>

</html>