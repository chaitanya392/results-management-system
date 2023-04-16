<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

table.center {
  margin-left: auto; 
  margin-right: auto;
}
</style>
</head>
<body>

 <div class="slider">
            <img src="images/student_result.png" class="slider-image" alt="img"width="1520" height="200">
        </div>

    <?php
        include("init.php");
         session_start();

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                ?>
	<script type="text/javascript">
	alert("Enter Vaild Detials");
	window.location.href = "./student_login.php";
	</script>
           <?php
            if(empty($rn))
                ?>
	<script type="text/javascript">
	alert("Enter Vaild Detials");
	window.location.href = "./student_login.php";
	</script>
           <?php
            if(preg_match("/[a-z]/i",$rn))
                ?>
	<script type="text/javascript">
	alert("Enter Vaild Detials");
	window.location.href = "./student_login.php";
	</script>
           <?php
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            
           ?>
	<script type="text/javascript">
	alert("No Result");
	window.location.href = "./student_login.php";
	</script>
           <?php
	
                  
            exit();
	
        }
    ?>
    
    <div class="container">
        <div class="details">
            <span><b>Name:</b></span> <?php echo $name ?> <br>
            <span><b>Branch:</b></span> <?php echo $class; ?> <br>
            <span><b>Roll No.:</b></span> <?php echo $rn; ?> <br>
        </div>

       

<table border=1 class="center" style="width:60%">
  <thead>
    <tr style="height:50px">
      <th style="width:50%" >Subjects</th>
      <th style="width:30%" >Marks</th>
    </tr>
   </thead>
   <tbody>
     <tr style="height:30px">
       <td>Subject 1</td>
       <td><?php echo "$p1"?></td>
     </tr>
     <tr style="height:30px">
       <td>Subject 2</td>
       <td><?php echo "$p2"?></td>
     </tr>
    <tr style="height:30px">
       <td>Subject 3</td>
       <td><?php echo "$p3"?></td>
     </tr>
     <tr style="height:30px">
       <td>Subject 4</td>
       <td><?php echo "$p4"?></td>
       </tr>
     <tr style="height:30px">
       <td>Subject 5</td>
       <td><?php echo "$p5"?></td>
     </tr>
     <tr>
     </tr>
  </tbody>
</table>


        <div class="result">
	 
            <?php echo '<p ><b>Total Marks:</b>&nbsp'.$mark.' / 500 </p>';?>
            <?php echo '<p><b>Percentage:</b>&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>