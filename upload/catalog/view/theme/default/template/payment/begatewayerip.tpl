<div id="instruction" class="left"></div>
<div class="buttons" id="checkout-success">
  <div class="right"><input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button" /></div>
</div>
<script type="text/javascript"><!--
jQuery('#button-confirm').bind('click', function() {
	jQuery.ajax({
		url: 'index.php?route=payment/begatewayerip/send',
		type: 'post',
    dataType: 'json',
		beforeSend: function() {
			jQuery('#button-confirm').attr('disabled', true);
      jQuery('#instruction').empty();
			jQuery('#instruction').before('<div class="attention" id="erip-progress"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			jQuery('#button-confirm').attr('disabled', false);
			jQuery('#erip-progress').remove();
		},
		success: function(json) {
      if (json['error']) {
        jQuery('#instruction').append('<div class="attention">' + json['error'] + '</div>');
      } else {
        jQuery('#instruction').append('<div class="success">' + json['text_thankyou'] + '</div>' +
          '<div>' + json['instruction'] + '</div>');
        jQuery('#button-confirm').attr('onclick', "location.href='" + json['success_url'] + "'");
        jQuery('#button-confirm').attr('value', json['button_continue']);
      }
		}
	});
});
//--></script>
