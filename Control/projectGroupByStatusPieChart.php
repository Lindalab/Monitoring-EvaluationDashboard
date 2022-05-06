<?php  
  
 require "../Model/projectFunctions.php";

     $result = projectGroupByStatus();
  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Project_status', 'number_of_projects'],  
                          <?php  
                         
                         while($row = mysqli_fetch_array($result))  
                          {  
                              echo "['".$row["Status"]."', ".$row["number_of_projects"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Projects and their status',  
                      is3D:true,  
                      // pieHole: 0.4,
                        slices: {  0: {offset: 0.1},
                    // 1: {offset: 0.2},
                    // 2: {offset: 0.1},
                    // 15: {offset: 0.5},
          }, 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
            
           <div style="width:900px;">   
                <div id="piechart" style="width: 800px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>