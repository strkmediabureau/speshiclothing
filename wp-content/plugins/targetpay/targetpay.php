<?php

/**
 * TargetPay Woocommerce payment module
 *
 * @author iDEALplugins.nl <info@yellowmelon.nl>
 * @license http://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)
 * @copyright Copyright (c) 2013 Yellow Melon B.V.
 *
 * Plugin Name: TargetPay for Woocommerce
 * Plugin URI: https://www.idealplugins.nl
 * Description: Enables iDEAL, Mister Cash and Sofort Banking in Woocommerce
 * Author: Yellow Melon B.V.
 * Author URI: http://www.yellowmelon.nl
 * Version: 1.0
 */

if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) return;

// Only load if TargetPayCore class is not yet defined => avoid concurrency problems

if (!class_exists('TargetPayCore')) {
	require_once ( realpath(dirname(__FILE__)) . '/classes/targetpay.class.php');
    }

add_action( 'plugins_loaded', 'init_targetpay_class', 0);

// Main class

function init_targetpay_class() {

	class WC_Gateway_TargetPay extends WC_Payment_Gateway {

		var $notify_url;

		public function __construct() {
			global $woocommerce;

	        $this->id           = 'targetpay';
	        $this->has_fields   = false;
	        $this->method_title = "TargetPay";
	        $this->title 		= "TargetPay";
	        $this->notify_url   = str_replace( 'https:', 'http:', add_query_arg( 'wc-api', 'WC_Gateway_TargetPay', home_url( '/' ) ) );

			// Load the settings.
			$this->init_form_fields();
			$this->init_settings();

			$this->rtlo	 		= $this->get_option( 'rtlo' );
			$this->testmode		= $this->get_option( 'testmode' );

			add_action('woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
			add_action('woocommerce_api_wc_gateway_targetpay', array( $this, 'check_ipn_response' ) );
            add_filter('woocommerce_payment_gateways', array($this, 'addGateway'));

			if ( !$this->is_valid_for_use() ) $this->enabled = false;
		    }

	    function is_valid_for_use() {
	        if ( ! in_array( get_woocommerce_currency(), apply_filters( 'woocommerce_targetpay_supported_currencies', array( 'EUR' ) ) ) ) return false;
	        return true;
		    }

		public function admin_options() {
	    	if ($this->is_valid_for_use()) {
				echo "<table class=\"form-table\">
						<div style=\"margin: 3px 0 3px 0; padding: 7px 0 12px 0; width: 100%; border-style: none none solid none; border-width: 1px; border-color: #ccc\">
        	        		<div style=\"margin: 0 25px 0 0\"><img src=\"".plugins_url('', __FILE__)."/images/admin_header.png\"></div>
                		</div>";
    			$this->generate_settings_html();
                echo "</table>";
                } else {
                echo "<div class=\"inline error\"><p><strong><?php _e( 'Gateway Disabled', 'woocommerce' ); ?></strong>: <?php _e( 'TargetPay does not support your store currency.', 'woocommerce' ); ?></p></div>";
                }
			}

	    function init_form_fields() {
	    	$this->form_fields = array(
				'rtlo' => array(
								'title' =>			__( 'TargetPay layoutcode', 'targetpay' ),
								'type' => 			'text',
								'description' =>	__( 'Your TargetPay layoutcode (rtlo). This was given in the registration process '.
                                					 	'or you can find it on TargetPay.com under <a href="https://www.targetpay.com/subaccounts" target="_blank">My account > Subaccounts</a>', 'targetpay' ),
								'default' => 		'102749', // Layoutcode from account 'ideavis'
								'desc_tip' => 		false,
								'placeholder' =>	'Layoutcode'
							),
				'testmode' => array(
								'title' => 			__( 'Test mode', 'targetpay' ),
								'type' => 			'checkbox',
								'label' => 			__( 'Enable testmode', 'targetpay' ),
								'default' => 		'no',
								'description' => 	sprintf( __( 'Enable testmode, all orders will then be accepted even if unpaid/cancelled.', 'woocommerce' ), 'targetpay' ),
							)
				);
			}

        public function addGateway($methods) {
            $methods[] = 'WC_Gateway_TargetPay';
            $methods[] = 'WC_Gateway_TargetPay_PaymentMethod_iDEAL';
            $methods[] = 'WC_Gateway_TargetPay_PaymentMethod_MisterCash';
            $methods[] = 'WC_Gateway_TargetPay_PaymentMethod_Sofort';
            return $methods;
	        }

		function check_ipn_response() {
			global $woocommerce;
            @ob_clean();

            list ($payMethod, $order_id) = explode("-", $_REQUEST["tx"], 2);

			$targetPay = new TargetPayCore ($payMethod, $_REQUEST["rtlo"], "ef96dc7014cfff1a73a743e6dd8cb692", "nl", ($this->settings["testmode"]=="yes") ? 1 : 0);
		    $result = $targetPay->checkPayment ($_REQUEST["trxid"]);

            if ($result) {
	            $order = new WC_Order( $order_id );
                if ($order->status != 'completed')	{
					$order->add_order_note( __( 'Payment completed', 'woocommerce' ) );
					$order->payment_complete();
                    }
                } else {
				$order->add_order_note(__('Payment error:', 'woocommerce'));
                $woocommerce->add_error(__('Payment error:',  'woothemes') . $targetPay->getErrorMessage());
                $order->cancel_order();
                return;
                }
			}
	}


    class WC_Gateway_TargetPay_Main extends WC_Payment_Gateway {
        public function __construct() {
            $this->id				  = "TargetPay_{$this->payMethodId}";
	        $this->icon       		  = plugins_url('', __FILE__) . '/images/'. $this->payMethodId.'_24.png';
            $this->method_title 	  = "{$this->payMethodName}";
            $this->paymentMethodCode  = $this->payMethodId;
            add_action ("woocommerce_update_options_payment_gateways_{$this->id}", array($this, 'process_admin_options'));
            $this->form_fields = array(
	                'stepone' => array(
	                    'title' => $this->method_title.' settings',
	                    'type' => 'title'
		                ),
	                'enabled' => array(
	                    'title' => __('Active', 'targetpay'),
	                    'type' => 'checkbox',
	                    'label' => ' '
		                ),
		            );
            $this->init_settings();
			$this->title = $this->payMethodName;
	        }

        public function admin_options() {
            ob_start();
            $this->generate_settings_html();
            $settings = ob_get_contents();
            ob_end_clean();
            $template =
				'<table class="form-table">
                 <div style="margin: 3px 0 3px 0; padding: 7px 0 12px 0; width: 100%; border-style: none none solid none; border-width: 1px; border-color: #ccc">
                	<div style="margin: 0 25px 0 0; float: left">
                    <img src="'.plugins_url('', __FILE__).'/images/admin_header.png">
                    </div>
                	<div style="margin: 0">
                    <img src="'.plugins_url('', __FILE__).'/images/'.$this->payMethodId.'_60.png">
                    </div>
                </div>'.
                $settings.
                '</table>';
            echo $template;
	        }

        public function process_payment($order_id) {
            global $woocommerce;

            $order = new WC_Order($order_id);
            $orderID = $order->id;
            $this->parentSettings = get_option('woocommerce_targetpay_settings', null);

			$targetPay = new TargetPayCore ($this->payMethodId, $this->parentSettings["rtlo"],  "ef96dc7014cfff1a73a743e6dd8cb692", "nl", ($this->parentSettings["testmode"]=="yes"));
		    $targetPay->setAmount (round ($order->order_total*100));
		    $targetPay->setDescription ('Order Id #'.$order->id);
			$targetPay->setReturnUrl ($this->get_return_url($order));
			$targetPay->setCancelUrl ($order->get_cancel_order_url());

			$tx = $this->payMethodId."-".$order->id;
		    $targetPay->setReportUrl (add_query_arg( 'wc-api', 'WC_Gateway_TargetPay', add_query_arg( 'tx', $tx, home_url( '/' ) ) ) );

		    if (isset($_POST["bank"])) $targetPay->setBankId ($_POST["bank"]);
		    if (isset($_POST["country"])) $targetPay->setCountryId ($_POST["country"]);
            $url = $targetPay->startPayment();

            if (!$url) {
				$message = $targetPay->getErrorMessage();
                $woocommerce->add_error(__('Payment error:', 'woothemes') . ' ' . $message);
                $order = &new WC_Order($orderID);
                $order->add_order_note("Payment could not be started: {$message}");
                return false;
                } else {
	            return array(
	                'result' => 'success',
	                'redirect' => $url
	            	);
                }
	        }
		}

    // Backwards compatibility

	class WC_TargetPay extends WC_Gateway_TargetPay {
		public function __construct() {
			_deprecated_function( 'WC_TargetPay', '1.4', 'WC_Gateway_TargetPay' );
			parent::__construct();
			}
		}

    // Payment method 1: iDEAL

	class WC_Gateway_TargetPay_PaymentMethod_iDEAL extends WC_Gateway_TargetPay_Main {
	    protected $payMethodId = "IDE";
	    protected $payMethodName = "iDEAL";
        public $enabled = true;

		public function __construct() {
			if( !class_exists( 'WP_Http' ) )
			    include_once( ABSPATH . WPINC. '/class-http.php' );

			$targetPay = new TargetPayCore ("IDE");
            $banks = false;
            $temp = $targetPay->getBankList();
            foreach ($temp as $key=>$value) {
            	$banks .= '<option value="'.$key.'">'.$value.'</option>';
                }

    	    $this->description = '<select name="bank" style="width:170px; padding: 2px; margin-left: 7px">'.$banks.'</select>';
			parent::__construct();
			}
		}

    // Payment method 2: Mister Cash

	class WC_Gateway_TargetPay_PaymentMethod_MisterCash extends WC_Gateway_TargetPay_Main {
	    protected $payMethodId = "MRC";
	    protected $payMethodName = "Mister Cash";
        public	  $enabled = true;
        public	  $description = 'Bancontact/Mister Cash';
		}

    // Payment method 3: Sofort Banking

	class WC_Gateway_TargetPay_PaymentMethod_Sofort extends WC_Gateway_TargetPay_Main {
	    protected $payMethodId = "DEB";
	    protected $payMethodName = "Sofort Banking";
        public	  $enabled = true;
        public	  $description = '<select name="country" style="width:220px; padding: 2px; margin-left: 7px">
                                  <option selected>Choose country of your bank...</option>
                            	  <option value="49">Deutschland</option>
                                  <option value="43">&Ouml;sterreich</option>
                                  <option value="41">Schweiz</option>
                            	  </select>';
		}

	new WC_Gateway_TargetPay();
	}
