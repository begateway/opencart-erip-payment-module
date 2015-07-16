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
      $this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
    }

    $data['heading_title'] = $this->language->get('heading_title');
    $data['text_edit'] = $this->language->get('text_edit');

    $data['text_live_mode'] = $this->language->get('text_live_mode');
    $data['text_test_mode'] = $this->language->get('text_test_mode');
    $data['text_enabled'] = $this->language->get('text_enabled');
    $data['text_disabled'] = $this->language->get('text_disabled');
    $data['text_all_zones'] = $this->language->get('text_all_zones');

    $data['entry_email'] = $this->language->get('entry_email');
    $data['entry_order_status'] = $this->language->get('entry_order_status');
    $data['entry_order_status_completed_text'] = $this->language->get('entry_order_status_completed_text');
    $data['entry_order_status_pending'] = $this->language->get('entry_order_status_pending');
    $data['entry_order_status_canceled'] = $this->language->get('entry_order_status_canceled');
    $data['entry_order_status_failed'] = $this->language->get('entry_order_status_failed');
    $data['entry_order_status_failed_text'] = $this->language->get('entry_order_status_failed_text');
    $data['entry_order_status_processing'] = $this->language->get('entry_order_status_processing');
    $data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
    $data['entry_status'] = $this->language->get('entry_status');
    $data['entry_sort_order'] = $this->language->get('entry_sort_order');
    $data['entry_companyid'] = $this->language->get('entry_companyid');
    $data['entry_companyid_help'] = $this->language->get('entry_companyid_help');
    $data['entry_encyptionkey'] = $this->language->get('entry_encyptionkey');
    $data['entry_encyptionkey_help'] = $this->language->get('entry_encyptionkey_help');
    $data['entry_domain_payment_gateway'] = $this->language->get('entry_domain_payment_gateway');
    $data['entry_domain_payment_gateway_help'] = $this->language->get('entry_domain_payment_gateway_help');
    $data['entry_domain_payment_page'] = $this->language->get('entry_domain_payment_page');
    $data['entry_domain_payment_page_help'] = $this->language->get('entry_domain_payment_page_help');
    $data['entry_transaction_type_text'] = $this->language->get('entry_transaction_type_text');
    $data['entry_transaction_type_authorization'] = $this->language->get('entry_transaction_type_authorization');
    $data['entry_transaction_type_payment'] = $this->language->get('entry_transaction_type_payment');

    $data['button_save'] = $this->language->get('button_save');
    $data['button_cancel'] = $this->language->get('button_cancel');

    $data['tab_general'] = $this->language->get('tab_general');


    if (isset($this->error['warning'])) {
      $data['error_warning'] = $this->error['warning'];
    } else {
      $data['error_warning'] = '';
    }

    if (isset($this->error['companyid'])) {
      $data['error_companyid'] = $this->error['companyid'];
    } else {
      $data['error_companyid'] = '';
    }

    if (isset($this->error['encyptionkey'])) {
      $data['error_encyptionkey'] = $this->error['encyptionkey'];
    } else {
      $data['error_encyptionkey'] = '';
    }

    if (isset($this->error['domain_payment_gateway'])) {
      $data['error_domain_payment_gateway'] = $this->error['domain_payment_gateway'];
    } else {
      $data['error_domain_payment_gateway'] = '';
    }

    if (isset($this->error['domain_payment_page'])) {
      $data['error_domain_payment_page'] = $this->error['domain_payment_page'];
    } else {
      $data['error_domain_payment_page'] = '';
    }

    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      =>  $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => false
    );

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_payment'),
      'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
    );

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('heading_title'),
      'href'      => $this->url->link('payment/begateway', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
    );

    $data['action'] = $this->url->link('payment/begateway', 'token=' . $this->session->data['token'], 'SSL');

    $data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');


    if (isset($this->request->post['begateway_companyid'])) {
      $data['begateway_companyid'] = $this->request->post['begateway_companyid'];
    } else {
      $data['begateway_companyid'] = $this->config->get('begateway_companyid');
    }

    if (isset($this->request->post['begateway_encyptionkey'])) {
      $data['begateway_encyptionkey'] = $this->request->post['begateway_encyptionkey'];
    } else {
      $data['begateway_encyptionkey'] = $this->config->get('begateway_encyptionkey');
    }

    if (isset($this->request->post['begateway_domain_payment_gateway'])) {
      $data['begateway_domain_payment_gateway'] = $this->request->post['begateway_domain_payment_gateway'];
    } else {
      $data['begateway_domain_payment_gateway'] = $this->config->get('begateway_domain_payment_gateway');
    }

    if (isset($this->request->post['begateway_domain_payment_page'])) {
      $data['begateway_domain_payment_page'] = $this->request->post['begateway_domain_payment_page'];
    } else {
      $data['begateway_domain_payment_page'] = $this->config->get('begateway_domain_payment_page');
    }

    if (isset($this->request->post['begateway_completed_status_id'])) {
      $data['begateway_completed_status_id'] = $this->request->post['begateway_completed_status_id'];
    } else {
      $data['begateway_completed_status_id'] = $this->config->get('begateway_completed_status_id');
    }

    if (isset($this->request->post['begateway_failed_status_id'])) {
      $data['begateway_failed_status_id'] = $this->request->post['begateway_failed_status_id'];
    } else {
      $data['begateway_failed_status_id'] = $this->config->get('begateway_failed_status_id');
    }

    $this->load->model('localisation/order_status');

    $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

    if (isset($this->request->post['begateway_status'])) {
      $data['begateway_status'] = $this->request->post['begateway_status'];
    } else {
      $data['begateway_status'] = $this->config->get('begateway_status');
    }

    if (isset($this->request->post['begateway_geo_zone_id'])) {
      $data['begateway_geo_zone_id'] = $this->request->post['begateway_geo_zone_id'];
    } else {
      $data['begateway_geo_zone_id'] = $this->config->get('begateway_geo_zone_id');
    }

    $this->load->model('localisation/geo_zone');

    $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

    if (isset($this->request->post['begateway_sort_order'])) {
      $data['begateway_sort_order'] = $this->request->post['begateway_sort_order'];
    } else {
      $data['begateway_sort_order'] = $this->config->get('begateway_sort_order');
    }

    $data['token'] = $this->session->data['token'];

    $data['header'] = $this->load->controller('common/header');
    $data['column_left'] = $this->load->controller('common/column_left');
    $data['footer'] = $this->load->controller('common/footer');

    $this->response->setOutput($this->load->view('payment/begateway.tpl', $data));
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
