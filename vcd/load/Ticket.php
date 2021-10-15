<?php
require_once '../../global.php';
$ticketID = $Functions->FilterText($_GET['ticket']);
$result = $db->query("SELECT * FROM cms_tickets WHERE id = '{$ticketID}' AND type = '0'");
$ticket = $result->fetch_array();

$resultT = $db->query("SELECT * FROM cms_tickets WHERE posted_in = '{$ticket['id']}' AND type = '1'");
$ticketinfo = $resultT->fetch_array();
?>

<?php echo $Functions->FilterText($ticket['content']); ?>
<?php if ( $ticket['open'] == '0' ) { ?>
<div class="btn" closeticket="<?php echo $ticket['id']; ?>">Cerrar ticket</div>
<?php  } else { ?>
<div class="response">
    <span class="title">Respuesta del ticket</span> 
    <i><?php if ( empty($ticketinfo['content']) ) { echo "¡Tu ticket aún no ha sido visto por un miembro del equipo!"; } else { echo $Functions->FilterText($ticketinfo['content']); } ?></i>     
</div>
<?php  } ?>