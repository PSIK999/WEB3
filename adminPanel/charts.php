<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <!-- ======= Styles ====== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="maintitle">𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵</span>
                    </a>
                </li>

                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>

                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="manageUsers.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Users</span>
                    </a>
                </li>

                <li>
                    <a href="charts.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Charts</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="../signup/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

<div class="chartContainer">
    <div class="chart" id="chart2">
        <canvas id="myChart2" style="width:100%; max-width: 1150px;"></canvas>
    </div>
    <div class="chartRow">
        <div class="chart" id="chart1">
            <canvas id="myChart1" style="width:100%; max-width: 700px; height: 550px;"></canvas>
        </div>
        <div class="chart" id="chart3">
            <canvas id="myChart3" style="width:100%; max-width: 700px; height: 550px;"></canvas>
        </div>
    </div>
</div>

<style>
    .chartContainer {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .chartRow {
        display: flex;
        gap: 20px;
        justify-content: space-around;
    }

    .chart {
        width: 100%;
        max-width: 700px;
    }

    #chart2 {
        max-width: 1150px;
    }

    #chart1, #chart3 {
        height: 550px;
    }
</style>

<script>
            var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = [
                "#FF6347 ",
                "#40E0D0 ",
                "#EE82EE ",
                "#FFD700 ",
                "#7FFFD4 "
            ];
            new Chart("myChart3", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "World Wide Wine Production"
                    }
                }
            });

            var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = [
                "#FF1493",
                "#00FA9A",
                "#FF8C00",
                "#9400D3",
                "#00BFFF"
            ];
            
            new Chart("myChart1", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "This Week's Sales"
                    }
                }
            });

            var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = ["#9932CC", "#3CB371", "#FF69B4", "#4682B4", "#DDA0DD"];
            
            new Chart("myChart2", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "This Year's Sales"
                    }
                }
            });
            </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="assets/js/main.js"></script>
        
        
    </body>
    
</html>