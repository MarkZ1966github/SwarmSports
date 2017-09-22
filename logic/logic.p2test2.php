<?php
//A script for displaying the stories and putting them into a table

if ( strpos(strtolower($_SERVER['SCRIPT_NAME']),strtolower(basename(__FILE__))) ) {
    header("Location: index.php");
    die("Denny access");
	} 
$config = parse_ini_file("logic/my.ini") ;
$db = new mysqli($config['dbLocation'] , $config['dbUser'] , $config['dbPassword'] , $config['dbName']);
if(mysqli_connect_error()) {
 throw new Exception("<b>No Connect to database</b>") ;
}
if (!$result = $db->query("SELECT * FROM manualtable order by viralrank desc")) {
    throw new Exception("<b>Could not read data from the table </b>") ;
}

?>
<br>

<?php

$i=0;
?>

<h3>Featured Headlines</h3>
<?php

$i=0;
?>
<table class = 'table' border='0' cellspacing='2' cellpadding='2'>
<?php

while ($i < 30 && $data = $result->fetch_object()) {
$viralrank = $data->viralrank;
$storytitle = $data->storytitle;
$url = $data->url;
$remarks = $data->remarks;
$video = $data->video;
$image = $data->image;

if($i % 3 === 0) echo "\n<tr>";
?>

<td>

<a href ="<?php echo $url; ?>" target ='_blank'>
<div class = 'cp_img'>
<?php
if ($video) {
echo $video;
}
else
{
?>
<img src=<?php echo $image; ?>>
<?php
}
?>

</div>
</a><br>
<div class = "swarmcard-entry-title">
<a href ="<?php echo $url; ?>" target ='_blank'><?php echo $storytitle; ?>
</a></strong>
</div>

<table>
<tr>
<td>
<div class "swarmcard-entry-stats clearfix">
<strong><a href = "http://blog.swarmsports.com/faq/#ViralRank" title = "The ViralRank™ is a weighted score which shows how viral an article on SwarmSports is across the internet." target = "_blank"><font size = "-1">ViralRank</a>: </font>
<?php echo $viralrank; ?>
</strong>

<a href="#" onClick="MyWindow=window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/24x24-facebook.png"></a>

<a href="#" onClick="MyWindow=window.open('https://twitter.com/intent/tweet?text=<?php echo $storytitle; ?>&url=<?php echo $url; ?>&via=SwarmSports','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/24x24-twitter.png"></a>

<a href="#" onClick="MyWindow=window.open('http://reddit.com/submit?url=<?php echo $url; ?>&title=<?php echo $storytitle; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=1040,height=625'); return false;"><img src = './bootstrap/docs/assets/img/24x24-reddit.png'></a>

<a href="#" onClick="MyWindow=window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php echo $url; ?>&title=<?php echo $storytitle; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=500,height=500'); return false;"><img src = './bootstrap/docs/assets/img/24x24-googleplus.png'></a>

<strong>
<font size = "-2">
<?php echo $remarks; ?>
</font>
</strong>

</div>
</td>
</tr>

</table>
</td>
<?php
 if($i % 3 === 2) echo "</tr>"; 
   
   $i++;
   }
if($i % 3 > 0) echo "</tr>";

?>

</table>


<?php
if (!$result = $db->query("SELECT storytitle FROM rankswarm")) {
    throw new Exception("<b>Could not read data from the table </b>") ;
}
$nr = mysqli_num_rows($result); 

if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
} 

//This is where we set how many database items to show on each page
$itemsPerPage = 50;
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
} 
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage;
// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax
// $sql2 is what we will use to fuel our while loop statement below
if (!$result = $db->query("SELECT * FROM rankswarm order by viralrank desc $limit")) {
    throw new Exception("<b>Could not read data from the table </b>") ;
}

if (!$result2 = $db->query("SELECT * FROM rankswarm WHERE DATE_SUB( now( ) , INTERVAL 4 HOUR ) <= datetime order by viralrank desc $limit")) {
    throw new Exception("<b>Could not read data from the table </b>") ;
}

$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    // $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
   // if ($pn != 1) {
   //     $previous = $pn - 1;
   //     $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
   // }
    // Lay in the clickable numbers display here between the Back and Next links
    // $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '#more"> Load More Results</a> ';
    }
   
}

