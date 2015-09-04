<?php
class ControllerPaymentBegateway extends Controller {
  private $error = array();

  public function index() {
    $this->load->language('payment/begateway');

    $this->document->setTitle($this->language->get('heading_title'));

    $this->load->model('setting/setting');

    if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {

      $this->load->model('setting/setting');
      $this->model_setting_setting->editSetting('begateway', $this->request->post);
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
    $this->data['entry_encyptionkey'] = $this->language->get('entry_encyptionkey');
    $this->data['entry_encyptionkey_help'] = $this->language->get('entry_encyptionkey_help');
    $this->data['entry_domain_payment_gateway'] = $this->language->get('entry_domain_payment_gateway');
    $this->data['entry_domain_payment_gateway_help'] = $this->language->get('entry_domain_payment_gateway_help');
    $this->data['entry_domain_payment_page'] = $this->language->get('entry_domain_payment_page');
    $this->data['entry_domain_payment_page_help'] = $this->language->get('entry_domain_payment_page_help');
    $this->data['entry_transaction_type_text'] = $this->language->get('entry_transaction_type_text');
    $this->data['entry_transaction_type_authorization'] = $this->language->get('entry_transaction_type_authorization');
    $this->data['entry_transaction_type_payment'] = $this->language->get('entry_transaction_type_payment');

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

    if (isset($this->error['encyptionkey'])) {
      $this->data['error_encyptionkey'] = $this->error['encyptionkey'];
    } else {
      $this->data['error_encyptionkey'] = '';
    }

    if (isset($this->error['domain_payment_gateway'])) {
      $this->data['error_domain_payment_gateway'] = $this->error['domain_payment_gateway'];
    } else {
      $this->data['error_domain_payment_gateway'] = '';
    }

    if (isset($this->error['domain_payment_page'])) {
      $this->data['error_domain_payment_page'] = $this->error['domain_payment_page'];
    } else {
      $this->data['error_domain_payment_page'] = '';
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
      'href'      => $this->url->link('payment/begateway', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
    );

    $this->data['action'] = $this->url->link('payment/begateway', 'token=' . $this->session->data['token'], 'SSL');

    $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');


    if (isset($this->request->post['begateway_companyid'])) {
      $this->data['begateway_companyid'] = $this->request->post['begateway_companyid'];
    } else {
      $this->data['begateway_companyid'] = $this->config->get('begateway_companyid');
    }

    if (isset($this->request->post['begateway_encyptionkey'])) {
      $this->data['begateway_encyptionkey'] = $this->request->post['begateway_encyptionkey'];
    } else {
      $this->data['begateway_encyptionkey'] = $this->config->get('begateway_encyptionkey');
    }

    if (isset($this->request->post['begateway_domain_payment_gateway'])) {
      $this->data['begateway_domain_payment_gateway'] = $this->request->post['begateway_domain_payment_gateway'];
    } else {
      $this->data['begateway_domain_payment_gateway'] = $this->config->get('begateway_domain_payment_gateway');
    }

    if (isset($this->request->post['begateway_domain_payment_page'])) {
      $this->data['begateway_domain_payment_page'] = $this->request->post['begateway_domain_payment_page'];
    } else {
      $this->data['begateway_domain_payment_page'] = $this->config->get('begateway_domain_payment_page');
    }

    if (isset($this->request->post['begateway_completed_status_id'])) {
      $this->data['begateway_completed_status_id'] = $this->request->post['begateway_completed_status_id'];
    } else {
      $this->data['begateway_completed_status_id'] = $this->config->get('begateway_completed_status_id');
    }

    if (isset($this->request->post['begateway_failed_status_id'])) {
      $this->data['begateway_failed_status_id'] = $this->request->post['begateway_failed_status_id'];
    } else {
      $this->data['begateway_failed_status_id'] = $this->config->get('begateway_failed_status_id');
    }

    $this->load->model('localisation/order_status');

    $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

    if (isset($this->request->post['begateway_status'])) {
      $this->data['begateway_status'] = $this->request->post['begateway_status'];
    } else {
      $this->data['begateway_status'] = $this->config->get('begateway_status');
    }

    if (isset($this->request->post['begateway_geo_zone_id'])) {
      $this->data['begateway_geo_zone_id'] = $this->request->post['begateway_geo_zone_id'];
    } else {
      $this->data['begateway_geo_zone_id'] = $this->config->get('begateway_geo_zone_id');
    }

    $this->load->model('localisation/geo_zone');

    $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

    if (isset($this->request->post['begateway_sort_order'])) {
      $this->data['begateway_sort_order'] = $this->request->post['begateway_sort_order'];
    } else {
      $this->data['begateway_sort_order'] = $this->config->get('begateway_sort_order');
    }

    $this->data['token'] = $this->session->data['token'];

    $this->template = 'payment/begateway.tpl';
    $this->children = array(
      'common/header',
      'common/footer'
    );

    $this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
  }

  private function validate() {
    if (!$this->user->hasPermission('modify', 'payment/begateway')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    if (!$this->request->post['begateway_companyid']) {
      $this->error['companyid'] = $this->language->get('error_companyid');
    }

    if (!$this->request->post['begateway_encyptionkey']) {
      $this->error['encyptionkey'] = $this->language->get('error_encyptionkey');
    }

    if (!$this->request->post['begateway_domain_payment_gateway']) {
        $this->error['domain_payment_gateway'] = $this->language->get('error_domain_payment_gateway');
    }
    if (!$this->request->post['begateway_domain_payment_page']) {
      $this->error['domain_payment_page'] = $this->language->get('error_domain_payment_page');
    }

    if (!$this->error) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
?>
