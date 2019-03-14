<html>
<head>
<title>PHP Update Program 1</title>
<script language="javascript">

function formvalidation(thisform)
 {
  with(thisform)
  {
   
   if(custcodeValidation(custcode)==false)
    {
    return false;
    }
   if(unitsValidation(units)==false)
    {
    return false;
    }
  }
 }



function custcodeValidation(custcode)
 {
  with(document.form1)
  {
   if(custcode.value=="")
    {
     alert("Customer Code is not entered");
     custcode.focus();
     return false;
    }  
   else
   if(!((custcode.value=='C') ||(custcode.value=='D')))
   {
     alert("Customer Code is either C or D");
     custcode.focus();
     return false;
   }
   else
      return true;
  }
 }

 function unitsValidation(units)
 {
  with(document.form1)
  {
   if(units.value=="")
    {
     alert("Units is Not Entered");
     units.focus();
     return false;
    }
    var unit=parseInt(units.value);
    if (isNaN(unit))
    {
     alert("Units Should be a Numeric Value");
     units.focus();
     return false;
     }
    else if (units.value<0)
     {
     alert("Units Should be a Positive Value");
     units.focus();
     return false;
     }
    else
     return true;
     }
     }
     
</script>
</head>
<body bgcolor="#FFCCFF">

 <form name="form1" method=POST action="edit1.php"
                onSubmit="return formvalidation(this)">
				<?php
				$custno=$_POST['custno'];
				
				$connection=mysqli_connect("localhost","root","")
				or die("couldn't connect the server");
				$db=mysqli_select_db($connection,"Customers")
				or die(mysqli_error($connection));
				
				$query="select * from payments where custno=$custno";
				
				if($result=mysqli_query($connection,$query))
				{
					if($row=mysqli_fetch_array($result))//if record found
					{
						echo "Customer Number: &nbsp;&nbsp;&nbsp;&nbsp; ",$row['Custno'],"<input type=hidden name=custno value=",$row['Custno'],"><p>";
						echo "Customer code: <input type=text name=custcode value=",$row['CustCode'],"><p>";
						echo "Units: <input type=text name=units value=",$row['Units'],"><p>";
						
						echo "<input type=submit value=Update>";
					}
					else
					{
						echo "<B>Customer Number is not exist";
					}
				}
				else
				echo "Fails<br>".mysqli_error($connection);
				mysqli_close($connection);
				?>
				
	<br>
	<a href=custdel.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href=custedit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href=custdel.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href=custview.html>View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </form>
</body>
</html>




                                                                   

