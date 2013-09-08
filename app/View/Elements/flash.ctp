<div class="alert alert-dismissable alert-<?= (isset($alert)? $alert : 'success' ) ?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $message ?>
</div>