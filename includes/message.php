
<?php
// Affichage du message présent dans l'URL
if(isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type']) && !empty($_GET['type'])){
	echo '<p class="alert alert-' . $_GET['type'] . '">' . htmlspecialchars($_GET['message']) . '</p>';
}
?>