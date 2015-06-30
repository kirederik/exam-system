<?php 
	if (isset($alert))
    	echo '<div class="alert alert-dismissable alert-'. $alert . '">';
    else 
    	echo '<div class="alert alert-dismissable alert-success">';
 ?>
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $message ?>
</div>