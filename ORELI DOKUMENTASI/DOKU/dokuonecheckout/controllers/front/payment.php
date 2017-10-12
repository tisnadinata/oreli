<?php

class DOKUOnecheckoutPaymentModuleFrontController extends ModuleFrontController
{
    
    // NOT USE ANYMORE, MOVE TO FUNCTION hookPayment
    
    /*
    public $ssl = true;

    public function initContent()
    {
        parent::initContent();

        $cart = $this->context->cart;

        $dokuonecheckout = new dokuonecheckout();
        $dokuonecheckout->execPayment($cart);

        $this->context->smarty->assign(array(
            'nbProducts'    => $cart->nbProducts(),            
            'total'         => $cart->getOrderTotal(true, Cart::BOTH),
            'isoCode'       => $this->context->language->iso_code,
            'this_path'     => $this->module->getPathUri(),
            'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
        ));

        $order_state  = 13;
        $transactions = $this->context->smarty->tpl_vars;

        $dokuonecheckout->validateOrder($transactions['TRANSIDMERCHANT']->value, $order_state, $transactions['AMOUNT']->value, "DOKUOnecheckout", $transactions['TRANSIDMERCHANT']->value);
        
        $this->setTemplate('payment_execution.tpl');
    }
    */
}