$paginationDisplay2 = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    // $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
   // if ($pn != 1) {
   //     $previous = $pn - 1;
   //     $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
   // }
    // Lay in the clickable numbers display here between the Back and Next links
    // $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button

    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay2 .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '#new"> Load More Results</a> ';
    }
}

?>
<div id = "more"></div>
<br><br><br>
<h3>More Headlines</h3>
<table width = "1200" border="0" cellspacing="2" cellpadding="2">
<tr>
<td width = "120"><strong><a href = "http://blog.swarmsports.com/faq/#ViralRank" title = "The ViralRank™ is a weighted score which shows how viral an article on SwarmSports is across the internet." target = "_blank">ViralRank</a></strong></td>
<td width = "600"><strong>Headlines</strong></td>
<td width = "240"><strong>Source</strong></td>
<td width = "240"><strong>Share</strong></td>
</tr>
<?php
$i=0;
while ($i < $itemsPerPage && $data = $result->fetch_object()) {
$viralrank = $data->viralrank;
$storytitle = $data->storytitle;
$url = $data->url;
$remarks = $data->remarks;
$datetime = $data->datetime;

?>
<tr>
<td width = "120">
<strong><?php echo $viralrank; ?></strong><br>
</td>
<td width = "600"><a href = "<?php echo $url; ?>"target ="_blank"><?php echo $storytitle; ?></a></td>
<td width = "240">
<?php echo $remarks; ?>
</td>
<td width = "240">
<a href="#" onClick="MyWindow=window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/24x24-facebook.png"></a>

<a href="#" onClick="MyWindow=window.open('https://twitter.com/intent/tweet?text=<?php echo $storytitle; ?>&url=<?php echo $url; ?>&via=SwarmSports','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/24x24-twitter.png"></a>

<a href="#" onClick="MyWindow=window.open('http://reddit.com/submit?url=<?php echo $url; ?>&title=<?php echo $storytitle; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=1040,height=625'); return false;"><img src = './bootstrap/docs/assets/img/24x24-reddit.png'></a>

<a href="#" onClick="MyWindow=window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php echo $url; ?>&title=<?php echo $storytitle; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=500,height=500'); return false;"><img src = './bootstrap/docs/assets/img/24x24-googleplus.png'></a>
</td>
</tr>
<?php
$i++;
}
?>
</table>
<div id = "new"></div>
<center>
<h3><?php echo $paginationDisplay; ?></h3>
</center>

<h3>New Headlines</h3>
<table width = "1200" border="0" cellspacing="2" cellpadding="2">
<tr>
<td width = "120"><strong><a href = "http://blog.swarmsports.com/faq/#ViralRank" title = "The ViralRank™ is a weighted score which shows how viral an article on SwarmSports is across the internet." target = "_blank">ViralRank</a></strong></td>
<td width = "600"><strong>Headlines</strong></td>
<td width = "240"><strong>Source</strong></td>
<td width = "240"><strong>Share</strong></td>
</tr>
<?php
$i=0;
while ($i < $itemsPerPage && $data = $result2->fetch_object()) {
$viralrank = $data->viralrank;
$storytitle = $data->storytitle;
$url = $data->url;
$remarks = $data->remarks;
$datetime = $data->datetime;

?>
<tr>
<td width = "120">
<strong><?php echo $viralrank; ?></strong><br>
</td>
<td width = "600"><a href = "<?php echo $url; ?>"target ="_blank"><?php echo $storytitle; ?></a></td>
<td width = "240">
<?php echo $remarks; ?>
</td>
<td width = "240">
<a href="#" onClick="MyWindow=window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/24x24-facebook.png"></a>

<a href="#" onClick="MyWindow=window.open('https://twitter.com/intent/tweet?text=<?php echo $storytitle; ?>&url=<?php echo $url; ?>&via=SwarmSports','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/24x24-twitter.png"></a>

<a href="#" onClick="MyWindow=window.open('http://reddit.com/submit?url=<?php echo $url; ?>&title=<?php echo $storytitle; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=1040,height=625'); return false;"><img src = './bootstrap/docs/assets/img/24x24-reddit.png'></a>

<a href="#" onClick="MyWindow=window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php echo $url; ?>&title=<?php echo $storytitle; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=500,height=500'); return false;"><img src = './bootstrap/docs/assets/img/24x24-googleplus.png'></a>
</td>
</tr>
<?php
$i++;
}
?>
</table>

<center>
<h3><?php echo $paginationDisplay2; ?></h3>
</center>