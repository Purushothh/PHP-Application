<?php
include ("db.php"); //include db.php file to connect to DB
$pagename="Make your home smart"; //create and populate variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");
echo "<h4>".$pagename."</h4>";
//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable 
//applied to the query string u_prod_id //store the value in a local variable called 
$prodid=$_GET['u_prod_id']; 
 
//display the value of the product id, for debugging purposes 
echo "<p>Selected product Id: ".$prodid; 

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select * from Product WHERE $prodid=prodId";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
echo "</a>";
echo "</td>";

echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p><h6>".$arrayp['prodDescripShort']."</h6>"; //display product name as contained in the array
echo "<p><h3><b>".$arrayp['prodPrice']."<b></h3>"; //display product name as contained in the array
echo "<p><h6><b>Number left in stock: ".$arrayp['prodQuantity']."<b></h6>";
echo "<p><h6><b>Number left in stock: ".$arrayp['prodQuantity']."<b></h6>";

echo "</td>";
echo "</tr>";
}
echo "</table>";
echo "<body>";


include("footfile.html"); //include head layout
echo  "</body>";