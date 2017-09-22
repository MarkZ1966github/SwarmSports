<?php

//A script for displaying the stories and putting them into a table
$search = false;

	//Check for registration.
	if($_POST['search'])
	{ 
		//Data has been submitted, now its time to save it.
		//First get all the data from the POST.
		$search = $_POST['registersearch'];
				
		//Make sure that a devious hacker can't inject HTML, Javascript, or PHP.
		$search = strip_tags($search);
	}
	
include "logic/logic.viralrank.php"; //get access to viral score functions.
if ( strpos(strtolower($_SERVER['SCRIPT_NAME']),strtolower(basename(__FILE__))) ) {
    header("Location: index.php");
    die("Denny access");
	}
error_reporting(E_ALL); 
$config = parse_ini_file("logic/my.ini") ;
$db = new mysqli($config['dbLocation'] , $config['dbUser'] , $config['dbPassword'] , $config['dbName']);
if(mysqli_connect_error()) {
 throw new Exception("<b>No Connect to database</b>") ;
}
if (!$result = $db->query("SELECT storytitle, remarks, url, datetime FROM `swarmsearch` WHERE storytitle like '%$search%' order by datetime desc")) {
    throw new Exception("<b>Could not read data from the table </b>") ;
}

$num=mysqli_num_rows($result); 

?>
<?php
if ($num < 10){
?>
<div style="margin-left: 65px;">

<table width = "1024" border="0" cellspacing="2" cellpadding="2">
<tr>
<td width = "10%"><strong><a href = "http://blog.swarmsports.com/faq/#ViralRank" title = "The ViralRank™ is a weighted score which shows how viral an article on SwarmSports is across the internet." target = "_blank">ViralRank</a></strong></td>
<td width = "50%"><strong>Articles</strong></td>
<td width = "20%"><strong>Source</strong></td>
<td width = "20%"><strong>Date</strong></td>
</tr>
<?php
$i=0;
while ($i < $num && $data = $result->fetch_object()) {
$storytitle = $data->storytitle;
$url = $data->url;
$remarks = $data->remarks;
$datetime = $data->datetime;
?>

<tr>
<td width = "10%">
<strong><?php echo get_viralscore($url); ?></strong><br>
</td>
<td width = "50%"><a href = "<?php echo $url; ?> "target ="_blank"><?php echo $storytitle; ?></a></td>
<td width = "20%"><?php echo $remarks; ?></td>
<td width = "20%"><?php echo date("F j, Y, g:i a", strtotime($datetime)) ; ?><br />
</td>
</tr>

<?php
if (E_NOTICE) {

        continue;
    }
$i++;
	}
}
else
{
?>
<div style="margin-left: 65px;">

<table width = "1024" border="0" cellspacing="2" cellpadding="2">
<tr>
<td width = "50%"><strong>Articles</strong></td>
<td width = "20%"><strong>Source</strong></td>
<td width = "20%"><strong>Date</strong></td>
</tr>
<?php
$i=0;
while ($i < $num && $data = $result->fetch_object()) {
$storytitle = $data->storytitle;
$url = $data->url;
$remarks = $data->remarks;
$datetime = $data->datetime;
?>

<tr>
<td width = "50%"><a href = "<?php echo $url; ?> "target ="_blank"><?php echo $storytitle; ?></a></td>
<td width = "20%"><?php echo $remarks; ?></td>
<td width = "20%"><?php echo date("F j, Y, g:i a", strtotime($datetime)) ; ?><br />
</td>
</tr>

<?php
if (E_NOTICE) {

        continue;
    }
$i++;
	}
}
?>
</table>
</div>