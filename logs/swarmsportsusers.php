<html>

<head>
	<title>SwarmSports Users</title>
</head>

<body>

	<h1>SwarmSports Users</h1>
	<a href = "http://hornet.swarmsports.com/">Back to Hornet</a>
	<br/><br/>
	The number of users is: 
	<?php
	// connect to the database
	
	// fill in your databasa data here!
	include "logic.initialize.php";
	// get the number of users
	$sql = "SELECT count(*) AS `total` from `swarmmembers`";
	$thecount = mysql_query($sql);
	$thequery = mysql_fetch_array($thecount);
	echo $thequery['total'];
	?>
	
	<br/><br/>
	
	SwarmSports Users:
	<br/><br/>
	<table border="1">
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<?php
		// get the list of visitors
		$query = "select * from swarmmembers";
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result))
		{
			?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['email'];?></td>
			</tr>
			<?php
		}
		?>
	</table>

</body>

</html>