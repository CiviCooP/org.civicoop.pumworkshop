{*
 +--------------------------------------------------------------------+
 | PUM CiviCRM Developer Workshop                                     |
 | Author       :   Erik Hommel (erik.hommel@civicoop.org)            |
 |                  EE-atWork (http://www.civicoop.org)               |
 | Date	        :   1 november 2013                                   |
 | Description  :   Add button to jump to                             |
 +--------------------------------------------------------------------+
 *}
 
{crmAPI var="ApiBsn" entity="Contact" action="getvalue" q="civicrm/ajax/rest" version="3" id=$contactId return=custom_7}
<div class="crm-summary-row" id="bsnID">
    <div class="crm-label">BSN</div>
    <div class="crm-content">{$ApiBsn}
</div>

{literal}
    <script type="text/javascript">
        cj("#bsnID").appendTo("#im-block");
        cj("#custom-set-block-4-1").parent().hide();    
    </script>
{/literal}
