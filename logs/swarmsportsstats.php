<html>

<head>
	<title>SwarmSports Statistics</title>
</head>

<body>
<a name = "top"></a>
	<h1>SwarmSports Statistics</h1>
	<a href = "http://hornet.swarmsports.com/">Back to Hornet</a>
	
	<br/><br/>
	<strong>Number of unique visitors:</strong> 
	<?php
	// connect to the database
	
	// fill in your databasa data here!
	include "logic.initialize.php";
	
	// get the number of unique visitors
	$query = "SELECT * FROM swarmtracker where isbot = 0 GROUP BY ip";
	$result = mysql_query($query);
	$number = mysql_num_rows($result);
	
	// show the number
	echo $number;
	?>
	<br/><br/>
	<a href = "#unique">View Unique Visitors</a>
	<br/><br/>
	<strong>The number of bots:</strong> 
	
	<?php
	// connect to the database
	// fill in your databasa data here!
	include "logic.initialize.php";
	// get the number of unique visitors
	$q1 = "create view bots as select * from swarmtracker where isbot = 1";
	$thebots = mysql_query($q1);
	$q2 = "SELECT count(*) as `total` FROM `bots`";
	$thequery = mysql_query($q2);
	$thecount= mysql_fetch_array($thequery);
	echo $thecount['total'];
	?>
	<br/><br/>
	<a href = "#bots">View Bots</a>
	<br/><br/>
	<h2>SwarmSports visitors - Not flagged as bot</h2>
	<br/><br/>
	<strong>Number of visitors:</strong>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>IP</th>
			<th>Date</th>
			<th>Time</th>
			<th>User agent</th>
			<th>Country</th>
			<th>City</th>
			<th>Query String</th>
			<th>Referer</th>
		</tr>
		<?php
		// get the list of visitors
		$q1 = "create view notbots as select * from swarmtracker where isbot = 0";
		$notbots = mysql_query($q1);
		$q2 = "SELECT * FROM `notbots`";
		$thequery = mysql_query($q2);
		$q3 = "SELECT count(*) as `total` FROM `notbots`";
		$thecount2 = mysql_query($q3);
		$thecount3 = mysql_fetch_array($thecount2);
		echo $thecount3['total'];
		while ($row = mysql_fetch_array($thequery))
		{
			?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['ip'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['time'];?></td>
				<td><?php echo $row['http_user_agent'];?></td>
				<td><?php echo $row['country'];?></td>
				<td><?php echo $row['city'];?></td>
				<td><?php echo $row['query_string'];?></td>
				<td><?php echo $row['http_referer'];?></td>
			</tr>
			<?php
		}
		?>
	</table>
	
	<br /> <br />
	<h2><a name = "unique">Unique Visitors</a> - <a href = "#top">Back to Top</a></h2>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>IP</th>
			<th>Date</th>
			<th>Time</th>
			<th>User agent</th>
			<th>Country</th>
			<th>City</th>
			<th>Query String</th>
			<th>Referer</th>
		</tr>
			<?php
		// get the list of uniques
		$q1 = "SELECT * FROM swarmtracker where isbot = 0 GROUP BY ip";
		$uniques = mysql_query($q1);
		while ($row = mysql_fetch_array($uniques))
		{
			?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['ip'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['time'];?></td>
				<td><?php echo $row['http_user_agent'];?></td>
				<td><?php echo $row['country'];?></td>
				<td><?php echo $row['city'];?></td>
				<td><?php echo $row['query_string'];?></td>
				<td><?php echo $row['http_referer'];?></td>
			</tr>
			<?php
		}
		?>
	</table>
<br /> <br />
	<h2><a name = "bots">Bots</a> - <a href = "#top">Back to Top</a></h2>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>IP</th>
			<th>Date</th>
			<th>Time</th>
			<th>User agent</th>
			<th>Country</th>
			<th>City</th>
			<th>Query String</th>
			<th>Referer</th>
		</tr>
			<?php
		// get the list of uniques
		$q1 = "SELECT * FROM bots";
		$bots = mysql_query($q1);
		while ($row = mysql_fetch_array($bots))
		{
			?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['ip'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['time'];?></td>
				<td><?php echo $row['http_user_agent'];?></td>
				<td><?php echo $row['country'];?></td>
				<td><?php echo $row['city'];?></td>
				<td><?php echo $row['query_string'];?></td>
				<td><?php echo $row['http_referer'];?></td>
			</tr>
			<?php
		}
		?>
	</table>	
	<?php
	include "logic.initialize.php";
	$q3 = "drop view bots";
	mysql_query($q3)
	?>
	<?php
	include "logic.initialize.php";
	$q4 = "drop view notbots";
	mysql_query($q4)
	?>
</body>

</html>