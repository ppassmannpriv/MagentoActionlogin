<?php
class Scriptkid_Actionlogin_Block_Checkout_Cart extends Mage_Checkout_Block_Cart {

  public function getMethods($nameInLayout)
  {
      if(Mage::helper('actionlogin')->isUserInGroup(Mage::getSingleton('customer/session')->getCustomerGroupId()))
      {
        return array();
      } else {
        return parent::getMethods($nameInLayout);
      }
  }

}
