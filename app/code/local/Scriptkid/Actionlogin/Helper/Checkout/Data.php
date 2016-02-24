<?php
class Scriptkid_Actionlogin_Helper_Checkout_Data extends Mage_Checkout_Helper_Data
{
  public function canOnepageCheckout()
  {
    if(Mage::helper('actionlogin')->isUserInGroup(Mage::getSingleton('customer/session')->getCustomerGroupId()))
    {
      return false;
    } else {
      return (bool)Mage::getStoreConfig('checkout/options/onepage_checkout_enabled');
    }
  }
}
