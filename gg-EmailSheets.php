<?php
// Client
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once('./gsheets/sheets.php');

   require __DIR__ . '/vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets with Primo');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');
//$mail->AddEmbeddedImage('./assets/growgroups.png', 'logo_gg');


$service = new Google_Service_Sheets($client);
$spreadsheetId = 'someID';


//Basic Information
 $fname = htmlspecialchars($_POST['fname']);
 $lname = htmlspecialchars($_POST['lname']);
 $email = htmlspecialchars($_POST['email']);
 $cell = htmlspecialchars($_POST['cell']);
 $interests = ' ';
 $sheetData = ' ';
 $interestHTML = ' ';
 $sheetsID ='1b8jfQGHQ7ZbBURljKxWB9AqpQBGPkUqWdbEG1h3w4nk';

$mail = new PHPMailer(true);
                
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'no-reply@1usda.org';                    
    $mail->Password   = 'tacoBell';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 900;    
    
    $mail->setFrom('no-reply@1usda.org', '1U Automation');

    $mail->addAddress('records@1usda.org');               
   
    // 1Body for All Messages
    $mail->isHTML(true);                                     
    $mail->Body    = "Name: $fname $lname <br>Cell: $cell <br>Email: $email";
    $mail->AltBody = "Name: $fname $lname\nCell: $cell\nEmail: $email";



	if (isset($_POST['growgroups'])) 
	{
		foreach($_POST['growgroups'] as $growgroups)
		{
			
			if ($growgroups === 'Fervent Foodies')
			{
				$mail->Subject = "Interested in Grow Group Fervent Foodies";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Fervent Foodies\n ";
				$sheetData .= 'FF  ';
				//$interestHTML .= '<p><span style=\'color:white; background-color:green; border: green red 3px; padding:5px 13px; border-radius:4px;\'>Fervent Foodies</span></p> ';
			} 
			if ($growgroups === 'The Conversation')
			{
				$mail->Subject = "Interested in Grow Group The Conversation";
				$mail->addAddress('randomEMAIL@gmail.com');
				$mail->send();
				$mail->clearAddresses();
				$interests .= "The Conversation\n ";
				$sheetData .= 'TC  ';
				$interestHTML .= ' ';
				
			}
			if ($growgroups === 'BibleStudy')
			{
				$mail->Subject = "Interested in Grow Group Wedensay Power Thru with Food, Faith, and Fellowship";
				$mail->addAddress('randomEMAIL@gmail.com');
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Wednesday Night Bible Study\n ";
				$sheetData .= 'BS  ';
				$interestHTML .= ' ';
			} 
			if ($growgroups === 'Its Not About Me')
			{
				$mail->Subject = "Interested in Grow Group It's Not About Me";
				$mail->addAddress('randomEMAIL@gmail.com');
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Its Not About Me\n ";
				$sheetData .= 'NBM  ';
				$interestHTML .= ' ';
			} 
			if ($growgroups === 'Young Couples Mentorship')
			{
				$mail->Subject = "Interested in Grow Group Young Couples Mentorship";
				$mail->addAddress('grandomEMAIL@gmail.com');
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Young Couples Mentorship\n ";
				$sheetData .= 'YCM  ';
				$interestHTML .= ' ';
			} 
			if ($growgroups === 'Whats Next')
			{
				$mail->Subject = "Interested in Grow Group Whats New";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Whats Next\n ";
				$sheetData .= 'WN  ';
				$interestHTML .= ' ';
			}  
			if ($growgroups === 'Kingdom Women')
			{
				$mail->Subject = "Interested in Grow Group Kingdom Women";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Kingdom Women\n ";
				$sheetData .= 'KW  ';
				$interestHTML .= ' ';
			} 
			if ($growgroups === 'Limping with God')
			{
				$mail->Subject = "Interested in Grow Group Limping with God";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Limping with God\n ";
				$sheetData .= 'LWG  ';
				$interestHTML .= ' ';
			} 
			if ($growgroups === 'Walk with Me')
			{
				$mail->Subject = "Interested in Grow Group Walk with Me";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Walk with Me\n ";
				$sheetData .= 'WWM  ';
				$interestHTML .= ' ';
			} 
			if ($growgroups === 'Blended and Blessed')
			{
				$mail->Subject = "Interested in Grow Group Blended and Blessed";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->send();
				$mail->clearAddresses();
				$interests .= "Blended and Blessed\n ";
				$sheetData .= 'BAB  ';
				$interestHTML .= ' ';
			} 
		}
				$mail->clearAddresses();
				$mail->Subject = "$fname Grow Group Interest";
				$mail->addAddress("randomEMAIL@gmail.com");
				$mail->Body    = "Name: $fname $lname <br>Cell: $cell <br>Email: $email<br>Interests: $interests";
    			$mail->AltBody = "Name: $fname $lname\nCell: $cell\nEmail: $email\nInterest: $interests";
				$mail->send();
				
				$mail->clearAddresses();
				$mail->Subject = "$fname Your Grow Group Confirmation";
				$mail->addAddress("$email");
				$mail->Body    = "<div style=\'margin: auto;display: block;  margin-left: auto;  margin-right: auto; width: 30%;\'><h1 style=\"color: green;\">What you have submitted</h1> <br><b>Name:</b> $fname $lname <br><b>Cell:</b> $cell <br><b>Email:</b> $email<br><b>Interests:</b> $interests<br><br>Thank You for your interest! Someone will contact you soon.</div>";
    			$mail->AltBody = "What you have submitted\nYour Name: $fname $lname\nCell: $cell\nEmail: $email\nInterest: $interests";
				$mail->send();				
				
			
				$range = "Submissions"; // Sheet name
                
                
                
                
                
                
                $values = [
                	[ $fname, $lname, $cell, $email, $sheetData],
                ];
                //echo "<pre>";print_r($values);echo "</pre>";exit;
                $body = new Google_Service_Sheets_ValueRange([
                	'values' => $values
                ]);
                $params = [
                	'valueInputOption' => 'RAW'
                ];
                
                $result = $service->spreadsheets_values->append(
                	$spreadsheetId,
                	$range,
                	$body,
                	$params
                );
                
	}   
header("Location: https://www.firstuniversitysda.org/thank-you");

                

?>
