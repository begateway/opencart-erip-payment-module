<?php
class ControllerPaymentBegatewayErip extends Controller {
  private $error = array();

  public function index() {
    $this->load->language('payment/begatewayerip');

    $this->document->setTitle($this->language->get('heading_title'));

    $this->load->model('setting/setting');

    if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {

      $this->load->model('setting/setting');
      $this->model_setting_setting->editSetting('begatewayerip', $this->request->post);
      $this->session->data['success'] = $this->language->get('text_success');
      $this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
    }

    $this->data['heading_title'] = $this->language->get('heading_title');
    $this->data['text_edit'] = $this->language->get('text_edit');

    $this->data['text_live_mode'] = $this->language->get('text_live_mode');
    $this->data['text_test_mode'] = $this->language->get('text_test_mode');
    $this->data['text_enabled'] = $this->language->get('text_enabled');
    $this->data['text_disabled'] = $this->language->get('text_disabled');
    $this->data['text_all_zones'] = $this->language->get('text_all_zones');

    $this->data['entry_email'] = $this->language->get('entry_email');
    $this->data['entry_order_status'] = $this->language->get('entry_order_status');
    $this->data['entry_order_status_completed_text'] = $this->language->get('entry_order_status_completed_text');
    $this->data['entry_order_status_pending'] = $this->language->get('entry_order_status_pending');
    $this->data['entry_order_status_canceled'] = $this->language->get('entry_order_status_canceled');
    $this->data['entry_order_status_failed'] = $this->language->get('entry_order_status_failed');
    $this->data['entry_order_status_failed_text'] = $this->language->get('entry_order_status_failed_text');
    $this->data['entry_order_status_processing'] = $this->language->get('entry_order_status_processing');
    $this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
    $this->data['entry_status'] = $this->language->get('entry_status');
    $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
    $this->data['entry_companyid'] = $this->language->get('entry_companyid');
    $this->data['entry_companyid_help'] = $this->language->get('entry_companyid_help');
    $this->data['entry_encryptionkey'] = $this->language->get('entry_encryptionkey');
    $this->data['entry_encryptionkey_help'] = $this->language->get('entry_encryptionkey_help');
    $this->data['entry_domain_api'] = $this->language->get('entry_domain_api');
    $this->data['entry_domain_api_help'] = $this->language->get('entry_domain_api_help');
    $this->data['entry_service_no'] = $this->language->get('entry_service_no');
    $this->data['entry_service_no_help'] = $this->language->get('entry_service_no_help');

    $this->data['button_save'] = $this->language->get('button_save');
    $this->data['button_cancel'] = $this->language->get('button_cancel');

    $this->data['tab_general'] = $this->language->get('tab_general');

    if (isset($this->error['warning'])) {
      $this->data['error_warning'] = $this->error['warning'];
    } else {
      $this->data['error_warning'] = '';
    }

    if (isset($this->error['companyid'])) {
      $this->data['error_companyid'] = $this->error['companyid'];
    } else {
      $this->data['error_companyid'] = '';
    }

    if (isset($this->error['encryptionkey'])) {
      $this->data['error_encryptionkey'] = $this->error['encryptionkey'];
    } else {
      $this->data['error_encryptionkey'] = '';
    }

    if (isset($this->error['domain_api'])) {
      $this->data['error_domain_api'] = $this->error['domain_api'];
    } else {
      $this->data['error_domain_api'] = '';
    }

    if (isset($this->error['service_no'])) {
      $this->data['error_service_no'] = $this->error['service_no'];
    } else {
      $this->data['error_service_no'] = '';
    }

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      =>  $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => false
    );

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_payment'),
      'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
    );

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('heading_title'),
      'href'      => $this->url->link('payment/begatewayerip', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
    );

    $this->data['action'] = $this->url->link('payment/begatewayerip', 'token=' . $this->session->data['token'], 'SSL');

    $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');


    if (isset($this->request->post['begatewayerip_companyid'])) {
      $this->data['begatewayerip_companyid'] = $this->request->post['begatewayerip_companyid'];
    } else {
      $this->data['begatewayerip_companyid'] = $this->config->get('begatewayerip_companyid');
    }

    if (isset($this->request->post['begatewayerip_encryptionkey'])) {
      $this->data['begatewayerip_encryptionkey'] = $this->request->post['begatewayerip_encryptionkey'];
    } else {
      $this->data['begatewayerip_encryptionkey'] = $this->config->get('begatewayerip_encryptionkey');
    }

    if (isset($this->request->post['begatewayerip_domain_api'])) {
      $this->data['begatewayerip_domain_api'] = $this->request->post['begatewayerip_domain_api'];
    } else {
      $this->data['begatewayerip_domain_api'] = $this->config->get('begatewayerip_domain_api');
    }

    if (isset($this->request->post['begatewayerip_service_no'])) {
      $this->data['begatewayerip_service_no'] = $this->request->post['begatewayerip_service_no'];
    } else {
      $this->data['begatewayerip_service_no'] = $this->config->get('begatewayerip_service_no');
    }

    if (isset($this->request->post['begatewayerip_completed_status_id'])) {
      $this->data['begatewayerip_completed_status_id'] = $this->request->post['begatewayerip_completed_status_id'];
    } else {
      $this->data['begatewayerip_completed_status_id'] = $this->config->get('begatewayerip_completed_status_id');
    }

    $this->load->model('localisation/order_status');

    $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

    if (isset($this->request->post['begatewayerip_status'])) {
      $this->data['begatewayerip_status'] = $this->request->post['begatewayerip_status'];
    } else {
      $this->data['begatewayerip_status'] = $this->config->get('begatewayerip_status');
    }

    if (isset($this->request->post['begatewayerip_geo_zone_id'])) {
      $this->data['begatewayerip_geo_zone_id'] = $this->request->post['begatewayerip_geo_zone_id'];
    } else {
      $this->data['begatewayerip_geo_zone_id'] = $this->config->get('begatewayerip_geo_zone_id');
    }

    $this->load->model('localisation/geo_zone');

    $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

    if (isset($this->request->post['begatewayerip_sort_order'])) {
      $this->data['begatewayerip_sort_order'] = $this->request->post['begatewayerip_sort_order'];
    } else {
      $this->data['begatewayerip_sort_order'] = $this->config->get('begatewayerip_sort_order');
    }

    $this->data['token'] = $this->session->data['token'];

    $this->template = 'payment/begatewayerip.tpl';
    $this->children = array(
      'common/header',
      'common/footer'
    );

    $this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
  }

  private function validate() {
    if (!$this->user->hasPermission('modify', 'payment/begatewayerip')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    if (!$this->request->post['begatewayerip_companyid']) {
      $this->error['companyid'] = $this->language->get('error_companyid');
    }

    if (!$this->request->post['begatewayerip_encryptionkey']) {
      $this->error['encryptionkey'] = $this->language->get('error_encryptionkey');
    }

    if (!$this->request->post['begatewayerip_domain_api']) {
        $this->error['domain_api'] = $this->language->get('error_domain_api');
    }
    if (!$this->request->post['begatewayerip_service_no']) {
      $this->error['service_no'] = $this->language->get('error_service_no');
    }

    if (!$this->error) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
?>
