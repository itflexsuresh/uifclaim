<?php
// print_r($comp_result);die;

$empID 						= isset($result['id']) ? $result['id'] : '';
$name 						= isset($result['name']) ? $result['name'] : '';
$surname 					= isset($result['surname']) ? $result['surname'] : '';
$id_no 						= isset($result['id_no']) ? $result['id_no'] : '';
$passport_no 				= isset($result['passport_no']) ? $result['passport_no'] : '';
$register_no 				= isset($result['register_no']) ? $result['register_no'] : '';
$contact_no 				= isset($result['contact_no']) ? $result['contact_no'] : '';
$monthly_remuneration 		= isset($result['monthly_remuneration']) ? $result['monthly_remuneration'] : '';
$contact_no 				= isset($result['contact_no']) ? $result['contact_no'] : '';


$compID 					= isset($comp_result['id']) ? $comp_result['id'] : '';
$compfullname 				= isset($comp_result['name']) ? $comp_result['name'] : '';
$compsurname 				= isset($comp_result['surname']) ? $comp_result['surname'] : '';
$compemail 					= isset($comp_result['email']) ? $comp_result['email'] : '';
$compmobile_no 				= isset($comp_result['mobile_no']) ? $comp_result['mobile_no'] : '';
$compwork_no 				= isset($comp_result['work_no']) ? $comp_result['work_no'] : '';
$compcompany_name 			= isset($comp_result['company_name']) ? $comp_result['company_name'] : '';
$compcompany_register_no 	= isset($comp_result['company_register_no']) ? $comp_result['company_register_no'] : '';
$compid_no				 	= isset($comp_result['id_no']) ? $comp_result['id_no'] : '';

?>


<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

  /*tr:nth-child(even) {
    background-color: #dddddd;
  }*/
</style>
</head>
<body>

<h4>PERMIT TO PERFORM ESSENTIAL SERVICE As defined in</h4>

<p><h4>in terms of the Regulation 11B(3) and the regulations published by the Minister of Cooperative</h4></p>
<p><h4>Governance and Traditional Affairs, Ms Nkosazana Dlamini-Zuma in Regulation Gazette No.</h4></p>
<p><h4>11062</h4></p>

<p><h3>PERMIT TO PERFORM ESSENTIAL SERVICE</h3></p>




<table>
  
  <tr>
    <td>Surname</td>
    <td><?php echo $compsurname; ?></td>
    
  </tr>
  <tr>
    <td>Full names</td>
    <td><?php echo $compfullname; ?></td>
    
  </tr>
  <tr>
    <td>Id No</td>
    <td><?php echo $compid_no; ?></td>
    
  </tr>
  <tr>
    <td>Contact Details</td>
    <td><table>
                <tr>
                    <td >Cell nr</td>
                    <td >Tell nr</td>  
                    <td >E-mail address</td>                  
                </tr>
                <tr>
                    <td ><?php echo $compmobile_no; ?></td>
                    <td ><?php echo $compwork_no; ?></td>  
                    <td ><?php echo $compemail; ?></td>                  
                </tr>
                 
            </table></td>
    
  </tr>
  <tr>
    <td>* Institution of Plumbing of South Africa Membership</td>
    <td><?php echo $compcompany_register_no; ?></td>
    
  </tr> 
</table>

<p><h4>Hereby certify that:</h4></p>
<table>
  
  <tr>
    <td>Surname</td>
    <td><?php echo $surname; ?></td>
    
  </tr>
  <tr>
    <td>Full names</td>
    <td><?php echo $name.' '.$surname; ?></td>
    
  </tr>
  <tr>
    <td>Identity No</td>
    <td><?php echo $id_no; ?></td>    
  </tr>

  <tr>
    <td>* Institution of Plumbing of South Africa Membership</td>
    <td><?php echo $register_no; ?></td>
    
  </tr> 
    <tr>
    <td>Metro Plumber Number :</td>
    <td></td>
    
  </tr> 
</table>

</body>
</html>
