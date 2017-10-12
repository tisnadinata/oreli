<?php

class DOKUOnecheckoutRequestModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    public function initContent()
    {
        parent::initContent();

        $dokuonecheckout = new dokuonecheckout();        
        $task		         = $_GET['task'];

        switch ($task)
        {
            case "redirect":                
						if ( empty($_POST) )
						{
								echo "Stop : Access Not Valid";
								die;
						}
						
						$trx = array();
						
						$trx['words']                = $_POST['WORDS'];
						$trx['amount']               = $_POST['AMOUNT'];
						$trx['transidmerchant']      = $_POST['TRANSIDMERCHANT']; 
						$trx['status_code']          = $_POST['STATUSCODE'];
						
						if ( isset($_POST['PAYMENTCODE']) ) $trx['payment_code'] = $_POST['PAYMENTCODE'];
					
						$config = $dokuonecheckout->getServerConfig();
            
						$words = sha1(trim($trx['amount']).
											trim($config['SHARED_KEY']).
											trim($trx['transidmerchant']).
											trim($trx['status_code']));	
						
						if ( $trx['words']==$words )
						{
					
								$use_edu  = $config['USE_EDU'];
								$order_id = $dokuonecheckout->get_order_id($trx['transidmerchant']);
								
								$trx['payment_channel']  = $_POST['PAYMENTCHANNEL'];
								$trx['session_id']       = $_POST['SESSIONID'];
								$trx['ip_address']       = $dokuonecheckout->getipaddress();
								$trx['process_datetime'] = date("Y-m-d H:i:s");
								$trx['process_type']     = 'REDIRECT';
								
								# Skip notify checking for VA / ATM / ALFA Payment
								if ( in_array($trx['payment_channel'], array("05","14")) && $trx['status_code'] == "5511" )
								{
										$trx['message'] = "Redirect process come from DOKU. Transaction is pending for payment";  
										$status         = "pending";																			
										$template       = "pending.tpl";
                    										
                    $dokuonecheckout->emptybag();
                    
										# Insert transaction redirect to table onecheckout
										$dokuonecheckout->add_dokuonecheckout($trx);
										
                    $this->context->smarty->assign(array(
                                                         'payment_channel' => 'ATM Transfer', # ATM Transfer / Alfa Payment
                                                         'payment_code'    => $trx['payment_code']
                                                         ));
                    $this->setTemplate($template);                    
								}
                else
                {
							
                    switch ($trx['status_code'])
                    {
                        case "0000":
                        $result_msg = "SUCCESS";
                        break;
                        
                        default:
                        $result_msg = "FAILED";
                        break;
                    }
                      
                    $result = $dokuonecheckout->checkTrx($trx, 'NOTIFY', $result_msg);
                    
                    if ( $result < 1 )
                    {
                        
                        $order_state  = 13;
                        $dokuonecheckout->validateOrder($trx['transidmerchant'], $order_state, $trx['amount'], "DOKUOnecheckout", $trx['transidmerchant']);
                                                
                        $check_result_msg = $dokuonecheckout->doku_check_status($trx);
    
                        if ( $check_result_msg == 'SUCCESS' )
                        {
                            if ( intval($use_edu) == 1 )
                            {					
                                $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Success, wait for EDU Verification. Please check on Back Office.";  
                                $status         = "on-hold";									
                                $return_message = "Thank you for shopping with us. We will process your payment soon.";
                                $template       = 'success.tpl';
                                $dokuonecheckout->emptybag();
                                $dokuonecheckout->set_order_status($order_id, 2);                                      
                                
                            }
                            else
                            {
                                $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.";  
                                $status         = "completed";				
                                $return_message = "Your payment is success. We will process your order. Thank you for shopping with us.";
                                $template       = 'success.tpl';
                                $dokuonecheckout->emptybag();
                                $dokuonecheckout->set_order_status($order_id, 2);                                      
                            }				
                        }
                        else
                        {
                            if ( $trx['status_code']=="0000" )
                            {
                                $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction got Success Status Code. Please check on Back Office."; 
                                $status         = "pending";				
                                $return_message = "Thank you for shopping with us. We will process your payment soon.";
                                $template       = 'success.tpl';
                                $dokuonecheckout->emptybag();
                                $dokuonecheckout->set_order_status($order_id, 2);
                            }
                            else
                            {
                                $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Failed. Please check on Back Office."; 
                                $status         = "failed";				
                                $return_message = "Your payment is failed. Please check your payment detail or please try again later.";
                                $template       = 'failed.tpl';
                                $dokuonecheckout->set_order_status($order_id, 6);                                      
                            }
                        }
                    }
                    else
                    {								
                        if ( $trx['status_code']=="0000" )
                        {
                            if ( intval($use_edu) == 1 )
                            {					
                                $trx['message'] = "Redirect process message come from DOKU. Transaction is Success, wait for EDU Verification";  
                                $status         = "on-hold";									
                                $return_message = "Thank you for shopping with us. We will process your payment soon.";
                                $template       = 'success.tpl';
                                $dokuonecheckout->emptybag();
                                $dokuonecheckout->set_order_status($order_id, 2); 
                            }
                            else
                            {
                                $trx['message'] = "Redirect process message come from DOKU. Transaction is Success";  
                                $status         = "completed";				
                                $return_message = "Your payment is success. We will process your order. Thank you for shopping with us.";
                                $template       = 'success.tpl';
                                $dokuonecheckout->emptybag();
                                $dokuonecheckout->set_order_status($order_id, 2); 
                            }
                        }
                        else
                        {
                            $trx['message'] = "Redirect process message come from DOKU. Transaction is Failed";  
                            $status         = "failed";				
                            $return_message = "Your payment is failed. Please check your payment detail or please try again later.";
                            $template       = 'failed.tpl';
                            $dokuonecheckout->set_order_status($order_id, 6);                                      
                        }														
                    }								
                                                          
                    # Insert transaction redirect to table onecheckout
                    $dokuonecheckout->add_dokuonecheckout($trx);                    
                    
                    switch( $trx['payment_channel'] )
                    {
                        case "01":
                            $payment_channel = "Credit Card";
                        break;

                        case "02":
                            $payment_channel = "Mandiri Clickpay";
                        break;

                        case "04":
                            $payment_channel = "Dokuwallet";
                        break;

                        case "05":
                            $payment_channel = "ATM Transfer";
                        break;

                        case "14":
                            $payment_channel = "DOKU Alfa";
                        break;                      
                    }
                    
                    $this->context->smarty->assign(array(
                                                        'payment_channel' => $payment_channel
                                                        ));
                    
                    $this->setTemplate($template);
								
                }
                
            }
            break;

            default:
                $dokuonecheckout->setTemplate('invalid.tpl');
            break;
        }
    }
}