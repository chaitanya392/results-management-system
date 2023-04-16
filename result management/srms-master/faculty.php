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
    <title>Results</title>

</head>
<body>
    <?php
        include("init.php");
       
        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];

        // validation
        if (empty($class)) { 
           ?>
	<script type="text/javascript">
	alert("Please Select Class");
	window.location.href = "./faculty_login.php";
	</script>
           <?php
            exit();
        }


	 $result_data = mysqli_query($conn,"SELECT * FROM `result` WHERE `class`='$class'  order by `rno` asc");


           if (mysqli_num_rows($result_data) > 0) {
               echo "<table>
                <caption>Results</caption>
                <tr>
                <th>Roll.No</th>
                <th>NAME</th>
	<th>Branch</th>
	<th>Sub1</th>
	<th>Sub2</th>
	<th>Sub3</th>
	<th>Sub4</th>
	<th>Sub5</th>
	<th>Total</th>
	<th>Percentage</th>
                </tr>";

                while($row = mysqli_fetch_assoc($result_data))

                  {
                  echo "<tr>";
                  echo "<td>" . $row['rno'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
	echo"<td>" . $row['class'] . "</td>";
	echo"<td>" . $row['p1'] . "</td>";
	echo"<td>" . $row['p2'] ."</td>";
	echo"<td>" . $row['p3'] . "</td>";
	echo"<td>" . $row['p4'] . "</td>";
	echo"<td>" . $row['p5'] . "</td>";
	echo"<td>".$row['marks'] . "</td>";
	echo"<td>" . $row['percentage'] .  "</td>";
    
                  echo "</tr>";

                  }

                echo "</table>";
            } 
        else {
                echo "0 results";
            }
    ?>
        
        
        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>


</body>
</html>