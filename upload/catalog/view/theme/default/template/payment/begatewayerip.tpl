<?php
if ($token == false) {
?>
  <div class="warning">
    <?php echo $token_error; ?>
  </div>
<?php
} else { ?>
  <div class="success">
<?php
    echo str_replace(PHP_EOL, '<br>', $erip_instruction);
?>
  </div>
  <a class="button" href="<?php echo $link_next; ?>"><?php echo $button_next; ?></a>
<?php
}
?>
