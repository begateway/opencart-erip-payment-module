<?php if ($token == false) { ?>
<div class="alert alert-warning">
<i class="fa fa-exclamation-circle"></i>
<?php echo $token_error; ?>
</div>
<?php } else { ?>
<form action="<?php echo $action; ?>" method="post">
  <input type="hidden" name="token" value="<?php echo $token; ?>" />
  <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
  <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>
<?php } ?>
