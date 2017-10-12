<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DOKU Onecheckout
 *
 * @lordsanjay
 */
 
class ControllerPaymentDOKUOnecheckout extends Controller 
{
    
    private $error = array();
                             
    public function index() 
    {
        
        # Set Initial Parameters
				$this->load->language('payment/doku_onecheckout');
				$this->document->setTitle($this->language->get('heading_title'));		
				$this->load->model('setting/setting');
			
				if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate() ) 
        {
						$this->model_setting_setting->editSetting('doku_onecheckout', $this->request->post);							
						$this->session->data['success'] = $this->language->get('text_success');
						$this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
				}
        
				# Get Form Data
				$this->data['heading_title']                = $this->language->get('heading_title');        
        $this->data['server_params']                = $this->language->get('server_params');
        $this->data['opencart_params']              = $this->language->get('opencart_params');
				$this->data['paymentchannel_params']        = $this->language->get('paymentchannel_params');        
        $this->data['entry_server_set']             = $this->language->get('entry_server_set');
        $this->data['entry_mallid_prod']            = $this->language->get('entry_mallid_prod');
        $this->data['entry_sharedkey_prod']         = $this->language->get('entry_sharedkey_prod');
        $this->data['entry_chain_prod']             = $this->language->get('entry_chain_prod');
        $this->data['entry_mallid_dev']             = $this->language->get('entry_mallid_dev');
        $this->data['entry_sharedkey_dev']          = $this->language->get('entry_sharedkey_dev');
        $this->data['entry_chain_dev']              = $this->language->get('entry_chain_dev');
        $this->data['entry_review_edu']             = $this->language->get('entry_review_edu');
        $this->data['entry_identify']               = $this->language->get('entry_identify');
        $this->data['entry_payment_channel']        = $this->language->get('entry_payment_channel');
        $this->data['list_payment_channel']         = $this->language->get('list_payment_channel');
        $this->data['entry_doku_name']              = $this->language->get('entry_doku_name');
        $this->data['entry_status']                 = $this->language->get('entry_status');
        $this->data['entry_order_status']           = $this->language->get('entry_order_status');        				
        $this->data['entry_sort_order']             = $this->language->get('entry_sort_order');
				$this->data['entry_geo_zone']               = $this->language->get('entry_geo_zone');				
				$this->data['text_all_zones']               = $this->language->get('text_all_zones');        
				
				/*        
				$this->data['entry_minimal_amount']         = $this->language->get('entry_minimal_amount');
				$this->data['entry_expired_time']           = $this->language->get('entry_expired_time');
				$this->data['entry_check_key']              = $this->language->get('entry_check_key');
        */
				
				$this->data['text_enabled']                 = $this->language->get('text_enabled');
        $this->data['text_disabled']                = $this->language->get('text_disabled');
        $this->data['url_title']                    = $this->language->get('url_title');
        $this->data['url_identify']                 = $this->language->get('url_identify');
        $this->data['url_notify']                   = $this->language->get('url_notify');
        $this->data['url_redirect']                 = $this->language->get('url_redirect');
        $this->data['url_review']                   = $this->language->get('url_review');
				$this->data['button_save']                  = $this->language->get('button_save');
				$this->data['button_cancel']                = $this->language->get('button_cancel');
		
        $this->data['paymentchannel_selection']     = $this->language->get('paymentchannel_selection');
        $this->data['paymentchannel_cc']            = $this->language->get('paymentchannel_cc');
				$this->data['paymentchannel_clickpay']      = $this->language->get('paymentchannel_clickpay');
				$this->data['paymentchannel_dokuwalet']     = $this->language->get('paymentchannel_dokuwalet');
        $this->data['paymentchannel_permatavalite'] = $this->language->get('paymentchannel_permatavalite');
				$this->data['paymentchannel_epaybri']       = $this->language->get('paymentchannel_epaybri');
				$this->data['paymentchannel_dokualfa']      = $this->language->get('paymentchannel_dokualfa');
        
        
				# Set Error Message
        if ( isset($this->error['warning']) ) 
        {
            $this->data['error_warning'] = $this->error['warning'];
        } 
        else 
        {
            $this->data['error_warning'] = '';
        }

        if ( isset($this->error['server_set']) ) 
        {
            $this->data['error_server_set'] = $this->error['error_server_set'];
        } 
        else 
        {
            $this->data['error_server_set'] = '';
        }
        
        if ( isset($this->error['mallid_prod']) ) 
        {
            $this->data['error_mallid_prod'] = $this->error['mallid_prod'];
        } 
        else 
        {
            $this->data['error_mallid_prod'] = '';
        }

