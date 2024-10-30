<?php

/**
 * @version 1.2
 */

/*
Plugin Name: Crypto Price Ticker - CoinLore
Plugin URI: https://www.coinlore.com/crypto-widgets
Description: Crypto price ticker widgets for wordpress.
Version: 1.2
Author: coinlore
Author URI: https://www.coinlore.com/
License: GPL2
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


define('CPWC_NAME', 'Crypto Price Widgets - CoinLore');
define('CPWC_PATH', plugin_dir_path(__FILE__));
define('CPWC_URL', plugin_dir_url(__FILE__));
define('CPWC_PLUGIN_SLUG', 'crypto-price-widgets-coinlore');

class CPWC_crypto_price_widgets
{
    protected static $_instance = null;

    public static function get_instance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct()
    {
        add_shortcode(CPWC_PLUGIN_SLUG, [$this, 'CPWC_shortcode']);
        add_shortcode('crypto-price-widgets-coinlore-ticker', [$this, 'CPWC_shortcode_ticker']);
        add_shortcode('crypto-price-widgets-coinlore-top', [$this, 'CPWC_shortcode_top']);
        add_action('admin_menu', [$this, 'CPWC_add_plugin_page']);
        add_action('admin_enqueue_scripts', [$this, 'CPWC_admin_settins_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'CPWC_admin_settins_styles']);
        add_filter('plugin_action_links', [$this, 'CPWC_plugin_action_links'], 10, 2);
    }
    public function CPWC_shortcode($attr)
    {
        $js_object = '';
        $output = '';

        foreach ($attr as $key => $value) {
            $js_object .= $key.'="'.$value.'" ';
        }

        $js_object = substr($js_object, 0, -1);

        $js_source = wp_enqueue_script('new-widget', "https://widget.coinlore.com/widgets/new-widget.js", '1.0');

        $output = $js_source.'<div class="coinlore-coin-widget" '.$js_object.'></div>';

        return $output;
    }
    public function CPWC_shortcode_ticker($attr)
    {
        $js_object = '';
        $output = '';

        foreach ($attr as $key => $value) {
            $js_object .= $key.'="'.$value.'" ';
        }

        $js_object = substr($js_object, 0, -1);

        $js_source = wp_enqueue_script('ticket-widget', "https://widget.coinlore.com/widgets/ticker-widget.js", '1.0');

        $output = $js_source.'<div class="coinlore-priceticker-widget" '.$js_object.'></div>';

        return $output;
    }
    public function CPWC_shortcode_top($attr)
    {
        $js_object = '';
        $output = '';

        foreach ($attr as $key => $value) {
            $js_object .= $key.'="'.$value.'" ';
        }

        $js_object = substr($js_object, 0, -1);

        $js_source = wp_enqueue_script('list-widget', "https://widget.coinlore.com/widgets/coinlore-list-widget.js", '1.0');

        $output = $js_source.'<div class="coinlore-list-widget" '.$js_object.'></div>';

        return $output;
    }

    public function CPWC_plugin_action_links($links, $file)
    {
        if ($file == plugin_basename(CPWC_PATH.'/widget_init.php')) {
            $links[] = '<a href="'.admin_url('admin.php?page='.CPWC_PLUGIN_SLUG).'">'.__('Settings', 'crypto-price-widgets-coinlore').'</a>';
        }

        return $links;
    }

    /**
     * options page.
     */
    public function CPWC_add_plugin_page()
    {
        add_menu_page(
            'Price Widgets Manage',
            'Price Widgets',
            'manage_options',
            CPWC_PLUGIN_SLUG,
            [$this, 'CPWC_admin_settins_page'],
            'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMTAwLjAwMDAwMHB0IiBoZWlnaHQ9IjEwMC4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDEwMC4wMDAwMDAgMTAwLjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgoKPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMTAwLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIKZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTIyIDQ5MyBsMyAtNDc4IDQ4MCAwIDQ4MCAwIDMgNDc4IDIgNDc3IC00ODUgMCAtNDg1IDAgMiAtNDc3eiBtMzU1CjIxOCBjNDcgLTE2IDU0IC0xNiA2NyAtMiA5IDggMTcgMTMgMjAgMTAgNyAtNyAxMSAtMTM3IDQgLTE0NCAtNCAtNCAtMTQgOAotMjMgMjcgLTUyIDEwMyAtMTQ4IDEzMyAtMjE5IDcwIC0zNiAtMzIgLTU2IC05MyAtNTYgLTE3MyAwIC02NiA0IC04MSAyOQotMTIxIDIwIC0zMSA0NCAtNTIgNzUgLTY4IDY1IC0zMSAxMDUgLTIyIDE2MiAzNyA0OSA1MCA2OSA1MiAzNCA0IC0zNSAtNTAKLTEwMCAtODIgLTE2MyAtODIgLTY2IDAgLTExMSAxOCAtMTU2IDYyIC00NiA0NiAtNjEgODYgLTYxIDE2MSAxIDEwOSA1OCAxOTQKMTUwIDIyMyA1OSAxOCA3NSAxOCAxMzcgLTR6IG0zNTMgMCBjMCAtNSAtMTQgLTExIC0zMCAtMTUgLTQyIC04IC01MCAtMzYgLTUwCi0xNzIgbDAgLTExNCAzNiAwIGMzNSAwIDM1IDAgMjggMzMgLTQgMTcgLTggNDEgLTggNTIgLTEgMTEgLTUgMjYgLTEwIDM0IC03CjExIC01IDEzIDYgOCA5IC0zIDI0IDMgMzQgMTQgMjIgMjQgNTUgMjQgODYgLTEgMTQgLTEwIDI4IC0xNiAzMiAtMTMgNyA3IDAKLTQwIC0xNCAtOTUgbC05IC0zNCA0MSA0IDQwIDQgLTYgLTY1IGMtNCAtMzUgLTkgLTY4IC0xMiAtNzMgLTcgLTEwIC0zODQgLTExCi0zODQgMCAwIDQgMTQgMTIgMzIgMTcgNDQgMTMgNTAgNDUgNDYgMjIxIC0zIDEyMyAtNiAxNDUgLTIyIDE2MyAtMTEgMTIgLTI3CjIxIC0zOCAyMSAtMTAgMCAtMTggNSAtMTggMTAgMCA2IDQzIDEwIDExMCAxMCA2MSAwIDExMCAtNCAxMTAgLTl6Ii8+CjxwYXRoIGQ9Ik03NTYgNTUxIGMtMTkgLTcgLTE5IC04IDMgLTE0IDMwIC04IDU4IDIgMzkgMTQgLTE1IDEwIC0xNyAxMCAtNDIgMHoiLz4KPHBhdGggZD0iTTcyNCA1MTkgYy00IC04IC0zIC05IDUgLTUgNiA0IDE5IDIgMjggLTYgMTQgLTExIDE1IC0xMSAxMSAyIC02IDE5Ci0zNCAyNSAtNDQgOXoiLz4KPHBhdGggZD0iTTc5MiA1MTggYy03IC03IC0xMiAtMjEgLTEyIC0zMiAwIC0xNyAtMiAtMTggLTEwIC02IC04IDEyIC0xMCAxMgotMTAgMSAwIC04IC03IC0xMSAtMjAgLTggLTIzIDYgLTI0IC0xIC0xMCAtMzcgOCAtMjIgMTYgLTI2IDQ5IC0yNiAzOCAwIDQxIDIKNTIgNDEgMTcgNTUgLTggOTggLTM5IDY3eiBtMzYgLTI2IGMyIC0xNCAtMiAtMjIgLTEyIC0yMiAtMTkgMCAtMjkgMTcgLTIyIDM2CjggMjIgMzAgMTIgMzQgLTE0eiIvPgo8cGF0aCBkPSJNODAwIDQ5MCBjMCAtNSA1IC0xMCAxMSAtMTAgNSAwIDcgNSA0IDEwIC0zIDYgLTggMTAgLTExIDEwIC0yIDAgLTQKLTQgLTQgLTEweiIvPgo8cGF0aCBkPSJNNjUwIDM2MiBjMCAtMzUgMTkgLTYxIDQ1IC02MyA3MyAtNyAxMDYgMiAxNDUgMzcgNDcgNDMgNTAgNTQgMTMgNTQKLTE4IDAgLTM1IC0xMCAtNTAgLTI3IGwtMjMgLTI4IC0yNCAyOCBjLTIwIDIxIC0zNCAyNyAtNjYgMjcgLTM3IDAgLTQwIC0yCi00MCAtMjh6Ii8+CjxwYXRoIGQ9Ik03NTcgMzc0IGM1IC0xMyA3IC0xMyAxNCAtMiA3IDEwIDkgMTEgOSAwIDAgLTcgNSAtMTAgMTAgLTcgMTggMTEKMTAgMjUgLTE1IDI1IC0xOCAwIC0yMyAtNCAtMTggLTE2eiIvPgo8L2c+Cjwvc3ZnPgo='
        );
        add_submenu_page(
            CPWC_PLUGIN_SLUG,
            'Ticker Crypto Widget',
            'Ticker Crypto Widget',
            'manage_options',
            'crypto-price-widgets-coinlore-ticker',
            [$this, 'CPWC_admin_settins_page_ticker']
        );
        add_submenu_page(
            CPWC_PLUGIN_SLUG,
            'Top 10 Crypto Widget',
            'Top 10 Crypto Widget',
            'manage_options',
            'crypto-price-widgets-coinlore-top',
            [$this, 'CPWC_admin_settins_page_top']
        );
    }

    public function CPWC_admin_settins_scripts()
    {
        wp_register_script('CPWC-select2', CPWC_URL.'assets/select2/js/select2.min.js', ['jquery-core'], '4.0.13', true);
        wp_register_script('new-widget', "https://widget.coinlore.com/widgets/new-widget.js", '1.0', true);
        wp_register_script('ticket-widget', "https://widget.coinlore.com/widgets/ticker-widget.js", '1.0', true);
        wp_register_script('list-widget', "https://widget.coinlore.com/widgets/coinlore-list-widget.js", '1.0', true);
        wp_enqueue_script('CPWC-select2');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('new-widget');
        wp_enqueue_script('ticket-widget');
        wp_enqueue_script('list-widget');
    }

    public function CPWC_admin_settins_styles()
    {
        wp_register_style('CPWC-select2', CPWC_URL.'assets/select2/css/select2.min.css', null, '4.0.13', 'all');
        wp_enqueue_style('CPWC-select2');
        wp_enqueue_style('CPWC-admin-style');
        wp_enqueue_style('wp-color-picker');

    }

    public function CPWC_admin_settins_page()
    {
        require_once CPWC_PATH.'includes/cpwc-admin-settings.php';
    }
    public function CPWC_admin_settins_page_ticker()
    {
        require_once CPWC_PATH.'includes/cpwc-admin-settings-ticker.php';
    }
    public function CPWC_admin_settins_page_top()
    {
        require_once CPWC_PATH.'includes/cpwc-admin-settings-top.php';
    }
}

$GLOBALS['CPWC_crypto-price-widgets-coinlore'] = CPWC_crypto_price_widgets::get_instance();
