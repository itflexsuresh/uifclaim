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
  <title>PDF table</title>
</head>
<body>
<h2 style="text-align: center;width: 100%;  margin: 20px auto 20px; font-size: 29px; font-weight: 600;">PERMIT TO PERFORM ESSENTIAL SERVICE As defined in</h2>
<p style="text-align: center;width: 100%;  margin: 20px auto 40px; font-size: 17px; font-weight: 600;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
<table style="width: 100%;  margin: 0 auto; border-collapse: collapse;">
  <tbody>
    <tr>
      <td style=" font-size: 20px; font-weight: 600;">Detail of the head of the institution</td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">Sure Name</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $compsurname; ?></td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">Full Name</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $compfullname; ?></td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">Identiy Number</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $compid_no; ?></td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" rowspan="2">Contact deatils</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">Cell Nr:</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">Tel Nr(w)</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">Tel Nr(H)</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;">E-mail addres</td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 20px;"><?php echo $compmobile_no; ?></td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 20px;"><?php echo $compwork_no; ?></td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 20px;"></td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 20px;"><?php echo $compemail; ?></td>
    </tr>
  </tbody>
</table>

<table style="width: 100%;  margin: 0 auto; border-collapse: collapse; margin-top: 40px;">
  <thead>
    <tr>
      <td style=" font-size: 20px; font-weight: 600;">Table title</td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">teset</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;"></td>
    </tr>

    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">Institute of Plumbing of South Africa Membership no:</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;"><?php echo $compcompany_register_no; ?></td>
    </tr>
  </thead>
</table>

<table style="width: 100%;  margin: 0 auto; border-collapse: collapse; margin-top: 40px;">
  <thead>
    <tr>
      <td style=" font-size: 20px; font-weight: 600;">Hereby certify that</td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">Sure Name</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $surname; ?></td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">Full Name</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $name.' '.$surname; ?></td>
    </tr>
    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">Identiy Number</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $id_no; ?></td>
    </tr>

    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">**Plumbing Industry Registration Board Plumbers Registration Number:</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"><?php echo $register_no; ?></td>
    </tr>

    <tr style="border: 1px solid #000;">
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px; width: 50%;">Metro Plumber Registration Number:</td>
      <td style="border-right: 1px solid #000; border-collapse: collapse; padding: 10px;" colspan="4"></td>
    </tr>
  </thead>
</table>
<p style="text-align: left;width: 100%;  margin: 0px auto 20px; font-size: 17px; font-weight: 600;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

<table style="width: 100%;  margin: 0 auto 20px; border-collapse: collapse; margin-top: 40px;">
  <thead>
    <tr>
      <td style="width: 20%; text-align: center;">Signed at  -------------------------------------------</td>
      <td style="width: 20%; text-align: center;">On this the  ----------------------------------------</td>
      <td style="width: 20%; text-align: center;">day of  -------------------------------------------</td>
      <td style="width: 20%; text-align: left;">2020</td>
    </tr>
  </thead>
</table>

<p style="width: 100%;  margin: 50px auto 10px; border-collapse: collapse;"><span style="border-top: 1px solid #000;">Signature of Head of institution</span></p>

<table style="width: 100%;  margin: 20px auto 20px; border-collapse: collapse; margin-top: 40px;">
  <thead>
    <tr>
      <td colspan="3" style="width: 60%;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
      <td style="width: 13%;height: 240px; border: 1px solid #000; text-align: center;">Offcial Stamp of institution</td>
    </tr>
  </thead>
</table>

</body>
</html>