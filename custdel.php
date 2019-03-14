<HTML>
<HEAD>
<TITLE>Customer Addition Program PHP</TITLE>
</HEAD>
<BODY BGCOLOR="#ffccff">
<?php
   $cno=$_POST['custno'];
   

   $connection=mysqli_connect("localhost","root","")
    or die("Couldnt connect the server");
   $db=mysqli_select_db($connection, "customers")
    or die("<b>Connection Fails");    

//starts the server validation
        $query="select * from payments where Custno='$cno'";
   if($result=mysqli_query($connection, $query))
    {
     if($row=mysqli_fetch_array($result)) //if record found
      {
         $query="delete from payments where custno=$cno";
		 if($result=mysqli_query($connection,$query))
		 {
			 echo "<b><center>Record deleted from teh database</center></b<p>";
		 
           $query="select* from payments";
           if($result=mysqli_query($connection, $query))
            {
             echo "<table border=1 align=center>";
             echo "<tr>";
             echo "<th>Number<th>Code<th>Units<th>Payment Amount";
             echo "</tr>";
             while($row=mysqli_fetch_array($result))
              {
               echo "<tr>";
               echo "<th>", $row['Custno'],"</th>";
               echo "<th>", $row['CustCode'],"</th>";
               echo "<th>", $row['Units'],"</th>";
               echo "<th>", $row['TotalPay'],"</th>";
               echo "</tr>";
              }
            echo "</table>";
           }
		 }
	  }
	  else
	  {
		  echo "<b>Customer Number is not exist";
	  }
	}
	else
		echo"Fails".mysqli_error($connection);
	mysqli_close($connection);
	?>
	<br>
 <center>
  <a href=add.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href=custedit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href=custdel.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href=custview.html>Inquiry</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </center>
</body>
</html>
