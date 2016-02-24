<?php
class Scriptkid_Actionlogin_LoginController extends Mage_Core_Controller_Front_Action
{
  public function indexAction()
  {
    $loginData = Mage::helper('actionlogin')->getActionloginCustomerData();
    #Mage::helper('actionlogin')->isUserInGroup();
    if(Mage::helper('actionlogin')->checkHash($this->getRequest()->getParam('hash')))
    {
      //Hash is correct, so let's do stuff!
      try {
        $customer = Mage::getModel('customer/customer');
        $customer->setWebsiteId(Mage::app()->getWebsite()->getId());
        $customer->loadByEmail($loginData['email']);

        $session = Mage::getSingleton('customer/session');
        $session->loginById($customer->getId());

      } catch(Exception $e) {

      }
    } else {
      //Hash is incorrect, so get lost!
      Mage::log('Somebody tried to access the Actionlogin with an invalid hash!', 5, 'actionlogin.log');
    }

    $this->_redirect('');
  }
}
