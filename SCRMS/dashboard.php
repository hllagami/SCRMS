<?php

session_start();
if (empty($_SESSION["user_name"])) {
    header("location:./index.php?error=nologin");
}

$con  = mysqli_connect("localhost","root","","scrms");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!";
 }else{
         $sql ="SELECT * FROM tblsales";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['Product']  ;
            $sales[] = $row['TotalSales'];
        }
 
 
 }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
    <title>SCRMS - Dashboard</title>
    <link rel="shortcut icon" href="https://icon-library.com/images/crm-icon/crm-icon-6.jpg">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
    
    <style>
        .wrapper-flex {
            min-height: 100vh;
            flex-direction: row !important;
        }
        .chart{
            padding-top: 75px;
            background-color:#e26179;
            width:50%;
            height:60%;
            text-align:center;
            font-size: 16px;
            font-weight: 600;
            z-index: 5;
            float: left;
            border-radius: 20px;
        }
        .userdata{
            width: 40%;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            z-index: 5;
            float: left;
            border-radius: 20px;
        }
        .dashboard-options{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: transparent;
        }
        .dashboard-opt {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            float: left;
            width: 12rem;
            height: 3rem;
            background-color: #e26179;
            border: 1px solid #b23149;
            border-radius: 10px;
        }
        .dashboard-opt > a {
            position: absolute;
            display: block;
            text-align: center;
            color: #f2f2f2;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
        }
        .dashboard-opt > a:hover {
            color: #b23149;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
    </head>
    <body>
    <div class=navbar>
        <ul>
            <li><a href="index.php">SCRMS</a></li>
            <li><a href="#">Lead Management</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="contacts.php">Contacts</a></li>

            <?php # Navbar showing Username and Log out
            if (isset($_SESSION["user_id"])) {
                ?>
                <li style="float:right"><a href="includes/logout-inc.php">Log Out</a></li>
                <li style="float:right"><a href="./profile.php">
                        <?php echo $_SESSION["user_name"]; ?>
                    </a></li>
                <?php
            } else {
                ?>
                <li style="float:right"><a href="./index.php">Log In</a></li>
                <li style="float:right"><a href="./index.php">Sign Up</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class=wrapper-flex>
        <br>
        <div class=chart>
            <h2 class="page-header" >Analytics Reports </h2>
            <div>Product </div>
            <canvas  id="chartjs_bar"></canvas> 
            <div class=dashboard-options>
        <div class=dashboard-opt><a href="./addData.php">Add Data</a></div>
        <div class=dashboard-opt><a href="./updateData.php">Update Data</a></div>
        </div>
        </div>   
    
        <div class=userdata>
            <br>
    <?php
    // Retrieve data from the "salesdb" table
    $con = mysqli_connect("localhost", "root", "", "scrms");
    if (!$con) {
        echo "Problem in database connection! Contact administrator!";
    } else {
        $sql = "SELECT * FROM tblsales";
        $result = mysqli_query($con, $sql);

        // Iterate over each row of the result and echo the product name and total sales
        while ($row = mysqli_fetch_array($result)) {
            $productName = $row['Product'];
            $totalSales = $row['TotalSales'];

            echo "<div>";
            echo "<h2><span style=color:black>Product:</span> $productName</h2>";
            echo "<h3 style=padding-bottom:25px;><span style=color:black>Sales Revenue:</span> $$totalSales</h3>";
            echo "</div>";
        }
    }
    ?>
</div>
    
        </div>
        
        </div>
        
        </div>

    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                                "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7140fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>