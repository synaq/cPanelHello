<?php
require_once("/usr/local/cpanel/php/cpanel.php");
require_once("/usr/local/cpanel/base/frontend/paper_lantern/synaq_cpanel_hello/cPanelHello.phar");
$cpanel = new CPANEL();
print $cpanel->header( "SYNAQ API Integration Hello World Example Plugin" );
?>
<table>
    <thead>
    <tr>
        <th>API Communication Test</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php print $apiConnector->getMessageFromConfigurationCategory();?></td>
    </tr>
    </tbody>
</table>
<?php
print $cpanel->footer();
$cpanel->end();