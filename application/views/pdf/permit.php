<?php
// print_r($comp_result);die;

$empID            = isset($result['id']) ? $result['id'] : '';
$name             = isset($result['name']) ? $result['name'] : '';
$surname          = isset($result['surname']) ? $result['surname'] : '';
$id_no            = isset($result['id_no']) ? $result['id_no'] : '';
$passport_no        = isset($result['passport_no']) ? $result['passport_no'] : '';
$register_no        = isset($result['register_no']) ? $result['register_no'] : '';
$contact_no         = isset($result['contact_no']) ? $result['contact_no'] : '';
$monthly_remuneration     = isset($result['monthly_remuneration']) ? $result['monthly_remuneration'] : '';
$contact_no         = isset($result['contact_no']) ? $result['contact_no'] : '';


$compID           = isset($comp_result['id']) ? $comp_result['id'] : '';
$compfullname         = isset($comp_result['name']) ? $comp_result['name'] : '';
$compsurname        = isset($comp_result['surname']) ? $comp_result['surname'] : '';
$compemail          = isset($comp_result['email']) ? $comp_result['email'] : '';
$compmobile_no        = isset($comp_result['mobile_no']) ? $comp_result['mobile_no'] : '';
$compwork_no        = isset($comp_result['work_no']) ? $comp_result['work_no'] : '';
$compcompany_name       = isset($comp_result['company_name']) ? $comp_result['company_name'] : '';
$compcompany_register_no  = isset($comp_result['company_register_no']) ? $comp_result['company_register_no'] : '';
$compid_no          = isset($comp_result['id_no']) ? $comp_result['id_no'] : '';

?>


<!DOCTYPE html>
<html>
<head>
  <title>Permits Forms</title>
</head>
<body>

<table style="width:100%; border-collapse: collapse;">
  <tr>
    <td colspan="5" style="text-align: center; border: 0px solid #fff; padding-bottom: 30px; font-size: 24px; font-weight: 600;">PERMIT TO PERFORM ESSENTIAL SERVICE As defined in</td>
  </tr>
  <tr>
    <td colspan="5" style="font-size: 15px; font-weight: 600; padding-bottom: 30px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
  </tr>
  <tr>
    <td style="font-size: 16px; font-weight: 600; padding-bottom: 10px; text-align: left;">Table title</td>
  </tr>
 <tr>
   <td style="padding: 5px; border: 1px solid #000; border-collapse: collapse; width: 30%;">Sure Name</td>
   <td style="padding: 5px; border: 1px solid #000; border-collapse: collapse;" colspan="4"><?php echo $compsurname; ?></td>
 </tr>
 <tr>
   <td style="padding: 5px; border: 1px solid #000; border-collapse: collapse; width: 30%;">Full Name</td>
   <td style="padding: 5px; border: 1px solid #000; border-collapse: collapse;" colspan="4"><?php echo $compfullname; ?></td>
 </tr>
 <tr>
   <td style="padding: 5px; border: 1px solid #000; border-collapse: collapse; width: 30%;">Identiy Number</td>
   <td style="padding: 5px; border: 1px solid #000; border-collapse: collapse;" colspan="4"><?php echo $compid_no; ?></td>
 </tr>
 <tr>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;" rowspan="2">Contact deatils</td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; text-align: center;">Cell Nr:</td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; text-align: center;">Tel Nr(w)</td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; text-align: center;">Tel Nr(H)</td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; text-align: center;">E-mail addres</td>
</tr>
<tr >
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 10px; text-align: center;"><?php echo $compmobile_no; ?></td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 10px; text-align: center;"><?php echo $compwork_no; ?></td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 10px; text-align: center;"></td>
    <td style="border: 1px solid #000; border-collapse: collapse; padding: 10px; text-align: center;"><?php echo $compemail; ?></td>
</tr>

</table>

<table style="width:100%; border-collapse: collapse; padding-top: 50px;">
  <thead>
    <tr>
        <td style="font-size: 16px; font-weight: 600; padding-bottom: 10px; text-align: left;">Table title</td>
    </tr>
    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">teset</td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"></td>  
    </tr>

    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">Institute of Plumbing of South Africa Membership no: </td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"><?php echo $compcompany_register_no; ?></td>  
    </tr>
  </thead>
</table>

<table style="width:100%; border-collapse: collapse; padding-top: 50px;">
  <thead>
    <tr>
        <td style="font-size: 16px; font-weight: 600; padding-bottom: 10px; text-align: left;">Hereby certify that</td>
    </tr>
    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">Sure Name</td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"><?php echo $surname; ?></td>  
    </tr>

    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">Full Name</td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"><?php echo $name.' '.$surname; ?></td>  
    </tr>

    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">Identiy Number</td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"><?php echo $id_no; ?></td>  
    </tr>

    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">**Plumbing Industry Registration Board Plumbers Registration Number:</td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"><?php echo $register_no; ?></td>  
    </tr>

    <tr>
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px; width: 40%;">Metro Plumber Registration Number: </td>  
      <td style="border: 1px solid #000; border-collapse: collapse; padding: 5px;"></td>  
    </tr>
    <tr>
      <td colspan="2" style="font-size: 15px; font-weight: 600; padding-bottom: 30px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
    </tr>
  </thead>
</table>

<table style="width: 100%; border-collapse: collapse; padding-top: 30px;">
  <thead>
    <tr>
      <td style="width: 20%; text-align: center;">Signed at  --------------------</td>
      <td style="width: 20%; text-align: center;">On this the  -----------------</td>
      <td style="width: 20%; text-align: center;">day of  ---------------------</td>
      <td style="width: 20%; text-align: left;">2020</td>
    </tr>
  </thead>
</table>

<table style="width: 100%; border-collapse: collapse; padding-top: 50px;">
  <thead>
    <tr>
      <td style="width: 100%;  padding-top: 30px; border-collapse: collapse;"><span style="border-top: 1px solid #000;">Signature of Head of institution</span></td>
    </tr>
    <tr>
      <td style="width: 60%;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
      <td style="width: 30%;height: 240px; border: 1px solid #000; text-align: center;">Offcial Stamp of institution</td>
    </tr>
  </thead>
</table>

</body>
</html>