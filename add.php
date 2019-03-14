<HTML>
<HEAD>
<TITLE>Customer Addition Program PHP</TITLE>
</HEAD>
<BODY BGCOLOR="#ffccff">
<?php
   $cno=$_POST['custno'];
    $code=$_POST['custcode'];
   $unit=$_POST['units'];

   $connection=mysqli_connect("localhost","root","")
    or die("Couldnt connect the server");
   $db=mysqli_select_db($connection, "customers")
    or die("<b>Connection Fails");    

//starts the server validation
        $query="select * from payments where Custno='$cno'";
   if($result=mysqli_query($connection, $query))
    {
     if($row=mysqli_fetch_array($result))
      {
         echo "<b><i>Customer Number is already exist";
        }
       else
        {
     $totpay=0;
   if ($code=='C')
    {
    if($unit>75)
       $totpay=(($unit-75) * 25) + ((75-50) * 15) + ((50-25) * 10) + ((25-5) * 5);
       else if ($unit>50)
            $totpay=(($unit-50) * 15) + ((50-25) * 10) + ((25-5) * 5);
            else if ($unit >25)
                 $totpay=(($unit-25) * 10) + ((25-5) * 5);
                 else if ($unit>5)
                      $totpay=(($unit-5) * 5);
     }
     else if ($code=='D')
     {
       if ($unit>75)
       $totpay=(($unit-75) * 15) + ((75-50) * 9) + ((50-25) * 6) + ((25-10) * 3);
       else if ($unit>50)
            $totpay=(($unit-50) * 9) + ((50-25) * 6) + ((25-10) * 3);
            else if ($unit >25)
                 $totpay=(($unit-25) * 6) + ((25-10) * 3);
                 else if ($unit>10)
                      $totpay=(($unit-10) * 3);
     }

         $query="insert into payments(Custno,CustCode,Units,TotalPay)
         values('$cno','$code',$unit,$totpay)";
         if($result=mysqli_query($connection, $query))
          {
           echo "<b><i><center>Customer Payments Record Added in the Database</center>
								</i></b><p>";
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
          else
           echo mysqli_error($connection);
         }
        else
         echo mysqli_error($connection);
       }
      }
 mysqli_close($connection);
 ?>
 <center>
  <a href=add.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href=custedit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href=custdel.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href=custview.html>Inquiry</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </center>
</body>
</html>
