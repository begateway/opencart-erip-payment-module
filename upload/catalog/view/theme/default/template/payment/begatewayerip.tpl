<div id="instruction" class="left"></div>
<div class="buttons" id="checkout-success">
  <div class="right"><input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button" /></div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
	$.ajax({
		url: 'index.php?route=payment/begatewayerip/send',
		type: 'post',
    dataType: 'json',
		beforeSend: function() {
			$('#button-confirm').attr('disabled', true);
      $('#instruction').empty();
			$('#instruction').before('<div class="attention" id="erip-progress"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-confirm').attr('disabled', false);
			$('#erip-progress').remove();
		},
		success: function(json) {
      if (json['error']) {
        $('#instruction').append('<div class="attention">' + json['error'] + '</div>');
      } else {
        $('#instruction').append('<div class="success">' + json['text_thankyou'] + '</div>' +
          '<div>' + json['instruction'] + '</div>');
        $('#checkout-success .right').empty();
        $('#checkout-success .right').append('<input type="button" class="button" onclick="location.href=\'' + json['success_url'] + '\';" value="' + json['button_continue'] + '" />');
      }
		}
	});
});
//--></script>
