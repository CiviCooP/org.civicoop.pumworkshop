<?php

require_once 'pumworkshop.civix.php';

/**
 * Implementation of hook_civicrm_config
 */
function pumworkshop_civicrm_config(&$config) {
  _pumworkshop_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function pumworkshop_civicrm_xmlMenu(&$files) {
  _pumworkshop_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function pumworkshop_civicrm_install() {
  return _pumworkshop_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function pumworkshop_civicrm_uninstall() {
  return _pumworkshop_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function pumworkshop_civicrm_enable() {
  return _pumworkshop_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function pumworkshop_civicrm_disable() {
  return _pumworkshop_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function pumworkshop_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _pumworkshop_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function pumworkshop_civicrm_managed(&$entities) {
  return _pumworkshop_civix_civicrm_managed($entities);
}
/**
 * Implementation of hook_civicrm_validateForm
 * - validate postal code
 * @author Erik Hommel (erik.hommel@civicoop.org)
 *
 */
function pumworkshop_civicrm_validateForm( $formName, &$fields, &$files, &$form, &$errors ) {
    if ( $formName == "CRM_Contact_Form_Contact" || $formName == "CRM_Contact_Form_Inline_Address" ) {
        foreach ( $fields['address'] as $addressKey => $address ) {
            if ( !empty( $address['postal_code'] ) && !empty( $address['city'] ) ) {
                if ( $address['country_id'] == 1152  || empty( $address['country_id'] ) ) {
                    if ( strlen( $address['postal_code'] ) != 7 ) {
                        $errors['address['. $addressKey . '][postal_code]'] = 'Postcode moet formaat "1234 AA" hebben (incl. spatie). Het is nu te lang of te kort';
                    }
                    $digitPart = substr( $address['postal_code'], 0, 4);
                    $stringPart = substr( $address['postal_code'], -2 );
                    if ( !ctype_digit ( $digitPart ) ) {
                        $errors['address['. $addressKey . '][postal_code]'] = 'Postcode moet formaat "1234 AA" hebben (incl. spatie). Eerste 4 tekens zijn nu niet alleen cijfers';
                    }
                    if ( !ctype_alpha( $stringPart ) ) {
                        $errors['address['. $addressKey . '][postal_code]'] = 'Postcode moet formaat "1234 AA" hebben (incl. spatie). Laatste 2 tekens zijn nu niet alleen letters';
                    }
                    if ( substr( $address['postal_code'] , 4, 1 ) != " " ) {
                        $errors['address['. $addressKey . '][postal_code]'] = 'Postcode moet formaat "1234 AA" hebben (incl. spatie). Er staat nu geen spatie tussen cijfers en letters';
                    }
                }
            }
        }
    }
}