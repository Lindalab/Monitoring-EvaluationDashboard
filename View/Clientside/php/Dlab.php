<?php

require ("../../../Model/projectFunctions.php");
require ("../../../Model/stakeholders.php");
require ("../../../Model/coursesFunctions.php");
require ("../../../Model/eventsFunctions.php");
require ("../../../Model/grantFunctions.php");
$result = mutiplyBarChartsForEventTypeAttendence();




?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
    <title>Ashesi Entrepreneurial Center</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark" style="background-color: rgb(102, 2, 2);">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="Dlab.html" class="spur-logo"><i class="fas fa-copyright"></i> <span>Dashboard</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="Dlab.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Design Lab </a>

                <a href="community.php" class="dash-nav-item">
                    <i class="fas fa-business-time"></i> Community Enter. </a>

                <a href="Students.php" class="dash-nav-item">
                    <i class="fas fa-business-time"></i>Student and Alum </a>

                <a href="Trainning.php" class="dash-nav-item">
                    <i class="fas fa-business-time"></i>Cirriculum</a>

                <a href="AVI.php" class="dash-nav-item">
                    <i class="fas fa-business-time"></i>AVI </a>

            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="type to search">
                </form>
                <div class="tools">

                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" style="background-color:rgb(143, 2, 2); color:white;">

                            <a class="dropdown-item" href="Adminpage.html" style="background-color:rgb(143, 2, 2); color:white;">Admin Login </a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary" style="background-color: rgb(37, 37, 37);">
                                <h3 class="stats-title"> Total Projects </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">
                                            <?php
                                            dlabProject();
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="stats stats-success" style="background-color:rgb(238, 248, 248);">
                                <h3 class="stats-title" style="color: black;"> Total Students </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-user-graduate" style="color: black;"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number" style="color: black;">
                                        <?php
                                        totalStudent();
                                        ?>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="stats stats-info" style="background-color:rgb(143, 2, 2);">
                                <h3 class="stats-title"> Student oragnised Events </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">
                                            <?php
                                            studentOrganisedEvents();
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="stats stats-danger" style="background-color:rgb(175, 4, 4);">
                                <h3 class="stats-title"> Total business models </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-business-time"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">17</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="stats stats-danger" style="background-color:rgb(167, 123, 123);">
                                <h3 class="stats-title">Total Courses</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-business-time"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">
                                            <?php
                                             totalCourses();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4">
                            <div class="stats stats-danger" style="background-color:rgb(75, 72, 72);">
                                <h3 class="stats-title">Total Modules</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-business-time"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">
                                            <?php
                                            totalModules();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card spur-card">
                                    <div class="card-header">
                                        <div class="spur-card-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div class="spur-card-title"> students organized activities by class </div>
                                        <div class="spur-card-menu">
                                            <div class="dropdown show">
                                                <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body spur-card-body-chart" style = "width: 800px; height: 400px; margin: 0 auto" id="id">
                                        <canvas id="spurChartjsTwoBars"></canvas>
                                        <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Event Type', 'Freshman', 'Sophormore', 'Junior', 'Senior'],
        	    <?php
        	    	while($row = mysqli_fetch_array($result)){
        	    		echo "['".$row['EventType']."',".$row['Freshman'].",".$row['Sophormore'].",".$row['Junior'].",".$row['Senior']."],";
        	    	}

        	    ?>
            ]);

            var options = {title: 'Event And Student Populations'};  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('id'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card spur-card">
                                    <div class="card-header">
                                        <div class="spur-card-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div class="spur-card-title"> Student organized activities </div>
                                        <div class="spur-card-menu">
                                            <div class="dropdown show">
                                                <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body spur-card-body-chart">
                                        <canvas id="spurChartjsBar"></canvas>
                                        <script>
                                            var ctx = document.getElementById("spurChartjsBar").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: [" sessions", "hackathon", "entrepreneurial"],
                                                    datasets: [{
                                                        label: 'Blue',
                                                        data: [12, 19, 3],
                                                        backgroundColor: '#ffb3b3',
                                                        borderColor: 'transparent'
                                                    }]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    },
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
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card spur-card">
                                    <div class="card-header">
                                        <div class="spur-card-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div class="spur-card-title">Information session attendance by gender </div>
                                        <div class="spur-card-menu">
                                            <div class="dropdown show">
                                                <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body spur-card-body-chart">
                                        <canvas id="spurChartjsLine"></canvas>
                                        <script>
                                            var ctx = document.getElementById("spurChartjsLine").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: ["2018", "2019", "2020", "2021", "2022"],
                                                    datasets: [{
                                                        label: 'Males',
                                                        data: [12, 19, 3, 5, 2],
                                                        backgroundColor: '#800000',
                                                        borderColor: '#800000',
                                                        fill: false
                                                    }, {
                                                        label: 'Females',
                                                        data: [4, 12, 11, 2, 14],
                                                        backgroundColor: window.chartColors.danger,
                                                        borderColor: window.chartColors.danger,
                                                        fill: false
                                                    }]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card spur-card">
                                    <div class="card-header">
                                        <div class="spur-card-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div class="spur-card-title"> pie chart showing the status of a business model </div>
                                        <div class="spur-card-menu">
                                            <div class="dropdown show">
                                                <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body spur-card-body-chart">
                                        <canvas id="spurChartjsDougnut"></canvas>
                                        <script>
                                            var ctx = document.getElementById("spurChartjsDougnut").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'doughnut',
                                                data: {
                                                    labels: ["validated", "Tested", "not tested", "not validated"],
                                                    datasets: [{
                                                        label: 'Week',
                                                        data: [12, 19, 3, 5],
                                                        backgroundColor: [
                                                            '#800000',
                                                            '#ffb3b3',
                                                            '#cc0000',
                                                            '#ff1a1a',
                                                            window.chartColors.danger,
                                                        ],
                                                        borderColor: '#fff',
                                                        fill: false
                                                    }]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg">
                                <div class="card spur-card">
                                    <div class="card-header">
                                        <div class="spur-card-icon">
                                            <i class="fas fa-table"></i>
                                        </div>
                                        <div class="spur-card-title">Design lab-table</div>
                                    </div>
                                    <div class="card-body " style="height: 260px; overflow-x: hidden;  overflow-y: scroll;">
                                        <table class="table table-in-card">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Description of events</th>
                                                    <th scope="col">Number</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Number of session held</td>
                                                    <td><?php echo totalInforSession()?></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Number of students participating in information session</td>
                                                    <td><?php echo getStudentsAtInfoSession() ?></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Number of hackathon organised</td>
                                                    <td><?php echo totalhackton()?></td>

                                                </tr>
                                                <!-- <tr>
                                                    <th scope="row">4</th>
                                                    <td>Number of entrepreneurial activities organized by clubs</td>
                                                    <td>13</td>

                                                </tr> -->
                                                <!-- <tr>
                                                    <th scope="row">5</th>
                                                    <td>Number of projects sent by students focused on SDGs</td>
                                                    <td>14</td>

                                                </tr> -->
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Number of projects done and prototypes developed</td>
                                                    <td><?php echo inoperationProjects()?></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Number of development agencies /companies partnered</td>
                                                    <td><?php 
                                                    
                                                    echo companyPartner()
                                                    ?></td>

                                                </tr>
                                                <!-- <tr>
                                                    <th scope="row">8</th>
                                                    <td>Number of students undergoing capacity development training</td>
                                                    <td>15</td>

                                                </tr> -->
                                                <!-- <tr>
                                                    <th scope="row">9</th>
                                                    <td>Number of student entrepreneurs guided to design and create their business models</td>
                                                    <td>4</td>

                                                </tr> -->

                                                <!-- <tr>
                                                    <th scope="row">10</th>
                                                    <td>Number of student business models</td>
                                                    <td>18</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td>Number of student business models validated</td>
                                                    <td>10</td> -->

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/spur.js"></script>
</body>

</html>