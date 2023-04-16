<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result Analysis</title>

</head>
<body>
    <?php
        include("init.php");
       
        

session_start(); # read up on session.auto_start
$class = $_SESSION["a"];
        // validation
        if (empty($class)) { 
           ?>
	<script type="text/javascript">
	alert("Please Select Class");
	window.location.href = "./result_analysis.php";
	</script>
           <?php
            exit();
        }


	 $result_data = mysqli_query($conn,"SELECT * FROM `result` WHERE `class`='$class'  order by `rno` asc");
	

           if (mysqli_num_rows($result_data) > 0) {
               
	$p1fail=0;
	$p2fail=0;
	$p3fail=0;
	$p4fail=0;
	$p5fail=0;
	$num_students=0;

                while($row = mysqli_fetch_assoc($result_data))

                  {
		$num_students++;
                 
                 if( $row['p1'] <"35"){
	$p1fail ++;
	}
	if( $row['p2'] <"35"){
	$p2fail ++;
	}
	if( $row['p3'] <"35"){
	$p3fail ++;
	}
	if( $row['p4'] <"35"){
	$p4fail ++;
	}
	if( $row['p5'] <"35"){
	$p5fail ++;
	}
	
          }
	$p1pass=$num_students-$p1fail;
	$p2pass=$num_students-$p2fail;
	$p3pass=$num_students-$p3fail;
	$p4pass=$num_students-$p4fail;
	$p5pass=$num_students-$p5fail;

	$p1pass_perc=round(($p1pass/$num_students)*100,2);
	$p2pass_perc=round(($p2pass/$num_students)*100,2);
	$p3pass_perc=round(($p3pass/$num_students)*100,2);
	$p4pass_perc=round(($p4pass/$num_students)*100,2);
	$p5pass_perc=round(($p5pass/$num_students)*100,2);
  
	$p1fail_perc=round(($p1fail/$num_students)*100,2);
	$p2fail_perc=round(($p2fail/$num_students)*100,2);
	$p3fail_perc=round(($p3fail/$num_students)*100,2);
	$p4fail_perc=round(($p4fail/$num_students)*100,2);
	$p5fail_perc=round(($p5fail/$num_students)*100,2);
	
	$total_students=$num_students*5;
	$total_pass=$p1pass+$p2pass+$p3pass+$p4pass+$p5pass;
	$total_fail=$p1fail+$p2fail+$p3fail+$p4fail+$p5fail;
	$total_pass_perc=($total_pass/$total_students)*100;
	$total_fail_perc=($total_fail/$total_students)*100;
	
	echo "Class : $class";
	echo"<br><br><br><br><br>";
	

?>
<h1 style="text-align:center">Subject Wise Result Percentage Analysis</h1>
<?php echo"<br><br><br>"; ?>

<div id="Barcontainer"  style="width: 75%;">
<canvas id="Canvas" left="80px" width="320" height="150"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>

var p1pass_perc= "<?php echo $p1pass_perc; ?>";
var p2pass_perc= "<?php echo $p2pass_perc; ?>";
var p3pass_perc= "<?php echo $p3pass_perc; ?>";
var p4pass_perc= "<?php echo $p4pass_perc; ?>";
var p5pass_perc= "<?php echo $p5pass_perc; ?>";

var p1fail_perc= "<?php echo $p1fail_perc; ?>";
var p2fail_perc= "<?php echo $p2fail_perc; ?>";
var p3fail_perc= "<?php echo $p3fail_perc; ?>";
var p4fail_perc= "<?php echo $p4fail_perc; ?>";
var p5fail_perc= "<?php echo $p5fail_perc; ?>";

var barChartData = {
  labels: ["Sub1", "Sub2", "Sub3", "Sub4", "Sub5"],
  datasets: [
 {
      label: "Pass",
      backgroundColor: "blue",
      borderColor: "black",
      borderWidth: 1,
      data:[p1pass_perc,p2pass_perc,p3pass_perc,p4pass_perc,p5pass_perc]
    },
    {
      label: "Fail",
      backgroundColor: "red",
      borderColor: "black",
      borderWidth: 1,
      data:  [p1fail_perc,p2fail_perc,p3fail_perc,p4fail_perc,p5fail_perc]
    }
    
  ] };

window.onload = function() {
  var ctx = document.getElementById("Canvas").getContext("2d");
  window.myBar = new Chart(ctx, {
    type: "bar",
    data: barChartData,
    options: {
    "hover": {
      "animationDuration": 0
    },
    "animation": {
      "duration": 1,
      "onComplete": function() {
        var chartInstance = this.chart,
          ctx = chartInstance.ctx;

        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
        ctx.textAlign = 'center';
        ctx.textBaseline = 'bottom';

        this.data.datasets.forEach(function(dataset, i) {
          var meta = chartInstance.controller.getDatasetMeta(i);
          meta.data.forEach(function(bar, index) {
            var data = dataset.data[index];
            ctx.fillText(data, bar._model.x, bar._model.y - 5);
          });
        });
      }
    },
    legend: {
      "display":true,
         position: "bottom"
    },
 title:{
	"display":true
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
};


</script>
<?php
	
            } 
        else {
                echo "0 results";
            }
    ?>
        
        
        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
	
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #04AA6D;
  color: white;
}

.round {
  border-radius: 50%;
}
</style>

<a href="#" class="previous">&laquo; Previous</a>
<a href="result_analyzer2.php" class="next">Next &raquo;</a>
</body>
</html>
</body>
</html>