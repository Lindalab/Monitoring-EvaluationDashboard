<?php  
  
  require ("../Model/eventsFunctions.php");
  $result = eventsAttendByAParticularIndividualsGender();  
  ?>  
  <!DOCTYPE html>  
  <html>  
       <head>  
            <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
            <script type="text/javascript">  
            google.charts.load('current', {'packages':['corechart']});  
            google.charts.setOnLoadCallback(drawChart);  
            function drawChart()  
            {  
                 var data = google.visualization.arrayToDataTable([  
                           ['Gender', 'Number'],  
                           <?php  
                          
                          while($row = mysqli_fetch_array($result))  
                           {  
                                echo "['".$row["gender"]."', ".$row["number_of_Attendees"]."],";  
                           } 
 
                           // The function will refresh the page 
                           // in every 3 second
                           header("refresh: 3"); 
                           ?>  
                      ]);  
                 var options = {  
                       title: 'Percentage of Male and Female Employee',  
                       is3D:true,  
                       pieHole: 0.4  
                      };  
                 var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                 chart.draw(data, options);  
            }  
            </script>  
       </head>  
       <body>  
             
            <div style="width:900px;">  
                 <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                 <br />  
                 <div id="piechart" style="width: 700px; height: 200px;"></div>  
            </div>  
       </body>  
  </html>