<?php

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/dokuonecheckout.php');

$dokuonecheckout = new DOKUOnecheckout();

$task		  = $_GET['task'];
								
switch ($task)
{
	 case "identify":
			
	 $config = $dokuonecheckout->getServerConfig();
	 $use_identify = $config['USE_IDENTIFY'];
					 
	 if ( intval($use_identify) == 1 )
	 {						
			 if ( empty($_POST) )
			 {
					 echo "Stop : Access Not Valid";
					 die;
			 }
											
			 if (substr($dokuonecheckout->getipaddress(),0,strlen($dokuonecheckout->ip_range)) !== $dokuonecheckout->ip_range)
			 {
					 echo "Stop : IP Not Allowed : ".$dokuonecheckout->getipaddress();
			 }
			 else
			 {	    
					 $trx = array();														

					 $trx['amount']           = $_POST['AMOUNT'];
					 $trx['transidmerchant']  = $_POST['TRANSIDMERCHANT']; 
					 $trx['payment_channel']  = $_POST['PAYMENTCHANNEL'];
					 $trx['session_id']       = $_POST['SESSIONID'];
					 $trx['process_datetime'] = date("Y-m-d H:i:s");
					 $trx['process_type']     = 'IDENTIFY';
					 $trx['ip_address']       = $dokuonecheckout->getipaddress();
					 $trx['message']          = "Identify process message come from DOKU";

					 
					 # Insert transaction identify to table onecheckout
					 $dokuonecheckout->add_dokuonecheckout($trx);								
			 }
	 }
	 
	 break;

	 case "notify":
			
	 if ( empty($_POST) )
	 {
			echo "Stop : Access Not Valid";
			die;
	 }
										
	 if (substr($dokuonecheckout->getipaddress(),0,strlen($dokuonecheckout->ip_range)) !== $dokuonecheckout->ip_range)
	 {
			 echo "Stop : IP Not Allowed : ".$dokuonecheckout->getipaddress();
	 }
	 else
	 {
			 $trx = array();
			 
			 $trx['words']                     = $_POST['WORDS'];
			 $trx['amount']                    = $_POST['AMOUNT'];
			 $trx['transidmerchant']           = $_POST['TRANSIDMERCHANT'];
			 $trx['result_msg']                = $_POST['RESULTMSG'];            
			 $trx['verify_status']             = $_POST['VERIFYSTATUS'];        
			 
			 $config = $dokuonecheckout->getServerConfig();
			 
			 $words = sha1(trim($trx['amount']).
										 trim($config['MALL_ID']).
										 trim($config['SHARED_KEY']).
										 trim($trx['transidmerchant']).
										 trim($trx['result_msg']).
										 trim($trx['verify_status']));
			 
			 if ( $trx['words']==$words )
			 {            
					 $trx['ip_address']            = $dokuonecheckout->getipaddress();
					 $trx['response_code']         = $_POST['RESPONSECODE'];
					 $trx['approval_code']         = $_POST['APPROVALCODE'];
					 $trx['payment_channel']       = $_POST['PAYMENTCHANNEL'];
					 $trx['payment_code']          = $_POST['PAYMENTCODE'];
					 $trx['session_id']            = $_POST['SESSIONID'];
					 $trx['bank_issuer']           = $_POST['BANK'];
					 $trx['creditcard']            = $_POST['MCN'];                   
					 $trx['doku_payment_datetime'] = $_POST['PAYMENTDATETIME'];
					 $trx['process_datetime']      = date("Y-m-d H:i:s");
					 $trx['verify_id']             = $_POST['VERIFYID'];
					 $trx['verify_score']          = (int) $_POST['VERIFYSCORE'];
					 $trx['notify_type']           = $_POST['STATUSTYPE'];								

					 switch ( $trx['notify_type'] )
					 {
							 case "P":
							 $trx['process_type'] = 'NOTIFY';
							 break;
					 
							 case "V":
							 $trx['process_type'] = 'REVERSAL';
							 break;
					 }
					 
					 $result = $dokuonecheckout->checkTrx($trx);

					 if ( $result < 1 )
					 {
							 echo "Stop : Transaction Not Found";
							 die;            
					 }
					 else
					 {
						
							 $order_state  = 13;
						   $dokuonecheckout->validateOrder($trx['transidmerchant'], $order_state, $trx['amount'], "DOKUOnecheckout", $trx['transidmerchant']);
							 
							 $use_edu  = $config['USE_EDU'];
							 $order_id = $dokuonecheckout->get_order_id($trx['transidmerchant']);
							 
							 switch (TRUE)
							 {
									 case ( $trx['result_msg']=="SUCCESS" && $trx['notify_type']=="P" && in_array($trx['payment_channel'], array("05","14")) ):
									 $trx['message'] = "Notify process message come from DOKU. Success : completed";
									 $status         = "completed";
									 $status_no      = 2;
									 $dokuonecheckout->emptybag();
									 break;

									 case ( $trx['result_msg']=="SUCCESS" && $trx['notify_type']=="P" && intval($use_edu) == 1 ):
									 $trx['message'] = "Notify process message come from DOKU. Success but using EDU : pending";
									 $status         = "on-hold";
									 break;
									 
									 case ( $trx['result_msg']=="SUCCESS" && $trx['notify_type']=="P" && empty($use_edu) ):
									 $trx['message'] = "Notify process message come from DOKU. Success : completed";
									 $status         = "completed";
									 $status_no      = 2;
									 $dokuonecheckout->emptybag();
									 break;
									 
									 case ( $trx['result_msg']=="FAILED" && $trx['notify_type']=="P" ):
									 $trx['message'] = "Notify process message come from DOKU. Transaction failed : canceled";
									 $status         = "failed";
									 $status_no      = 6;
									 break;
									 
									 case ( $trx['notify_type']=="V" ):
									 $trx['message'] = "Notify process message come from DOKU. Void by EDU : canceled";
									 $status         = "failed";
									 $status_no      = 6;
									 break; 
									 
									 default:
									 $trx['message'] = "Notify process message come from DOKU, use default rule : canceled";
									 $status         = "failed";
									 $status_no      = 6;
									 break;
							 }
	 
							 $dokuonecheckout->set_order_status($order_id, $status_no);                                      
	 
							 # Insert transaction notify to table onecheckout
							 $dokuonecheckout->add_dokuonecheckout($trx);
							 
							 echo "Continue";
					 }
			 }
			 else
			 {
					 echo "Stop : Request Not Valid";
					 die;
			 }
	 }
	 
	 break;

	 case "review":
			
	 if ( empty($_POST) )
	 {
			echo "Stop : Access Not Valid";
			die;
	 }
										
	 if (substr($dokuonecheckout->getipaddress(),0,strlen($dokuonecheckout->ip_range)) !== $dokuonecheckout->ip_range)
	 {
			 echo "Stop : IP Not Allowed : ".$dokuonecheckout->getipaddress();
	 }
	 else
	 {
			 $config = $dokuonecheckout->getServerConfig();
			 
			 $use_edu = $config['USE_EDU'];
			 if ( empty($use_edu) )
			 {
					 echo "Stop : Access Not Authenticate";
					 die;
			 }								
			 
			 $trx = array();
			 
			 $trx['words']                     = $_POST['WORDS'];
			 $trx['amount']                    = $_POST['AMOUNT'];
			 $trx['transidmerchant']           = $_POST['TRANSIDMERCHANT'];
			 $trx['result_msg']                = $_POST['RESULTMSG'];            
			 $trx['verify_status']             = $_POST['VERIFYSTATUS'];        																
			 
			 $words = sha1(trim($trx['amount']).
										 trim($config['MALL_ID']).
										 trim($config['SHARED_KEY']).
										 trim($trx['transidmerchant']).
										 trim($trx['result_msg']).
										 trim($trx['verify_status']));
			 
			 if ( $trx['words']==$words )
			 {            
					 $trx['ip_address']            = $dokuonecheckout->getipaddress();
					 $trx['response_code']         = $_POST['RESPONSECODE'];
					 $trx['approval_code']         = $_POST['APPROVALCODE'];
					 $trx['payment_channel']       = $_POST['PAYMENTCHANNEL'];
					 $trx['payment_code']          = $_POST['PAYMENTCODE'];
					 $trx['session_id']            = $_POST['SESSIONID'];
					 $trx['bank_issuer']           = $_POST['BANK'];
					 $trx['creditcard']            = $_POST['MCN'];                   
					 $trx['doku_payment_datetime'] = $_POST['PAYMENTDATETIME'];
					 $trx['process_datetime']      = date("Y-m-d H:i:s");
					 $trx['verify_id']             = $_POST['VERIFYID'];
					 $trx['verify_score']          = (int) $_POST['VERIFYSCORE'];
					 $trx['notify_type']           = $_POST['STATUSTYPE'];
					 $trx['process_type'] 					= 'REVIEW';
					 
					 $result = $dokuonecheckout->checkTrx($trx);

					 if ( $result < 1 )
					 {
							 echo "Stop : Transaction Not Found";
							 die;            
					 }
					 else
					 {
							 $order_id = $dokuonecheckout->get_order_id($trx['transidmerchant']);
							 
							 switch (TRUE)
							 {
									 case ( $trx['verify_status']=="APPROVE" ):
									 $trx['message'] = "EDU Review process message come from DOKU. DOKU Payment and Verification Success : ".$trx['verify_status'];  
									 $status         = "completed";
									 $status_no      = 2;
									 $dokuonecheckout->emptybag();
									 break;

									 case ( $trx['verify_status']=="REVIEW" ):
									 $trx['message'] = "EDU Review process message come from DOKU. DOKU Payment Success with no history card data : ".$trx['verify_status'];  
									 $status         = "completed";
									 $status_no      = 2;
									 $dokuonecheckout->emptybag();
									 break;

									 case ( $trx['verify_status']=="REJECT" || $trx['verify_status']=="HIGHRISK" || $trx['verify_status']=="NA" ):
									 $trx['message'] = "EDU Review process message come from DOKU. DOKU Verification result is bad : ".$trx['verify_status'];  
									 $status         = "failed";
									 $status_no      = 6;
									 break;

									 default:
									 $trx['message'] = "EDU Review process message come from DOKU. DOKU Verification result is bad : ". $trx['verify_status'];  
									 $status         = "failed";
									 $status_no      = 6;
									 break;														
							 }
	 
							 $dokuonecheckout->set_order_status($order_id, $status_no);                                      
							 
							 # Insert transaction notify to table onecheckout
							 $dokuonecheckout->add_dokuonecheckout($trx);
							 
							 echo "Continue";
					 }
			 }
			 else
			 {
					 echo "Stop : Request Not Valid";
					 die;
			 }
	 }
			 
	 break;	 
	 
	 default:
	 echo "Stop : Access Not Valid";
	 die;			
	 break;
}        

?>