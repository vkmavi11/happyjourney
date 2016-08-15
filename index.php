<!--
	*************************************************************************************************

		Developed by : scopeInfinity

	*************************************************************************************************
-->

<style>
body {
    background-image: url("slider.jpg");
    background-size : cover;
    margin-left: 0%;
    margin-right: 0%;
}

h1 {
    color: maroon;
} 
</style>
</br>
<div style="background-color: rgba(206,227,246,10); left: 00%;right: 60%;top:5%;position:absolute;    text-align: center;
 ">

<h1>Search Options</h1></br>
<form action="index.php" method="post" style="">
	<input type="text" name="src" placeholder="Source">
	<br>
	<input type="text" name="dest" placeholder="Destination">
	<br>
  	<input type="radio" name="type" value="car" checked>Car</input>
  	<input type="radio" name="type" value="twowheeler">Two Wheeler</input>
  	<br>
  	<input type="radio" name="day" value="1" checked="true">Sunday</input>
  	<input type="radio" name="day" value="2">Monday</input>
  	<input type="radio" name="day" value="4">Tuesday</input>
  	<input type="radio" name="day" value="8">Wednesday</input>
  	<br>
  	<input type="radio" name="day" value="16">Thrusday</input>
  	<input type="radio" name="day" value="32">Friday</input>
  	<input type="radio" name="day" value="64">Saturday</input>

  	<br>
  	<input type="submit" name="submit" value="Search">	

</form>
</br>
</br>
</br>
<form action="add.php">
<input type="submit" value="Add Users" style="position:fixed;top:5%;right:30%; width:10%;height:5%">
</form>

<?php
	if(isset($_REQUEST['type']) && isset($_REQUEST['day']) && isset($_REQUEST['src'])  && isset($_REQUEST['dest'])) 
	{
		$dataArray = array();
		if(file_exists("data.txt"))
		{
			$data = file_get_contents("data.txt");
			$dataArray = json_decode($data,true);
			$results = $dataArray[$_REQUEST['type']];
			echo "<b>Search Result</b></br>";
			$flag = FALSE;
			foreach($results as $row)
			if(($row['day']&intval($_REQUEST['day']))!=0)
			if(strtolower($row['src'])==strtolower($_REQUEST['src']) && strtolower($row['dest'])==strtolower($_REQUEST['dest']) )
			{
				echo $row['name'] . " (" . $row['contact'] . ")</br> " . $row['address'] . "</br>Type : " . $_REQUEST['type'] . " Time : " . $row['time'] . "</br></br>";  
				$flag = TRUE;
			}
			if(!$flag)
				echo "No Result Found!</br>";
		}

	}

?>
</br>
</div>

