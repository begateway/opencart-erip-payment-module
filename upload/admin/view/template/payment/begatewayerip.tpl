<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/payment/raschet.png" height="20px" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
	          <td><?php echo $entry_companyid; ?></td>
	          <td><input type="text" name="begatewayerip_companyid" value="<?php echo $begatewayerip_companyid; ?>" size="15" />
              <?php if ($error_companyid) { ?>
              <span class="error"><?php echo $error_companyid; ?></span>
              <?php } ?></td>

          </tr>
          <tr>
	          <td><?php echo $entry_encryptionkey; ?></td>
	          <td><input type="text" name="begatewayerip_encryptionkey" value="<?php echo $begatewayerip_encryptionkey; ?>" size="50" />
              <?php if ($error_encryptionkey) { ?>
              <span class="error"><?php echo $error_encryptionkey; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_domain_api; ?></td>
            <td><input type="text" name="begatewayerip_domain_api" value="<?php echo $begatewayerip_domain_api; ?>" size="50" />
              <?php if ($error_domain_api) { ?>
              <span class="error"><?php echo $error_domain_api; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_service_no; ?></td>
            <td><input type="text" name="begatewayerip_service_no" value="<?php echo $begatewayerip_service_no; ?>" size="50" />
              <?php if ($error_service_no) { ?>
              <span class="error"><?php echo $error_service_no; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_order_status; ?></td>
            <td><select name="begatewayerip_completed_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $begatewayerip_completed_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><?php echo $entry_geo_zone; ?></td>
            <td>
              <select name="begatewayerip_geo_zone_id">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $begatewayerip_geo_zone_id) { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </td>
          </tr>

          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="begatewayerip_status">
                <?php if ($begatewayerip_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_sort_order; ?></td>
            <td><input type="text" name="begatewayerip_sort_order" value="<?php echo $begatewayerip_sort_order; ?>" size="3" /></td>
          </tr>
        </form>
      </table>
  </div>
</div>
<?php echo $footer; ?>
