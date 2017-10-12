<?php echo $header; ?>

<?php

    function get_payment_list($channel_list, $channel)
    {
        if ( isset($channel_list) )
        {
            if ( in_array($channel, $channel_list) )
            {
                $result = "checked";
            }
            else
            {
                $result = "";
            }
        }
        else
        {
            $result = "";
        }
        
        return $result;
    }

    function get_payment_name($channel_list, $channel, $default)
    {
        if ( isset($channel_list) )
        {
            if ( is_array($channel_list) && array_key_exists($channel, $channel_list) )
            {
                $result = $channel_list[$channel];
            }
            else
            {
                $result = $default;
            }
        }
        else
        {
            $result = $default;
        }
        
        return $result;
    }
    
?>

<div id="content">

<div class="breadcrumb">
<?php 
    foreach ($breadcrumbs as $breadcrumb) 
    {
        echo $breadcrumb['separator']; 
?>
        <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
<?php 
    } 
?>
</div>

<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>

<div class="box">
    <div class="heading">
        <h1><img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?></h1>
        <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    
    <div class="content">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      
        <div class="dashboard-heading"><?php echo $server_params; ?></div>
        <div class="dashboard-content">
        <table class="form">

						<tr><td colspan="3"><strong>Plugin Status</strong></td></tr>
						
						<tr>
							<td><?php echo $entry_status; ?></td>
							<td><select name="doku_onecheckout_status">
									<?php if ($doku_onecheckout_status) { ?>
									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
									<option value="0"><?php echo $text_disabled; ?></option>
									<?php } else { ?>
									<option value="1"><?php echo $text_enabled; ?></option>
									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
									<?php } ?>
								</select>
							</td>
							<td align="left"><span class="breadcrumb">Disable or Enable DOKU Onecheckout Plugin</span></td>
						</tr>
						
						<tr><td colspan="3"><strong>Choose Server Destination</strong></td></tr>
				
            <tr>
                <td><span class="required">*</span> <?php echo $entry_server_set; ?></td>
                <td width="200">
                <input type="radio" name="doku_onecheckout_server_set" value="0" <?php echo ( $doku_onecheckout_server_set==0 || $doku_onecheckout_server_set=='' ? "checked" : "" ) ?>>Development
                <input type="radio" name="doku_onecheckout_server_set" value="1" <?php echo ( $doku_onecheckout_server_set==1 ? "checked" : "" ) ?>>Production
                </td>
                <td align="left"><span class="breadcrumb"> * Choose DOKU server destination</span></td>
            </tr>
          
            <tr><td colspan="3"><strong>Production Server</strong></td></tr>
            
            <tr>
                <td><span class="required">*</span> <?php echo $entry_mallid_prod; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_mallid_prod" placeholder="Input your Mall ID here" value="<?php echo ( $doku_onecheckout_mallid_prod=='' ? "99999999" : $doku_onecheckout_mallid_prod ) ?>" />
                <?php if ($error_mallid_prod) { ?>
                <span class="error"><?php echo $error_mallid_prod; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Production Mall ID given by DOKU</span></td>
            </tr>

            <tr>
                <td><span class="required">*</span> <?php echo $entry_sharedkey_prod; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_sharedkey_prod" placeholder="Input your Sharedkey here" value="<?php echo ( $doku_onecheckout_sharedkey_prod=='' ? "99999999" : $doku_onecheckout_sharedkey_prod ) ?>" />
                <?php if ($error_sharedkey_prod) { ?>
                <span class="error"><?php echo $error_sharedkey_prod; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Production Sharedkey given by DOKU</span></td>
            </tr>

            <tr>
                <td><span class="required">*</span> <?php echo $entry_chain_prod; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_chain_prod" placeholder="Input your Chain Number here" value="<?php echo ( $doku_onecheckout_chain_prod=='' ? "NA" : $doku_onecheckout_chain_prod ) ?>" />
                <?php if ($error_chain_prod) { ?>
                <span class="error"><?php echo $error_chain_prod; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Production Chain Number given by DOKU. Default is NA.</span></td>
            </tr>
                        
            <tr><td colspan="3"><strong>Development Server</strong></td></tr>
            
            <tr>
                <td><span class="required">*</span> <?php echo $entry_mallid_dev; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_mallid_dev" placeholder="Input your Mall ID here" value="<?php echo ( $doku_onecheckout_mallid_dev=='' ? "99999999" : $doku_onecheckout_mallid_dev ) ?>" />
                <?php if ($error_mallid_dev) { ?>
                <span class="error"><?php echo $error_mallid_dev; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Development Mall ID given by DOKU</span></td>
            </tr>

            <tr>
                <td><span class="required">*</span> <?php echo $entry_sharedkey_dev; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_sharedkey_dev" placeholder="Input your Sharedkey here" value="<?php echo ( $doku_onecheckout_sharedkey_dev=='' ? "99999999" : $doku_onecheckout_sharedkey_dev ) ?>" />
                <?php if ($error_sharedkey_dev) { ?>
                <span class="error"><?php echo $error_sharedkey_dev; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Development Sharedkey given by DOKU</span></td>
            </tr>

            <tr>
                <td><span class="required">*</span> <?php echo $entry_chain_dev; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_chain_dev" placeholder="Input your Chain Number here" value="<?php echo ( $doku_onecheckout_chain_dev=='' ? "NA" : $doku_onecheckout_chain_dev ) ?>" />
                <?php if ($error_chain_dev) { ?>
                <span class="error"><?php echo $error_chain_dev; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Development Chain Number given by DOKU. Default is NA.</span></td>
            </tr>
          
        </table>
        </div>
        
        <br>
        
        <div class="dashboard-heading"><?php echo $opencart_params; ?></div>
        <div class="dashboard-content">
        <table class="form">

						<tr>
							<td><?php echo $entry_review_edu; ?></td>
							<td width="200"><input type="checkbox" name="doku_onecheckout_review_edu" value="1" <?php echo ( $doku_onecheckout_review_edu==1 ? "checked" : "" ) ?> /></td>
							<td align="left"><span class="breadcrumb">Are you using DOKU EDU Services? Unchecked if you unsure.</span></td>
						</tr>

						<tr>
							<td><?php echo $entry_identify; ?></td>
							<td width="200"><input type="checkbox" name="doku_onecheckout_identify" value="1" <?php echo ( $doku_onecheckout_identify==1 ? "checked" : "" ) ?> /></td>
							<td align="left"><span class="breadcrumb">Are you using Identify process? Unchecked if you unsure.</span></td>
						</tr>
            
						<!--
            <tr>
                <td><span class="required">*</span> <?php echo $entry_expired_time; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_expired_time" placeholder="Input your expired status time here" value="<?php echo ( $doku_onecheckout_expired_time=='' ? "60" : $doku_onecheckout_expired_time ) ?>" />
                <?php if ($error_expired_time) { ?>
                <span class="error"><?php echo $error_expired_time; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your expired time before check status trigger in seconds. 99999 means no check, default and minimal is 60 seconds.</span></td>
            </tr>
    
            <tr>
                <td><span class="required">*</span> <?php echo $entry_check_key; ?></td>
                <td><input size="30" type="text" name="doku_onecheckout_check_key" placeholder="Input your expired status time here" value="<?php echo ( $doku_onecheckout_check_key=='' ? "asdf1234ASDF!@#$" : $doku_onecheckout_check_key ) ?>" />
                <?php if ($error_check_key) { ?>
                <span class="error"><?php echo $error_check_key; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input your Check Status security key so only request with valid key will be excuted</span></td>
            </tr>

						<tr>
								<td><span class="required">*</span> <?php echo $entry_minimal_amount; ?></td>
								<td><input size="30" type="text" name="doku_onecheckout_minimal_amount" placeholder="Minimal amount to process" value="<?php echo ( $doku_onecheckout_minimal_amount=='' ? "10000" : $doku_onecheckout_minimal_amount ) ?>" />
								<?php if ($error_minimal_amount) { ?>
								<span class="error"><?php echo $error_minimal_amount; ?></span>
								<?php } ?>                
								</td>
								<td align="left"><span class="breadcrumb"> * Minimal amount to be processed. Default Rp 10,000.00, 999999999999 means no limit.</span></td>
						</tr>						
						-->
          
						<!-- Make order status default -->
						<input type="hidden" name="doku_onecheckout_order_status_id" value=2>

						<tr>
							<td><?php echo $entry_geo_zone; ?></td>
							<td><select name="doku_onecheckout_geo_zone_id">
									<option value="0"><?php echo $text_all_zones; ?></option>
									<?php foreach ($geo_zones as $geo_zone) { ?>
									<?php if ($geo_zone['geo_zone_id'] == $doku_onecheckout_geo_zone_id) { ?>
									<option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
									<?php } else { ?>
									<option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
									<?php } ?>
									<?php } ?>
								</select>
							</td>
							<td align="left"><span class="breadcrumb">Choose your default Geo Zone</span></td>
						</tr>
											
						<tr>
								<td><?php echo $entry_sort_order; ?></td>
								<td><input size="30" type="text" name="doku_onecheckout_sort_order" placeholder="Input your expired time for transaction here" value="<?php echo ( $doku_onecheckout_sort_order=='' ? "1" : $doku_onecheckout_sort_order ) ?>" /></td>
								<td align="left"><span class="breadcrumb"> Sort Order on Payment Method</span></td>
						</tr>
            
        </table>
    </div>

       <br>

        <div class="dashboard-heading"><?php echo $paymentchannel_params; ?></div>
        <div class="dashboard-content">
        <table class="form">
            
            <tr>
                <td><span class="required">*</span> <?php echo $entry_doku_name; ?></td>
                <td colspan="2"><input size="30" type="text" name="doku_onecheckout_doku_name" placeholder="Input DOKU name to display" value="<?php echo ( $doku_onecheckout_doku_name=='' ? "DOKU Payment Gateway" : $doku_onecheckout_doku_name ) ?>" />
                <?php if ($error_doku_name) { ?>
                <span class="error"><?php echo $error_doku_name; ?></span>
                <?php } ?>
                </td>
                <td align="left"><span class="breadcrumb"> * Input DOKU name to be displayed on Payment Method selection</span></td>
            </tr>
            
            <tr>
                <td><span class="required">*</span> <?php echo $paymentchannel_selection; ?></td>
                <td colspan="2">
                <input type="radio" name="doku_onecheckout_payment_select" value="0" <?php echo ( $doku_onecheckout_payment_select==0 || $doku_onecheckout_payment_select=='' ? "checked" : "" ) ?>>All
                <input type="radio" name="doku_onecheckout_payment_select" value="1" <?php echo ( $doku_onecheckout_payment_select==1 ? "checked" : "" ) ?>>Selected
                </td>
                <td align="left"><span class="breadcrumb"> * Choose Payment Channel to display</span></td>
            </tr>

          <tr>
            <td colspan="4">If using 'Selected' payment channel, please choose payment channel to display</td>  
          </tr>
          
          <tr>
            <td><?php echo $paymentchannel_cc; ?></td>
            <td><input type="checkbox" name="doku_onecheckout_payment_list[1]" value="01" <?php echo get_payment_list($doku_onecheckout_payment_list, "01") ?> /></td>
            <td width="100"><input size="30" type="text" name="doku_onecheckout_payment_name[1]" placeholder="Payment Method name to display" value="<?php echo get_payment_name($doku_onecheckout_payment_name, "1", "VISA / Master Credit Card") ?>" />
            <?php if ($error_payment_name) { ?>
            <span class="error"><?php echo $error_payment_name; ?></span>
            <?php } ?>                
            </td>
            <td align="left"><span class="breadcrumb">Credit Card</span></td>
          </tr>

          <tr>
            <td><?php echo $paymentchannel_clickpay; ?></td>
            <td><input type="checkbox" name="doku_onecheckout_payment_list[2]" value="02" <?php echo get_payment_list($doku_onecheckout_payment_list, "02") ?> /></td>
            <td><input size="30" type="text" name="doku_onecheckout_payment_name[2]" placeholder="Payment Method name to display" value="<?php echo get_payment_name($doku_onecheckout_payment_name, "2", "Mandiri Clickpay") ?>" />
            <?php if ($error_payment_name) { ?>
            <span class="error"><?php echo $error_payment_name; ?></span>
            <?php } ?>                
            </td>    
            <td align="left"><span class="breadcrumb">Mandiri Clickpay</span></td>
          </tr>

          <tr>
            <td><?php echo $paymentchannel_dokuwalet; ?></td>
            <td><input type="checkbox" name="doku_onecheckout_payment_list[4]" value="04" <?php echo get_payment_list($doku_onecheckout_payment_list, "04") ?> /></td>
            <td><input size="30" type="text" name="doku_onecheckout_payment_name[4]" placeholder="Payment Method name to display" value="<?php echo get_payment_name($doku_onecheckout_payment_name, "4", "Dokuwallet") ?>" />
            <?php if ($error_payment_name) { ?>
            <span class="error"><?php echo $error_payment_name; ?></span>
            <?php } ?>                
            </td>
            <td align="left"><span class="breadcrumb">Dokuwallet</span></td>
          </tr>

          <tr>
            <td><?php echo $paymentchannel_permatavalite; ?></td>
            <td><input type="checkbox" name="doku_onecheckout_payment_list[5]" value="05" <?php echo get_payment_list($doku_onecheckout_payment_list, "05") ?> /></td>
            <td><input size="30" type="text" name="doku_onecheckout_payment_name[5]" placeholder="Payment Method name to display" value="<?php echo get_payment_name($doku_onecheckout_payment_name, "5", "Permata VA") ?>" />
            <?php if ($error_payment_name) { ?>
            <span class="error"><?php echo $error_payment_name; ?></span>
            <?php } ?>                
            </td>
            <td align="left"><span class="breadcrumb">Permata VA</span></td>
          </tr>

          <tr>
            <td><?php echo $paymentchannel_epaybri; ?></td>
            <td><input type="checkbox" name="doku_onecheckout_payment_list[6]" value="06" <?php echo get_payment_list($doku_onecheckout_payment_list, "06") ?> /></td>
            <td><input size="30" type="text" name="doku_onecheckout_payment_name[6]" placeholder="Payment Method name to display" value="<?php echo get_payment_name($doku_onecheckout_payment_name, "6", "ePay BRI") ?>" />
            <?php if ($error_payment_name) { ?>
            <span class="error"><?php echo $error_payment_name; ?></span>
            <?php } ?>                
            </td>
            <td align="left"><span class="breadcrumb">ePay BRI</span></td>
          </tr>
					
          <tr>
            <td><?php echo $paymentchannel_dokualfa; ?></td>
            <td><input type="checkbox" name="doku_onecheckout_payment_list[14]" value="14" <?php echo get_payment_list($doku_onecheckout_payment_list, "14") ?> /></td>
            <td><input size="30" type="text" name="doku_onecheckout_payment_name[14]" placeholder="Payment Method name to display" value="<?php echo get_payment_name($doku_onecheckout_payment_name, "14", "DOKU Alfa") ?>" />
            <?php if ($error_payment_name) { ?>
            <span class="error"><?php echo $error_payment_name; ?></span>
            <?php } ?>                
            </td>
            <td align="left"><span class="breadcrumb">DOKU Alfa</span></td>
          </tr>
					
        </table>
        
        </form>
        </div>
          
        <br>
        
       <div class="dashboard-heading"><?php echo $url_title; ?></div>
             <div class="dashboard-content">
               <div class="content">
                 <table class="form">
                    <tr>
                        <td>Identify :</td>
                        <td>
                            <strong><?php echo $url_identify ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Notify :</td>
                        <td>
                            <strong><?php echo $url_notify ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Redirect :</td>
                        <td>
                            <strong><?php echo $url_redirect ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Review :</td>
                        <td>
                            <strong><?php echo $url_review ?></strong>
                        </td>
                    </tr>
                </table>
              </div>    
        </div>  
   </div>    
  </div>
</div>

<?php if ($error_warning) { ?>
<span class="error"><?php echo $error_warning; ?></span>
<?php } ?>
            
<?php echo $footer; ?> 