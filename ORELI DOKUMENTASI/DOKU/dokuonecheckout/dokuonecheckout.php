<?php

/*
    Plugin Name : Prestashop DOKU Onecheckout Payment Gateway
    Plugin URI  : http://www.doku.com
    Description : DOKU Onecheckout Payment Gateway for Prestashop 1.5 and 1.6
    Version     : 1.1
    Author      : DOKU
    Author URI  : http://www.doku.com
*/


if (!defined('_PS_VERSION_'))
    exit;

class DOKUOnecheckout extends PaymentModule
{
    private $_html = '';
    private $_postErrors = array();

    public $server_dest;
    public $mall_id_dev;
    public $shared_key_dev;
		public $chain_dev;
		public $mall_id_prod;
		public $shared_key_prod;
		public $chain_prod;
		public $use_edu;
		public $use_identify;		
		public $doku_name;
		public $ip_range; 

    public function __construct()
    {
        $this->name     = 'dokuonecheckout';
        $this->tab      = 'payments_gateways';
        $this->version  = '1.1';
        $this->author   = 'dokuonecheckout';
				$this->ip_range = '103.10.129';
				
        $config = Configuration::getMultiple(array('SERVER_DEST', 'MALL_ID_DEV', 'SHARED_KEY_DEV', 'CHAIN_DEV', 'MALL_ID_PROD', 'SHARED_KEY_PROD', 'CHAIN_PROD', 'USE_EDU', 'USE_IDENTIFY'));

        if (isset($config['SERVER_DEST']))
            $this->server_dest     = $config['SERVER_DEST'];
        if (isset($config['MALL_ID_DEV']))
            $this->mall_id_dev     = $config['MALL_ID_DEV'];
        if (isset($config['SHARED_KEY_DEV']))
            $this->shared_key_dev  = $config['SHARED_KEY_DEV'];
        if (isset($config['CHAIN_DEV']))
            $this->chain_dev       = $config['CHAIN_DEV'];
        if (isset($config['MALL_ID_PROD']))
            $this->mall_id_prod    = $config['MALL_ID_PROD'];
        if (isset($config['MALL_ID_PROD']))
            $this->shared_key_prod = $config['MALL_ID_PROD'];
        if (isset($config['CHAIN_PROD']))
            $this->chain_prod      = $config['CHAIN_PROD'];
        if (isset($config['USE_EDU']))
            $this->use_edu         = $config['USE_EDU'];
        if (isset($config['USE_IDENTIFY']))
            $this->use_identify    = $config['USE_IDENTIFY'];
        if (isset($config['DOKU_NAME']))
            $this->doku_name       = $config['DOKU_NAME'];
						
        parent::__construct();

        $this->displayName      = $this->l('DOKU Onecheckout');
        $this->description      = $this->l('DOKU is an online payment that can process many kind of payment method, include Credit Card, ATM Transfer, Internet Banking and DOKU Wallet..');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        
				if ( isset($this->server_dest) )
				{
						if ( $this->server_dest == 0 )
						{
								if ( !isset($this->mall_id_dev) || !isset($this->shared_key_dev) || !isset($this->chain_dev) )
								$this->warning = $this->l('Mall ID, Shared Key and Chain must be configured in order to use this module correctly.');
						}
						else
						{
								if ( !isset($this->mall_id_prod) || !isset($this->shared_key_prod) || !isset($this->chain_prod) )
								$this->warning = $this->l('Mall ID, Shared Key and Chain must be configured in order to use this module correctly.');
						}
				}
				else
				{
						$this->warning = $this->l('Please set Server Destination in order to use this module correctly.');
				}
    }

    public function install()
    {
        parent::install();
        $this->createdokuonecheckoutTable();
        $this->registerHook('Payment');
        $this->registerHook('PaymentReturn');
    }

