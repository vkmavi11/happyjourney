<!--
	*************************************************************************************************

		Developed by : HumansAtAll

	*************************************************************************************************
-->


<style>
body {
    background-color: #81BEF7;
    text-align: center;
    margin-left: 0%;
    margin-right: 0%;
}

h1 {
    color: maroon;
} 
</style>
</br>
<div style="background-color: #CEE3F6; padding-left: 10%;padding-right: 10%; ">
<h1>Add Details</h1></br>

<form action="add.php" method="post" >
	<input type="text" name="name" placeholder="Name">
	<br>
  	<input type="text" name="contact" placeholder="Contact Number">
	<br>
	<input type="text" name="address" placeholder="Address">
	<br>
	<input type="text" name="time" placeholder="HH:MM">
	<br>
  	<input type="text" name="src" placeholder="Source">
	<br>
	<input type="text" name="dest" placeholder="Destination">
	<br>


  	<br>
  	<input type="radio" name="type" value="car" checked>Car</input>
  	<input type="radio" name="type" value="twowheeler">Two Wheeler</input>
  	<br>
  	<input type="checkbox" name="day0" value="1">Sunday</input>
  	<input type="checkbox" name="day1" value="2">Monday</input>
  	<input type="checkbox" name="day2" value="4">Tuesday</input>
  	<input type="checkbox" name="day3" value="8">Wednesday</input>
  	<input type="checkbox" name="day4" value="16">Thrusday</input>
  	<input type="checkbox" name="day5" value="32">Friday</input>
  	<input type="checkbox" name="day6" value="64">Saturday</input>

  	<br>
  	<input type="submit" name="submit" value="Add Details">	

</form>

</br>
</br>
</div>
</br>
<form action="index.php">
<input type="submit" value="Search Records" style="position:fixed;top:3%;right:5%">
</form>
<?php
	if(isset($_REQUEST['type'])  && isset($_REQUEST['time']) && isset($_REQUEST['name'])   && isset($_REQUEST['address'])  && isset($_REQUEST['contact'])  && isset($_REQUEST['src'])  && isset($_REQUEST['dest']))
	{
		$dataArray = array();
		$day = 0;
		if(isset($_REQUEST['day0']))
			$day|=1;
		if(isset($_REQUEST['day1']))
			$day|=2;
		if(isset($_REQUEST['day2']))
			$day|=4;
		if(isset($_REQUEST['day3']))
			$day|=8;
		if(isset($_REQUEST['day4']))
			$day|=16;
		if(isset($_REQUEST['day5']))
			$day|=32;
		if(isset($_REQUEST['day6']))
			$day|=64;
		if($day!=0)
		{
			if(file_exists("data.txt"))
			{
				$data = file_get_contents("data.txt");
				$dataArray = json_decode($data,true);
			}
			$row = array('day' => $day,'name' => $_REQUEST['name'],'time' => $_REQUEST['time'],'src' => $_REQUEST['src']
				,'dest' => $_REQUEST['dest'],'contact' => $_REQUEST['contact'],'address' => $_REQUEST['address']);
			$dataArray[$_REQUEST['type']][] = $row;
			file_put_contents("data.txt", json_encode($dataArray));
			echo "<h1>Details Added!</h1>";
		}
		else
			echo "<script>alert('Choose Atleast One Day!');</script>";
	}
?>