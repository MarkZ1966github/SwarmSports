<?php
if(!defined("SECURE"))
{
  //Someone is trying to access this page directly without going through the proper
  //channel, a classic hacker ploy, so trick the sneaky hacker into thinking
  //that the page doesn't exist.  This is a good combination of security and obscurity.
  header('HTTP/1.1 404 Not Found');
  echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
	echo "<html><head>\n<title>404 Not Found</title>\n</head><body>\n";
	echo "<h1>Not Found</h1>\n";
  echo "<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
	echo "</body></html>";
	exit;
}
?>	

<?php
//A script for displaying the stories and putting them into a table
include "logic/logic.initialize.php";  //Get access to the MySQL database.
include "logic/logic.viralrank.php"; //get access to viral score functions.

$query2="SELECT * FROM manualtable order by viralrank desc";
$result2=mysql_query($query2);

?>
     <strong>Top Stories Right Now:</strong>


<?php

$i=0;
?>
<table class = 'table' border='0' cellspacing='2' cellpadding='2'>
<?php
while($i < 9) {

$f1=mysql_result($result2,$i,"storytitle");
$f2=mysql_result($result2,$i,"remarks");
$f3=mysql_result($result2,$i,"url");
$f4=mysql_result($result2,$i,"image");
$f5=mysql_result($result2,$i,"viralrank");
$f6=mysql_result($result2,$i,"video");

if($i % 3 === 0) echo "\n<tr>";
?>
<td class = 'tdsize'>

<a href ="<?php echo $f3; ?>" target ='_blank'>
<div align = 'center'>
<div class = 'cp_img'>
<?php
if ($f6) {
echo $f6;
}
else
{
?>
<img src=<?php echo $f4; ?>>
<?php
}
?>
</div>
</div>
</a><br>
<font size = '-2'>
<a href ="<?php echo $f3; ?>" target ='_blank'><?php echo $f1; ?>
</a></strong></font>
<table>
<tr>
<td>
<font size = '-2'>
<strong>
<?php echo $f5; ?>
 | 
<?php echo $f2; ?>
</strong>
</font>
</td>
</tr>
<td>
<a href="#" onClick="MyWindow=window.open('https://twitter.com/intent/tweet?text=<?php echo $f1; ?>&url=<?php echo $f3; ?>&via=SwarmSports','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/twitter-35x28.jpg"></a>
</td>
</tr>
<tr>
<td>
<a href="#" onClick="MyWindow=window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo $f3; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=805,height=235'); return false;"><img src = "./bootstrap/docs/assets/img/facebook-35x28.jpg"></a>
</td>
</tr>
<tr>
<td>
<a href="#" onClick="MyWindow=window.open('http://digg.com/submit?phase=2&url=<?php echo $f3; ?>&title=<?php echo $f1; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=825,height=330'); return false;"><img src = './bootstrap/docs/assets/img/Digg - 35x28.jpg'></a>
</td>
</tr>
<tr>
<td>
<a href="#" onClick="MyWindow=window.open('http://reddit.com/submit?url=<?php echo $f3; ?>&title=<?php echo $f1; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=1040,height=625'); return false;"><img src = './bootstrap/docs/assets/img/Reddit - 35x28.jpg'></a>
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
$query="SELECT * FROM rankswarm order by viralrank desc";
$result=mysql_query($query);
$nr = mysql_numrows($result); 

if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
} 

//This is where we set how many database items to show on each page
$itemsPerPage = 100;
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
$query2="SELECT * FROM rankswarm order by viralrank desc $limit";
$result2=mysql_query($query2);

$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    }
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    }
}

?>
     <strong>More Stories:</strong><br><br>
<?php echo $paginationDisplay; ?>
<table width = "500" border="0" cellspacing="2" cellpadding="2">
<tr>
<td width = "50"><strong><a href = "http://blog.swarmsports.com/faq/#ViralRank" title = "The ViralRank™ is a weighted score which shows how viral an article on SwarmSports is across the internet." target = "_blank">ViralRank</a></strong></td>
<td width = "250"><strong>Articles</strong></td>
<td width = "100"><strong>Source</strong></td>
<td width = "100"><strong>Date</strong></td>
</tr>
<?php
$i=0;
while ($i < $itemsPerPage) {
$f1=mysql_result($result2,$i,"storytitle");
$f2=mysql_result($result2,$i,"remarks");
$f3=mysql_result($result2,$i,"url");
$f4=mysql_result($result2,$i,"datetime");
$f5=mysql_result($result2,$i,"viralrank");
?>
<tr>
<td width = "50">
<strong><?php echo $f5; ?></strong><br>
</td>
<td width = "250"><a href = "<?php echo $f3; ?>"target ="_blank"><?php echo $f1; ?></a></td>
<td width = "100">
<?php echo $f2; ?>
</td>
<td width = "100"><?php echo date("F j, Y, g:i a", strtotime($f4)) ; ?><br />
</tr>
<?php
$i++;
}
?>
</table>
<?php echo $paginationDisplay; ?>