    public function uninstall()
    {
        Configuration::deleteByName('SERVER_DEST');		
        Configuration::deleteByName('MALL_ID_DEV');
        Configuration::deleteByName('SHARED_KEY_DEV');
        Configuration::deleteByName('CHAIN_DEV');				
        Configuration::deleteByName('MALL_ID_PROD');
        Configuration::deleteByName('SHARED_KEY_PROD');
        Configuration::deleteByName('CHAIN_PROD');
        Configuration::deleteByName('USE_EDU');						
        Configuration::deleteByName('USE_IDENTIFY');										
				Configuration::deleteByName('DOKU_NAME');										
        parent::uninstall();
        Db::getInstance()->Execute("DROP TABLE `"._DB_PREFIX_."dokuonecheckout`");
        parent::uninstall();
    }

    function createdokuonecheckoutTable()
    {
        $db = Db::getInstance();
        $query = "
				CREATE TABLE "._DB_PREFIX_."dokuonecheckout (
					trx_id int( 11 ) NOT NULL AUTO_INCREMENT,
					ip_address VARCHAR( 16 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					process_type VARCHAR( 15 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					process_datetime DATETIME NULL, 
					doku_payment_datetime DATETIME NULL,   
					transidmerchant VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					amount DECIMAL( 20,2 ) NOT NULL DEFAULT '0',
					notify_type VARCHAR( 1 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					response_code VARCHAR( 4 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					status_code VARCHAR( 4 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					result_msg VARCHAR( 20 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					reversal INT( 1 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT 0,
					approval_code CHAR( 20 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					payment_channel VARCHAR( 2 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					payment_code VARCHAR( 20 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					bank_issuer VARCHAR( 100 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					creditcard VARCHAR( 16 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					words VARCHAR( 200 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',  
					session_id VARCHAR( 48 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					verify_id VARCHAR( 30 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					verify_score INT( 3 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT 0,
					verify_status VARCHAR( 10 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
					check_status INT( 1 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT 0,
					count_check_status INT( 1 ) COLLATE utf8_unicode_ci NOT NULL DEFAULT 0,
					message TEXT COLLATE utf8_unicode_ci,  
					PRIMARY KEY (trx_id)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1										
				";

        $db->Execute($query);
    }
                                
    private function _postValidation()
    {
        // configuration
        if (Tools::isSubmit('btnSubmit'))
        {
						if ( intval(Tools::getValue('server_dest')) == 0 )
						{
								if (!Tools::getValue('mall_id_dev'))
										$this->_postErrors[] = $this->l('Mall ID is required.');
								elseif (!Tools::getValue('shared_key_dev'))
										$this->_postErrors[] = $this->l('Sharedkey is required.');
								elseif (!Tools::getValue('chain_dev'))
										$this->_postErrors[] = $this->l('Chain is required.');
						}
						else
						{
								if (!Tools::getValue('mall_id_prod'))
										$this->_postErrors[] = $this->l('Mall ID is required.');
								elseif (!Tools::getValue('shared_key_prod'))
										$this->_postErrors[] = $this->l('Sharedkey is required.');
								elseif (!Tools::getValue('chain_prod'))
										$this->_postErrors[] = $this->l('Chain is required.');								
						}
        }
    }

    private function _postProcess()
    {
        if (Tools::isSubmit('btnSubmit'))
        {
            Configuration::updateValue('SERVER_DEST',     trim(Tools::getValue('server_dest')));
            Configuration::updateValue('MALL_ID_DEV',     trim(Tools::getValue('mall_id_dev')));
            Configuration::updateValue('SHARED_KEY_DEV',  trim(Tools::getValue('shared_key_dev')));
						Configuration::updateValue('CHAIN_DEV',       trim(Tools::getValue('chain_dev')));
            Configuration::updateValue('MALL_ID_PROD',    trim(Tools::getValue('mall_id_prod')));
            Configuration::updateValue('SHARED_KEY_PROD', trim(Tools::getValue('shared_key_prod')));
						Configuration::updateValue('CHAIN_PROD',      trim(Tools::getValue('chain_prod')));						
						Configuration::updateValue('USE_EDU',         trim(Tools::getValue('use_edu')));						
						Configuration::updateValue('USE_IDENTIFY',    trim(Tools::getValue('use_identify')));						
						Configuration::updateValue('DOKU_NAME',       trim(Tools::getValue('doku_name')));						
        }
        $this->_html .= '<div class="conf confirm"> '.$this->l('Settings updated').'</div>';
    }

    private function _displayForm()
    {
			
				// URL                             
				$myserverpath = explode ( "/", $_SERVER['PHP_SELF'] );
				if ( $myserverpath[1] <> 'admin' ) 
				{
						$serverpath = '/' . $myserverpath[1];    
				}
				else
				{
						$serverpath = '';
				}
				
				if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
				{
						$myserverprotocol = "https";
				}
				else
				{
						$myserverprotocol = "http";    
				}
				
				$myservername = $_SERVER['SERVER_NAME'] . $serverpath;
				
				$chain_dev        = "NA";
				$chain_dev_set    = Tools::safeOutput(Tools::getValue('CHAIN_DEV', Configuration::get('CHAIN_DEV')));				
				if ( empty($chain_dev_set) ) $chain_dev_set = $chain_dev;

				$chain_prod       = "NA";
				$chain_prod_set   = Tools::safeOutput(Tools::getValue('CHAIN_PROD', Configuration::get('CHAIN_PROD')));				
				if ( empty($chain_prod_set) ) $chain_prod_set = $chain_prod;
				
				$name             = "DOKU Payment Gateway";
				$name_set         = Tools::safeOutput(Tools::getValue('DOKU_NAME', Configuration::get('DOKU_NAME')));
				if ( empty($name_set) ) $name_set = $name;

				$use_edu          = "checked";
				$use_edu_set      = Tools::safeOutput(Tools::getValue('USE_EDU', Configuration::get('USE_EDU')));
				if ( empty($use_edu_set) || intval($use_edu_set) == 0 ) $use_edu = "";
				
				$use_identify     = "checked";
				$use_identify_set = Tools::safeOutput(Tools::getValue('USE_IDENTIFY', Configuration::get('USE_IDENTIFY')));
				if ( empty($use_identify_set) || intval($use_identify_set) == 0 ) $use_identify = "";
				
				$server_dest = Tools::safeOutput(Tools::getValue('SERVER_DEST', Configuration::get('SERVER_DEST')));
				
				if ( empty($server_dest) || intval($server_dest) == 0 )
				{
						$select_option = '<option value="0" selected>Development</option>
															<option value="1">Production</option>';
				}
				else
				{
						$select_option = '<option value="0">Development</option>
															<option value="1" selected>Production</option>';				
				}
				
        // form configuration
        $this->_html .=
        '<form name="dokuonecheckout_config" id="dokuonecheckout_config" action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" onsubmit="return FormValidation()" method="post">
             <fieldset>
                <legend><img src="../img/admin/contact.gif" />'.$this->l('Configuration details').'</legend>
                <table border="0" width="1000" cellpadding="2" cellspacing="2" id="form">
										<tr>
												<td colspan="4"><h2>'.$this->l('DOKU Onecheckout Module Configuration').'</h2></td>
										</tr>
                    <tr>
                        <td width="200">'.$this->l('* Server Destination').'</td>
												<td width="3">:</td>
                        <td>
														<select name="server_dest">
														'.$select_option.'
														</select>                            
                        </td>
                        <td>* Choose Server Destination</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('* Mall ID Development').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="mall_id_dev" value="'.Tools::safeOutput(Tools::getValue('MALL_ID_DEV', Configuration::get('MALL_ID_DEV'))).'" />
                        </td>
                        <td>* Input your Development Mall ID.</td>
                    </tr>										
                    <tr>
                        <td>'.$this->l('* Shared Key Development').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="shared_key_dev" value="'.Tools::safeOutput(Tools::getValue('SHARED_KEY_DEV', Configuration::get('SHARED_KEY_DEV'))).'" />
                        </td>
                        <td>* Input your Development Shared Key.</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('* Chain Development').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="chain_dev" value="'.$chain_dev_set.'" />
                        </td>
                        <td>* Input your Development Chain.</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('* Mall ID Production').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="mall_id_prod" value="'.Tools::safeOutput(Tools::getValue('MALL_ID_PROD', Configuration::get('MALL_ID_PROD'))).'" />
                        </td>
                        <td>* Input your Production Mall ID.</td>
                    </tr>										
                    <tr>
                        <td>'.$this->l('* Shared Key Production').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="shared_key_prod" value="'.Tools::safeOutput(Tools::getValue('SHARED_KEY_PROD', Configuration::get('SHARED_KEY_PROD'))).'" />
                        </td>
                        <td>* Input your Production Shared Key.</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('* Chain Production').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="chain_prod" value="'.$chain_prod_set.'" />
                        </td>
                        <td>* Input your Production Chain.</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('Use EDU').'</td>
												<td>:</td>
                        <td>
												    <input type="checkbox" name="use_edu" value="1" '.$use_edu.'>
                        </td>
                        <td>Are you using DOKU EDU Services? Unchecked if you unsure.</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('Use Identify').'</td>
												<td>:</td>
                        <td>
                            <input type="checkbox" name="use_identify" value="1" '.$use_identify.'>
                        </td>
                        <td>Are you using Identify? Unchecked if you unsure.</td>
                    </tr>
                    <tr>
                        <td>'.$this->l('DOKU Onecheckout Name').'</td>
												<td>:</td>
                        <td>
                            <input type="text" name="doku_name" size="40" value="'.$name_set.'" />
                        </td>
                        <td>* Payment name to be displayed when checkout.</td>
                    </tr>
                    <tr>
												<td colspan="4"><input class="button" name="btnSubmit" value="'.$this->l('Update settings').'" type="submit" /></td>
										</tr>
                    <tr>
                        <td style="vertical-align: top;"></td>
                        <td colspan ="3" style="padding-bottom:15px;"></td>
                    </tr>
                    <tr>
                        <td><strong>'.$this->l('IDENTIFY URL').'</strong></td>
                        <td colspan ="3">'.$myserverprotocol . '://' . $myservername.'/modules/dokuonecheckout/request.php?task=identify</td>
                    </tr>
                    <tr>
                        <td><strong>'.$this->l('NOTIFY URL').'</strong></td>
                        <td colspan ="3">'.$myserverprotocol . '://' . $myservername.'/modules/dokuonecheckout/request.php?task=notify</td>
                    </tr>
                    <tr>
                        <td><strong>'.$this->l('REDIRECT URL').'</strong></td>
                        <td colspan ="3">'.$myserverprotocol . '://' . $myservername.'/index.php?fc=module&module=dokuonecheckout&controller=request&task=redirect</td>
                    </tr>
                    <tr>
                        <td><strong>'.$this->l('REVIEW URL').'</strong></td>
                        <td colspan ="3">'.$myserverprotocol . '://' . $myservername.'/modules/dokuonecheckout/request.php?task=review</td>
                    </tr>
                </table>
            </fieldset>
        </form>';
    }

    public function getContent()
    {
        $this->_html = '<h2>'.$this->displayName.'</h2>';

        if (Tools::isSubmit('btnSubmit'))
        {
            $this->_postValidation();
            if (!sizeof($this->_postErrors))
						{
                $this->_postProcess();
						}
            else
						{
                foreach ($this->_postErrors as $err)
								{
                    $this->_html .= '<div class="alert error">'. $err .'</div>';
								}
						}
        }
        else
				{
            $this->_html .= '<br />';
				}

        $this->_displayForm();

        return $this->_html;
    }

    public function execPayment($cart)
    {
        if (!$this->active)
            return;

        $basket='';
        global $cookie,$smarty;

        $dokuonecheckout = new dokuonecheckout();
        $cart            = new Cart(intval($cookie->id_cart));
        $address         = new Address(intval($cart->id_address_invoice));
        $country         = new Country(intval($address->id_country));
        $state           = NULL;
        if ($address->id_state)
            $state       = new State(intval($address->id_state));
        $customer        = new Customer(intval($cart->id_customer));
        $currency_order  = new Currency(intval($cart->id_currency));
        $products        = $cart->getProducts();        
        $summarydetail   = $cart->getSummaryDetails();
               
        $i = 0;
        $basket = '';
        
        foreach($products as $product)
        {
            
            $price_wt = number_format($product['price_wt'],2,'.','');
            $total_wt = number_format($product['total_wt'],2,'.','');

            $basket .= $product['name'] . ',' ;
            $basket .= $price_wt . ',' ;
            $basket .= $product['cart_quantity'] . ',';
            $basket .= $total_wt .';' ;
            
        }
		        
				# Discount
        if ( $summarydetail['total_discounts'] > 0)
				{ 
						$nDiskon =    number_format($summarydetail['total_discounts'],2,'.','');
						$nMinus  = -1 * $nDiskon ;
           
						$basket .= 'Total Discount ,';
            $basket .=  $nMinus . ',';
            $basket .=  '1,';
            $basket .=  $nMinus . ';';
        }
        
				# Shipping
				if ( $summarydetail['total_shipping'] > 0)
				{ 
						$basket .= 'Shipping Cost ,';
						$basket .=  number_format($summarydetail['total_shipping'],2,'.','') . ',';
						$basket .=  '1,';
						$basket .=  number_format($summarydetail['total_shipping'],2,'.','') . ';';
				}
		
				# REMARK TAX FROM BASKET, SEEM ALREADY INCLUDE ON PRODUCT PRICE	
				# Tax
				/*
				if ( $summarydetail['total_tax'] > 0)
				{ 
						$basket .= 'Total Tax ,';
						$basket .=  number_format($summarydetail['total_tax'],2,'.','') . ',';
						$basket .=  '1,';
						$basket .=  number_format($summarydetail['total_tax'],2,'.','') . ';';
				}
				*/

				# Gift Wrapping		
				if ( $summarydetail['total_wrapping'] > 0)
				{ 
						$basket .= 'Gift Wrapping ,';
						$basket .=  number_format($summarydetail['total_wrapping'],2,'.','') . ',';
						$basket .=  '1,';
						$basket .=  number_format($summarydetail['total_wrapping'],2,'.','') . ';';
				}

				$basket = preg_replace("/([^a-zA-Z0-9.\-,=:;&% ]+)/", " ", $basket);
				
        $total = number_format(floatval(number_format($cart->getOrderTotal(true, 3), 2, '.', '')),2,'.','');
		
				# REMARK TAX FROM BASKET, SEEM ALREADY INCLUDE ON PRODUCT PRICE
				/*
				if ( $summarydetail['total_tax'] > 0)
				{ 
					$total = number_format($total + $summarydetail['total_tax'], 2, '.','');
				}
				*/								
				
        $order       = new Order($dokuonecheckout->currentOrder);
				$server_dest = Tools::safeOutput(Configuration::get('SERVER_DEST'));
				
				if ( empty($server_dest) || intval($server_dest) == 0 )
				{
						$MALL_ID     = Tools::safeOutput(Configuration::get('MALL_ID_DEV'));
						$SHARED_KEY  = Tools::safeOutput(Configuration::get('SHARED_KEY_DEV'));
						$CHAIN       = Tools::safeOutput(Configuration::get('CHAIN_DEV'));
						$URL				 = "http://luna2.nsiapay.com/Suite/Receive";
				}
				else
				{
						$MALL_ID     = Tools::safeOutput(Configuration::get('MALL_ID_PROD'));
						$SHARED_KEY  = Tools::safeOutput(Configuration::get('SHARED_KEY_PROD'));
						$CHAIN       = Tools::safeOutput(Configuration::get('CHAIN_PROD'));
						$URL				 = "https://pay.doku.com/Suite/Receive";
				}
				
				# Set Redirect Parameter
				$CURRENCY            = 360;
				$TRANSIDMERCHANT     = intval($cart->id);
				$NAME                = Tools::safeOutput($address->firstname . ' ' . $address->lastname);
				$EMAIL               = $customer->email;
				$ADDRESS             = Tools::safeOutput($address->address1 . ' ' . $address->address2);
				$CITY                = Tools::safeOutput($address->city);
				$ZIPCODE             = Tools::safeOutput($address->postcode);
				$STATE               = Tools::safeOutput($state->name);
				$REQUEST_DATETIME    = date("YmdHis");
				$IP_ADDRESS          = $this->getipaddress();
				$PROCESS_DATETIME    = date("Y-m-d H:i:s");
				$PROCESS_TYPE        = "REQUEST";
				$AMOUNT              = $total;
				$PHONE               = trim($address->phone_mobile);
				$PAYMENT_CHANNEL     = "";
				$SESSION_ID          = "";
				$WORDS               = sha1(trim($AMOUNT).
																		trim($MALL_ID).
																		trim($SHARED_KEY).
																		trim($TRANSIDMERCHANT));							
				
        $smarty->assign(
						array(
								'this_path'        => $this->_path,
								'this_path_ssl'    => Configuration::get('PS_FO_PROTOCOL').$_SERVER['HTTP_HOST'].__PS_BASE_URI__."modules/{$this->name}/",
								'payment_name'     => Configuration::get('DOKU_NAME'),
								'URL'							 => $URL,
								'MALLID'           => $MALL_ID,
								'CHAINMERCHANT'    => $CHAIN,
								'AMOUNT'           => $AMOUNT,
								'PURCHASEAMOUNT'   => $AMOUNT,
								'TRANSIDMERCHANT'  => $TRANSIDMERCHANT,
								'WORDS'            => $WORDS,
								'REQUESTDATETIME'  => $REQUEST_DATETIME,
								'CURRENCY'         => $CURRENCY,
								'PURCHASECURRENCY' => $CURRENCY,
								'SESSIONID'        => $WORDS,
								'PAYMENTCHANNEL'   => $PAYMENT_CHANNEL,
								'NAME'             => $NAME,
								'EMAIL'            => $EMAIL,
								'HOMEPHONE'        => $PHONE,
								'MOBILEPHONE'      => $PHONE,
								'BASKET'           => $basket,
								'ADDRESS'          => $ADDRESS,
								'CITY'             => $CITY,
								'STATE'            => $STATE,
								'ZIPCODE'          => $ZIPCODE
						)
			);

			$trx['ip_address']          = $IP_ADDRESS;
			$trx['process_type']        = $PROCESS_TYPE;
			$trx['process_datetime']    = $PROCESS_DATETIME;
			$trx['transidmerchant']     = $TRANSIDMERCHANT;
			$trx['amount']              = $AMOUNT;
			$trx['session_id']          = $WORDS;
			$trx['words']               = $WORDS;
			$trx['message']             = "Transaction request start";
						
			$this->add_dokuonecheckout($trx);
			
    }

    function hookPayment($params)
    {
        if (!$this->active)
            return;

				$cart = new Cart(intval($cookie->id_cart));
				
				$this->execPayment($cart);		
						
        return $this->display(__FILE__, 'views/templates/hook/payment.tpl');
    }
	
		function getServerConfig()
		{
				$server_dest = Tools::safeOutput(Configuration::get('SERVER_DEST'));
				
				if ( empty($server_dest) || intval($server_dest) == 0 )
				{
						$MALL_ID    = Tools::safeOutput(Configuration::get('MALL_ID_DEV'));
						$SHARED_KEY = Tools::safeOutput(Configuration::get('SHARED_KEY_DEV'));
						$CHAIN      = Tools::safeOutput(Configuration::get('CHAIN_DEV'));				
						$URL_CHECK  = "http://luna2.nsiapay.com/Suite/CheckStatus";						
				}
				else
				{
						$MALL_ID    = Tools::safeOutput(Configuration::get('MALL_ID_PROD'));
						$SHARED_KEY = Tools::safeOutput(Configuration::get('SHARED_KEY_PROD'));
						$CHAIN      = Tools::safeOutput(Configuration::get('CHAIN_PROD'));						
						$URL_CHECK  = "https://pay.doku.com/Suite/CheckStatus";						
				}
						
				$USE_EDU      = Tools::safeOutput(Configuration::get('USE_EDU'));
				$USE_IDENTIFY = Tools::safeOutput(Configuration::get('USE_IDENTIFY'));
						
				$config = array( "MALL_ID"      => $MALL_ID, 
												 "SHARED_KEY"   => $SHARED_KEY,
												 "CHAIN"        => $CHAIN,
												 "USE_EDU"      => $USE_EDU,
												 "USE_IDENTIFY" => $USE_IDENTIFY,
												 "URL_CHECK"    => $URL_CHECK );   
							
				return $config;
		}

    function getipaddress()    
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

		function checkTrx($trx, $process='REQUEST', $result_msg='')
		{
				$db = Db::getInstance();
				
				$db_prefix = _DB_PREFIX_;
				
				if ( $result_msg == "PENDING" ) return 0;
				
				$check_result_msg = "";
				if ( !empty($result_msg) )
				{
					$check_result_msg = " AND result_msg = '$result_msg'";
				}
							
				$db->Execute("SELECT * FROM ".$db_prefix."dokuonecheckout" .
										 " WHERE process_type = '$process'" .
										 $check_result_msg.
										 " AND transidmerchant = '" . $trx['transidmerchant'] . "'" .
										 " AND amount = '". $trx['amount'] . "'".
										 " AND session_id = '". $trx['session_id'] . "'" );        
	
				return $db->numRows();
		}		

    function add_dokuonecheckout($datainsert) 
    {
				$db = Db::getInstance();
				
				$db_prefix = _DB_PREFIX_;
				
        $SQL = "";
        
        foreach ( $datainsert as $field_name=>$field_data )
        {
            $SQL .= " $field_name = '$field_data',";
        }
        $SQL = substr( $SQL, 0, -1 );

        $db->Execute("INSERT INTO " . $db_prefix . "dokuonecheckout SET $SQL");
    }

		function getCheckStatusList($trx='')
		{
				$db = Db::getInstance();
				
				$db_prefix = _DB_PREFIX_;
			
				$query = "";
				if ( !empty($trx) )
				{
						$query  = " AND transidmerchant = '".$trx['transidmerchant']."'";
						$query .= " AND amount = '". $trx['amount'] . "'";
						$query .= " AND session_id = '". $trx['session_id'] . "'";
				}
				else
				{
						$query  = " AND check_status = 0";
				}
				
				$resultQuery = $db->executeS(	"SELECT * FROM ".$db_prefix."dokuonecheckout" .
																			" WHERE process_type = 'REQUEST'" .
																			$query.
																			" AND count_check_status < 3" .
																			" ORDER BY trx_id DESC LIMIT 1" );
				$result = $resultQuery[0];
				
				if ( empty($result) )
				{
						return 0;
				}
				else
				{
						return $result;
				}
		}			

		function updateCountCheckStatusTrx($trx)
		{
				$db = Db::getInstance();
				
				$db_prefix = _DB_PREFIX_;
				
				$db->Execute("UPDATE ".$db_prefix."dokuonecheckout" .
										 " SET count_check_status = count_check_status + 1,".
										 " check_status = 0".
										 " WHERE process_type = 'REQUEST'" .
										 " AND transidmerchant = '" . $trx['transidmerchant'] . "'" .
										 " AND amount = '". $trx['amount'] . "'".
										 " AND session_id = '". $trx['session_id'] . "'" );        
		}			
		
		function doku_check_status($transaction)
		{
				$config = $this->getServerConfig();
				$result = $this->getCheckStatusList($transaction);
				
				if ( $result == 0 )
				{
						return "FAILED";
				}

				$trx     = $result;
				
				$words   = sha1( 	trim($config['MALL_ID']).
													trim($config['SHARED_KEY']).
													trim($trx['transidmerchant']) );
														
				$data = "MALLID=".$config['MALL_ID']."&CHAINMERCHANT=".$config['CHAIN']."&TRANSIDMERCHANT=".$trx['transidmerchant']."&SESSIONID=".$trx['session_id']."&PAYMENTCHANNEL=&WORDS=".$words;
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $config['URL_CHECK']);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);        
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);
				$curl_errno = curl_errno($ch);
				$curl_error = curl_error($ch);
				curl_close($ch);        
				
				if ($curl_errno > 0)
				{
						#return "Stop : Connection Error";
				}             
				
				libxml_use_internal_errors(true);
				$xml = simplexml_load_string($output);
				
				if ( !$xml )
				{
						$this->updateCountCheckStatusTrx($transaction);
				}                
				else
				{
						$trx = array();
						$trx['ip_address']            = $this->getipaddress();
						$trx['process_type']          = "CHECKSTATUS";
						$trx['process_datetime']      = date("Y-m-d H:i:s");
						$trx['transidmerchant']       = (string) $xml->TRANSIDMERCHANT;
						$trx['amount']                = (string) $xml->AMOUNT;
						$trx['notify_type']           = (string) $xml->STATUSTYPE;
						$trx['response_code']         = (string) $xml->RESPONSECODE;
						$trx['result_msg']            = (string) $xml->RESULTMSG;
						$trx['approval_code']         = (string) $xml->APPROVALCODE;
						$trx['payment_channel']       = (string) $xml->PAYMENTCHANNEL;
						$trx['payment_code']          = (string) $xml->PAYMENTCODE;
						$trx['words']                 = (string) $xml->WORDS;
						$trx['session_id']            = (string) $xml->SESSIONID;
						$trx['bank_issuer']           = (string) $xml->BANK;
						$trx['creditcard']            = (string) $xml->MCN;
						$trx['verify_id']             = (string) $xml->VERIFYID;
						$trx['verify_score']          = (int) $xml->VERIFYSCORE;
						$trx['verify_status']         = (string) $xml->VERIFYSTATUS;            
						
						# Insert transaction check status to table onecheckout
						$this->add_dokuonecheckout($trx);
						
						return $xml->RESULTMSG;
				}		
		}		
		
		function emptybag()
		{	
				$products = $this->context->cart->getProducts();
				foreach ($products as $product) {
						$this->context->cart->deleteProduct($product["id_product"]);
				}
		}
	
    function get_order_id($cart_id) 
    {
				$db = Db::getInstance();
				
				$db_prefix = _DB_PREFIX_;				
				$SQL       = "SELECT id_order FROM " . $db_prefix . "orders WHERE id_cart = $cart_id";
				
				return $db->getValue($SQL);
		}
	 
    function set_order_status($order_id, $state) 
    {
				$db = Db::getInstance();
				
				$db_prefix = _DB_PREFIX_;				
				$date_now  = date("Y-m-d H:i:s"); 
				
        $db->Execute("UPDATE " . $db_prefix . "orders SET current_state = $state WHERE id_order = $order_id");
				$db->Execute("UPDATE " . $db_prefix . "order_history SET id_order_state = $state, date_add = '$date_now' WHERE id_order = $order_id");
    }	 
	 
}

?>