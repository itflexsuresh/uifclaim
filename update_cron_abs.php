<?php 
///
$conn = mysqli_connect('localhost','tecdocuser','q4NdAps**S','tecdoc');
$select1=mysqli_query($conn,"select * from `list_articles_supplier:abs`");
	$fetch1=mysqli_fetch_array($select1);
	if($fetch1=='')
	{
		echo "values empty";
	}
	else{


$clear=mysqli_query($conn,'TRUNCATE TABLE `list_articles_supplier:abs`');
}
$delete_summary=mysqli_query($conn,"DELETE FROM `list_summary_supplierstock` WHERE `warehouse`= 'abs'");
$query="select * from `auto_update` WHERE id=3";
$select=mysqli_query($conn,$query);
$fetchs=mysqli_fetch_array($select);
//print_r($fetch);exit;

if($fetchs['status']=='on')
{

$row = 1;
if (($handle = fopen('/home/abs/ftp/files/abs.csv','r')) !== FALSE) {
set_time_limit(0);
ini_set('memory_limit', '-1');
	
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";

        $row++;
        /*for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
}
        }*/
        
        
        $qry="INSERT INTO `list_articles_supplier:abs` (`ABS`, `group_abs`, `group_name`, `model`, `make`, `price`, `OE`, `BOSCH`, `MINTEX`, `FERODO`, `LEMFORDER`, `MOOG`, `DELPHI`, `SKF`, `NK`, `TRW`, `value17`) VALUES ('".mysqli_real_escape_string($conn,$data[0])."','".mysqli_real_escape_string($conn,$data[1])."','".mysqli_real_escape_string($conn,$data[2])."','".mysqli_real_escape_string($conn,$data[3])."','".mysqli_real_escape_string($conn,$data[4])."','".mysqli_real_escape_string($conn,$data[5])."','".mysqli_real_escape_string($conn,$data[6])."','".mysqli_real_escape_string($conn,$data[7])."','".mysqli_real_escape_string($conn,$data[8])."','".mysqli_real_escape_string($conn,$data[9])."','".mysqli_real_escape_string($conn,$data[10])."','".mysqli_real_escape_string($conn,$data[11])."','".mysqli_real_escape_string($conn,$data[12])."','".mysqli_real_escape_string($conn,$data[13])."','".mysqli_real_escape_string($conn,$data[14])."','".mysqli_real_escape_string($conn,$data[15])."','".mysqli_real_escape_string($conn,$data[16])."')";


	if($data[0]!='ABS' && $data[0]!='-')
        {



	$insert=mysqli_query($conn,$qry);
}
        

    if($insert)
		{
		
	// $string1 = $data[0];
	  $string1= preg_replace("/[^a-zA-Z0-9]+/","", $data[0]);
	  $select2=mysqli_query($conn,"SELECT * from `list_articles_abs_stockstatus` WHERE `articlenr`='$string1'");
	$fetch2=mysqli_fetch_array($select2);
	print_r($fetch2);
	
if($fetch2['status']=='Y')
{
	
	$string2= 100;
	$string3='abs';
	$string4=0;
    $string5=$data[5]*10;
    $date1=date('Y-m-d');
    $qry_summary="INSERT INTO `list_summary_supplierstock` (`articlenr`, `quantity`, `warehouse`, `price_nto_ex.vat`, `price_retail_ex.vat`, `last_update`) VALUES ('".mysqli_real_escape_string($conn,$string1)."','".mysqli_real_escape_string($conn,$string2)."','".mysqli_real_escape_string($conn,$string3)."','".mysqli_real_escape_string($conn,$string5)."','".mysqli_real_escape_string($conn,$string4)."','".mysqli_real_escape_string($conn,$date1)."')";
	
	$insert_summary=mysqli_query($conn,$qry_summary);
	if($insert_summary)
	{
		
   echo "insert in to sumary table";
	}
	else{
	echo mysqli_error($conn);
}

}
else{
	echo "no stock";
}

}
else{
	echo mysqli_error($conn);
        	
        }


}



    fclose($handle);

}
}
mysqli_close($conn);