        if ( isset($this->error['sharedkey_prod']) ) 
        {
            $this->data['error_sharedkey_prod'] = $this->error['sharedkey_prod'];
        } 
        else 
        {
            $this->data['error_sharedkey_prod'] = '';
        }

        if ( isset($this->error['chain_prod']) ) 
        {
            $this->data['error_chain_prod'] = $this->error['chain_prod'];
        } 
        else 
        {
            $this->data['error_chain_prod'] = '';
        }
        
        if ( isset($this->error['mallid_dev']) ) 
        {
            $this->data['error_mallid_dev'] = $this->error['mallid_dev'];
        } 
        else 
        {
            $this->data['error_mallid_dev'] = '';
        }

        if ( isset($this->error['sharedkey_dev']) ) 
        {
            $this->data['error_sharedkey_dev'] = $this->error['sharedkey_dev'];
        } 
        else 
        {
            $this->data['error_sharedkey_dev'] = '';
        }

        if ( isset($this->error['chain_dev']) ) 
        {
            $this->data['error_chain_dev'] = $this->error['chain_dev'];
        } 
        else 
        {
            $this->data['error_chain_dev'] = '';
        }
          
				/*
        if ( isset($this->error['expired_time']) ) 
        {
            $this->data['error_expired_time'] = $this->error['expired_time'];
        } 
        else 
        {
            $this->data['error_expired_time'] = '';
        }

        if ( isset($this->error['check_key']) ) 
        {
            $this->data['error_check_key'] = $this->error['check_key'];
        } 
        else 
        {
            $this->data['error_check_key'] = '';
        }

        if ( isset($this->error['minimal_amount']) ) 
        {
            $this->data['error_minimal_amount'] = $this->error['minimal_amount'];
        } 
        else 
        {
            $this->data['error_minimal_amount'] = '';
        }
				*/
								
        if ( isset($this->error['payment_method']) ) 
        {
            $this->data['error_payment_method'] = $this->error['payment_method'];
        } 
        else 
        {
            $this->data['error_payment_method'] = '';
        }

        if ( isset($this->error['error_doku_name']) ) 
        {
            $this->data['error_doku_name'] = $this->error['error_doku_name'];
        } 
        else 
        {
            $this->data['error_doku_name'] = '';
        }
	
        if ( isset($this->error['error_payment_name']) ) 
        {
            $this->data['error_payment_name'] = $this->error['error_payment_name'];
        } 
        else 
        {
            $this->data['error_payment_name'] = '';
        }
     	
        
				# Get POST or Config Data      
        if ( isset($this->request->post['doku_onecheckout_server_set']) ) 
        {
            $this->data['doku_onecheckout_server_set'] = $this->request->post['doku_onecheckout_server_set'];
        } 
        else 
        {
            $this->data['doku_onecheckout_server_set'] = $this->config->get('doku_onecheckout_server_set');
        }

        if ( isset($this->request->post['doku_onecheckout_mallid_prod']) ) 
        {
            $this->data['doku_onecheckout_mallid_prod'] = $this->request->post['doku_onecheckout_mallid_prod'];
        } 
        else 
        {
            $this->data['doku_onecheckout_mallid_prod'] = $this->config->get('doku_onecheckout_mallid_prod');
        }
        
        if ( isset($this->request->post['doku_onecheckout_sharedkey_prod']) ) 
        {
            $this->data['doku_onecheckout_sharedkey_prod'] = $this->request->post['doku_onecheckout_sharedkey_prod'];
        } 
        else 
        {
            $this->data['doku_onecheckout_sharedkey_prod'] = $this->config->get('doku_onecheckout_sharedkey_prod');
        }        

        if ( isset($this->request->post['doku_onecheckout_chain_prod']) ) 
        {
            $this->data['doku_onecheckout_chain_prod'] = $this->request->post['doku_onecheckout_chain_prod'];
        } 
        else 
        {
            $this->data['doku_onecheckout_chain_prod'] = $this->config->get('doku_onecheckout_chain_prod');
        }
        
        if ( isset($this->request->post['doku_onecheckout_mallid_dev']) ) 
        {
            $this->data['doku_onecheckout_mallid_dev'] = $this->request->post['doku_onecheckout_mallid_dev'];
        } 
        else 
        {
            $this->data['doku_onecheckout_mallid_dev'] = $this->config->get('doku_onecheckout_mallid_dev');
        }
        
