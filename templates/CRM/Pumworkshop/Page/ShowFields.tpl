<h3>This page shows all the custom fields</h3>

{* Example: Display a variable directly *}
<p>The current time is {$currentTime}</p>

<table>
    <tr>
        <th colspan="4"><h4>Eigen velden</h4></th>
    </tr>
    <tr>
        <th>Naam</th>
        <th>Label</th>
        <th>Veldnaam</th>
        <th>Id</th>
        <th>Type</th>
    </tr>
{foreach from=$customFields item=customField}
    <tr>
        <td>{$customField.name}</td>
        <td>{$customField.label}</td>
        <td>{$customField.column_name}</td>
        <td>{$customField.id}</td>
        <td>{$customField.data_type}</td>
    </tr>
{/foreach}
</table>