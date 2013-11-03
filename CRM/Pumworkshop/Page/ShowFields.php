<?php

require_once 'CRM/Core/Page.php';

class CRM_Pumworkshop_Page_ShowFields extends CRM_Core_Page {
  function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('ShowFields'));

    try {
        $customFields = civicrm_api3("CustomField", "Get", array());
        if (isset($customFields['values'])) {
            $this->assign('customFields', $customFields['values']);
        }
    }
    catch (CiviCRM_API3_Exception $e) {
        $error = $e->getMessage();
        CRM_Utils_System::setUFMessage("API error :".$error);        
    }
    
    $this->assign('currentTime', date('Y-m-d H:i:s'));

    parent::run();
  }
}
