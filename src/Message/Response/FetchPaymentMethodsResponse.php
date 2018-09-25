<?php
/**
 * Created by PhpStorm.
 * User: andypieters
 * Date: 25/09/2018
 * Time: 13:43
 */

namespace Omnipay\Paynl\Message\Response;


use Omnipay\Common\PaymentMethod;

class FetchPaymentMethodsResponse extends AbstractPaynlResponse
{
    /**
     * Return available paymentmethods as an array
     *
     * @return PaymentMethod[]|null
     */
    public function getPaymentMethods(){
        if(!isset($this->data['paymentProfiles']) || empty($this->data['paymentProfiles'])){
            return null;
        }
        $paymentMethods = [];
        foreach($this->data['paymentProfiles'] as $method){
            $paymentMethods[] = new PaymentMethod($method['id'], $method['visibleName']);
        }
        return $paymentMethods;
    }
}