<?php
class Scriptkid_Actionlogin_Model_Observer
{
  public function logHashedUrl(Varien_Event_Observer $observer)
  {

    $post = Mage::app()->getRequest()->getPost();
    $hashedUrl = Mage::helper('actionlogin')->getHashedUrl($post['groups']['safety']['fields']['hash']['value']);

    Mage::log($hashedUrl, 6, 'actionlogin.log');
  }
}