        if ( isset($this->request->post['doku_onecheckout_sharedkey_dev']) ) 
        {
            $this->data['doku_onecheckout_sharedkey_dev'] = $this->request->post['doku_onecheckout_sharedkey_dev'];
        } 
        else 
        {
            $this->data['doku_onecheckout_sharedkey_dev'] = $this->config->get('doku_onecheckout_sharedkey_dev');
        }        

        if ( isset($this->request->post['doku_onecheckout_chain_dev']) ) 
        {
            $this->data['doku_onecheckout_chain_dev'] = $this->request->post['doku_onecheckout_chain_dev'];
        } 
        else 
        {
            $this->data['doku_onecheckout_chain_dev'] = $this->config->get('doku_onecheckout_chain_dev');
        }
        
        if ( isset($this->request->post['doku_onecheckout_review_edu']) ) 
        {
            $this->data['doku_onecheckout_review_edu'] = $this->request->post['doku_onecheckout_review_edu'];
        } 
        else 
        {
            $this->data['doku_onecheckout_review_edu'] = $this->config->get('doku_onecheckout_review_edu');
        }        

        if ( isset($this->request->post['doku_onecheckout_identify']) ) 
        {
            $this->data['doku_onecheckout_identify'] = $this->request->post['doku_onecheckout_identify'];
        } 
        else 
        {
            $this->data['doku_onecheckout_identify'] = $this->config->get('doku_onecheckout_identify');
        }        
        
        if ( isset($this->request->post['doku_onecheckout_payment_channel']) ) 
        {
            $this->data['doku_onecheckout_payment_channel'] = $this->request->post['doku_onecheckout_payment_channel'];
        } 
        else 
        {
            $this->data['doku_onecheckout_payment_channel'] = $this->config->get('doku_onecheckout_payment_channel');
        }        

        if ( isset($this->request->post['doku_onecheckout_payment_method']) ) 
        {
            $this->data['doku_onecheckout_payment_method'] = $this->request->post['doku_onecheckout_payment_method'];
        } 
        else 
        {
            $this->data['doku_onecheckout_payment_method'] = $this->config->get('doku_onecheckout_payment_method');
        }        
        							
        if ( isset($this->request->post['doku_onecheckout_order_status_id']) ) 
        {
            $this->data['doku_onecheckout_order_status_id'] = $this->request->post['doku_onecheckout_order_status_id'];
        } 
        else 
        {
            $this->data['doku_onecheckout_order_status_id'] = $this->config->get('doku_onecheckout_order_status_id'); 
        }
		
				/*
        if ( isset($this->request->post['doku_onecheckout_expired_time']) ) 
        {
            $this->data['doku_onecheckout_expired_time'] = $this->request->post['doku_onecheckout_expired_time'];
        } 
        else 
        {
            $this->data['doku_onecheckout_expired_time'] = $this->config->get('doku_onecheckout_expired_time'); 
        }

        if ( isset($this->request->post['doku_onecheckout_check_key']) ) 
        {
            $this->data['doku_onecheckout_check_key'] = $this->request->post['doku_onecheckout_check_key'];
        } 
        else 
        {
            $this->data['doku_onecheckout_check_key'] = $this->config->get('doku_onecheckout_check_key'); 
        }

        if ( isset($this->request->post['doku_onecheckout_minimal_amount']) ) 
        {
            $this->data['doku_onecheckout_minimal_amount'] = $this->request->post['doku_onecheckout_minimal_amount'];
        } 
        else 
        {
            $this->data['doku_onecheckout_minimal_amount'] = $this->config->get('doku_onecheckout_minimal_amount'); 
        }
				*/
				
				if ( isset($this->request->post['doku_onecheckout_geo_zone_id']) ) 
        {
						$this->data['doku_onecheckout_geo_zone_id'] = $this->request->post['doku_onecheckout_geo_zone_id'];
				} 
        else 
        {
						$this->data['doku_onecheckout_geo_zone_id'] = $this->config->get('doku_onecheckout_geo_zone_id'); 
				} 

				$this->load->model('localisation/geo_zone');										
				$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();								
	
				# Payment Channel	
        if ( isset($this->request->post['doku_onecheckout_doku_name']) ) 
        {
            $this->data['doku_onecheckout_doku_name'] = $this->request->post['doku_onecheckout_doku_name'];
        } 
        else 
        {
            $this->data['doku_onecheckout_doku_name'] = $this->config->get('doku_onecheckout_doku_name'); 
        }
	
