<?php

class Scriptkid_Actionlogin_Helper_Data extends Mage_Core_Helper_Abstract {

  public function getActionloginCustomerData()
  {
    $data = array(
      'email' => Mage::getStoreConfig('actionlogin/customerdata/customer_email', Mage::app()->getStore()),
      'password' => Mage::getStoreConfig('actionlogin/customerdata/customer_password', Mage::app()->getStore())
    );

    return $data;
  }

  public function isUserInGroup($groupOfCustomer)
  {
    $val = explode(',', Mage::getStoreConfig('actionlogin/customerdata/customer_group', Mage::app()->getStore()));
    if(in_array($groupOfCustomer, $val))
    {
      $val = true;
    } else {
      $val = false;
    }
    return $val;
  }

  public function checkHash($param)
  {
    $ask = urldecode(Mage::helper('core')->decrypt($param));
    $hashvalue = Mage::getStoreConfig('actionlogin/safety/hash', Mage::app()->getStore());

    if($ask === $hashvalue)
    {
      return true;
    } else {
      return false;
    }
  }

  public function getHashedUrl($hashvalue)
  {
    $mangledHash = urlencode(Mage::helper('core')->encrypt($hashvalue));
    $url = Mage::getBaseUrl().'actionlogin/login/index/hash/'.$mangledHash;

    return $url;
  }
}