        if ( isset($this->request->post['doku_onecheckout_payment_select']) ) 
        {
            $this->data['doku_onecheckout_payment_select'] = $this->request->post['doku_onecheckout_payment_select'];
        } 
        else 
        {
            $this->data['doku_onecheckout_payment_select'] = $this->config->get('doku_onecheckout_payment_select'); 
        }

        if ( isset($this->request->post['doku_onecheckout_payment_list']) ) 
        {
            $this->data['doku_onecheckout_payment_list'] = $this->request->post['doku_onecheckout_payment_list'];
        } 
        else 
        {
            $this->data['doku_onecheckout_payment_list'] = $this->config->get('doku_onecheckout_payment_list'); 
        }
	
        if ( isset($this->request->post['doku_onecheckout_payment_name']) ) 
        {
            $this->data['doku_onecheckout_payment_name'] = $this->request->post['doku_onecheckout_payment_name'];
        } 
        else 
        {
            $this->data['doku_onecheckout_payment_name'] = $this->config->get('doku_onecheckout_payment_name'); 
        }
		
        $this->load->model('localisation/order_status');		
        $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
				
				if ( isset($this->request->post['doku_onecheckout_status']) ) 
        {
						$this->data['doku_onecheckout_status'] = $this->request->post['doku_onecheckout_status'];
				} 
				else 
        {
						$this->data['doku_onecheckout_status'] = $this->config->get('doku_onecheckout_status');
				}
        
				if ( isset($this->request->post['doku_onecheckout_sort_order']) ) 
        {
						$this->data['doku_onecheckout_sort_order'] = $this->request->post['doku_onecheckout_sort_order'];
				} 
        else 
        {
						$this->data['doku_onecheckout_sort_order'] = $this->config->get('doku_onecheckout_sort_order');
				}

        # Set Breadcrumbs
        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
           'text'      => $this->language->get('text_home'),
           'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
           'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
           'text'      => $this->language->get('text_payment'),
           'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
           'separator' => ' :: '
        );

        $this->data['breadcrumbs'][] = array(
           'text'      => $this->language->get('heading_title'),
           'href'      => $this->url->link('payment/doku_onecheckout', 'token=' . $this->session->data['token'], 'SSL'),
           'separator' => ' :: '
        );
                
        $this->data['action'] = $this->url->link('payment/doku_onecheckout', 'token=' . $this->session->data['token'], 'SSL');        
        $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');
		              
				$this->template = 'payment/doku_onecheckout.tpl';
				$this->children = array(
					'common/header',
					'common/footer'
				);
						
				$this->response->setOutput($this->render());
				
		}

    private function validate()
    {
        if ( !$this->user->hasPermission('modify', 'payment/doku_onecheckout') ) 
        {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ( !$this->request->post['doku_onecheckout_mallid_prod'] ) 
        {
            $this->error['mallid_prod'] = $this->language->get('error_mallid_prod');
        }
        
        if ( !$this->request->post['doku_onecheckout_sharedkey_prod'] ) 
        {
            $this->error['sharedkey_prod'] = $this->language->get('error_sharedkey_prod');
        }        

        if ( !$this->request->post['doku_onecheckout_chain_prod'] ) 
        {
            $this->error['chain_prod'] = $this->language->get('error_chain_prod');
        }
        
        if ( !$this->request->post['doku_onecheckout_mallid_dev'] ) 
        {
            $this->error['mallid_dev'] = $this->language->get('error_mallid_dev');
        }

        if ( !$this->request->post['doku_onecheckout_sharedkey_dev'] ) 
        {
            $this->error['sharedkey_dev'] = $this->language->get('error_sharedkey_dev');
        }

        if ( !$this->request->post['doku_onecheckout_chain_dev'] ) 
        {
            $this->error['chain_dev'] = $this->language->get('error_chain_dev');
        }

				/*
        if ( !$this->request->post['doku_onecheckout_expired_time'] ) 
        {
            $this->error['expired_time'] = $this->language->get('error_expired_time');
        } 

        if ( !$this->request->post['doku_onecheckout_minimal_amount'] ) 
        {
            $this->error['minimal_amount'] = $this->language->get('error_minimal_amount');
        }
	
        if ( !$this->request->post['doku_onecheckout_check_key'] ) 
        {
            $this->error['check_key'] = $this->language->get('error_check_key');
        } 
				*/

        if ( !$this->request->post['doku_onecheckout_doku_name'] ) 
        {
            $this->error['doku_name'] = $this->language->get('error_doku_name');
        }
	
				if ( !$this->error ) 
        {
            return true;
        } 
        else 
        {
            return false;
        }	
    }
		
}

?>
