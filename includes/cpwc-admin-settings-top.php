<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo CPWC_NAME; ?></h1>
    <div class="cpwc-row">
        <div class="col-12 col-lg-6">
            <h2><?php _e('Settings', 'crypto-price-widgets-coinlore'); ?></h2>
            <form id="widget-settings">
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-top"><?php _e('Top', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-top" name="data-top" value="10" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-mcurrency"><?php _e('Fiat', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <select id="data-mcurrency" name="data-mcurrency"></select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-width"><?php _e('Width', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-width" name="data-width" value="100%" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-mcap"><?php _e('Market Cap', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <select name="data-mcap" id="data-mcap">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-bcolor"><?php _e('Text Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-bcolor" name="data-bcolor" type="text" value="#fff" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-coincolor"><?php _e('Coin Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-coincolor" name="data-coincolor" type="text" value="#428bca" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-pricecolor"><?php _e('Price Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-pricecolor" name="data-pricecolor" type="text" value="#4c4c4c" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-12 col-lg-6" id="widget-htmlcode" >

        </div>
    </div>
    <hr>
    <div class="cpwc-row">
        <div class="col-12 col-lg-6">
            <h3><?php _e('Shortcode', 'crypto-price-widgets-coinlore'); ?></h3>
            <?php wp_editor('', 'widget-shortcode', [
                'wpautop' => 1,
                'media_buttons' => 0,
                'textarea_name' => '',
                'textarea_rows' => 4,
                'tabindex' => null,
                'teeny' => 0,
                'dfw' => 0,
                'tinymce' => 0,
                'quicktags' => 0,
                'drag_drop_upload' => false,
            ]); ?>
        </div>
        <div class="col-12 col-lg-auto">
            <h3><?php _e('Help', 'crypto-price-widgets-coinlore'); ?></h3>
            <ul>
                <li>ℹ️ <?php _e('Official website', 'crypto-price-widgets-coinlore'); ?>: <a href="https://www.coinlore.com/" target="_blank">CoinLore</a></li>
                <li>❓ <?php _e('Feel free, write if you will have any questions', 'crypto-price-widgets-coinlore'); ?>: <a href="https://t.me/coinloremax" target="_blank"><?php _e('Online support', 'crypto-price-widgets-coinlore'); ?></a></li>
            </ul>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery.fn.removeAttributes = function() {
            return this.each(function() {
                var attributes = jQuery.map(this.attributes, function(item) {
                    return item.name;
                });
                var img = jQuery(this);
                jQuery.each(attributes, function(i, item) {
                    img.removeAttr(item);
                });
            });
        }

        jQuery('input[name="random-color"]').on('click', function() {
            var newColor = getRandomColor();
            jQuery('input[name="background-color"]').val(newColor);
            ws();
        });
        jQuery('input[class="checkbox-options"]').on('change', function() {
            ws();
        });
        jQuery('input[name="decimal-places"], input[name="amount"]').on('input', function() {
            ws();
        });
        jQuery('input[name="border-radius"]').on('input', function() {
            var val = ((3 / 100) * this.value).toFixed(2);
            var valRem = val + 'rem';
            jQuery('#border-radius-value').text('(' + valRem + ')');
            ws();
        });
        jQuery('select').on('change', function() {
            ws();
        });
        jQuery('.color-field').wpColorPicker({
            defaultColor: !1,
            change: function(t, e) {
                jQuery('input[name="background-color"]').val(jQuery(this).iris("color", !0).toCSS("hex"));
                ws();
            },
            clear: function() {},
            hide: !0,
            palettes: ["#383a59", "#414770", "#4D5382", "#0000FF", "#007BFF", "#6610F2", "#5F00BA", "#6F42C1", "#E83E8C", "#DC3545", "#FD7E14", "#FFC107",
                "#28A745", "#20C997", "#17A2B8", "#6C757D", "#343A40", "#F8F9FA", "#343A40",
                "#FFFFFF", "#333333"
            ]
        });
        jQuery('select[name="data-mcurrency"]').select2({
            placeholder: 'USD',
            width: "100%",
            data: [{"id":"USD","text":"USD"},{"id":"BGN","text":"BGN"},{"id":"BRL","text":"BRL"},{"id":"CAD","text":"CAD"},{"id":"CHF","text":"CHF"},{"id":"CLP","text":"CLP"},{"id":"CNY","text":"CNY"},{"id":"CZK","text":"CZK"},{"id":"DKK","text":"DKK"},{"id":"EUR","text":"EUR"},{"id":"GBP","text":"GBP"},{"id":"GEL","text":"GEL"},{"id":"HKD","text":"HKD"},{"id":"HRK","text":"HRK"},{"id":"HUF","text":"HUF"},{"id":"IDR","text":"IDR"},{"id":"NIS","text":"NIS"},{"id":"INR","text":"INR"},{"id":"JPY","text":"JPY"},{"id":"KRW","text":"KRW"},{"id":"MXN","text":"MXN"},{"id":"MYR","text":"MYR"},{"id":"NGN","text":"NGN"},{"id":"NOK","text":"NOK"},{"id":"NZD","text":"NZD"},{"id":"PHP","text":"PHP"},{"id":"PKR","text":"PKR"},{"id":"PLN","text":"PLN"},{"id":"RUB","text":"RUB"},{"id":"SEK","text":"SEK"},{"id":"SGD","text":"SGD"},{"id":"THB","text":"THB"},{"id":"TRY","text":"TRY"},{"id":"UAH","text":"UAH"},{"id":"VEF","text":"VEF"},{"id":"VND","text":"VND"},{"id":"ZAR","text":"ZAR"},{"id":"AUD","text":"AUD"}],
            templateSelection: function(e) {
                ws();
                return e.text
            }
        }).val('USD').trigger('change');

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function ws() {
            var serializeData = jQuery("form#widget-settings").serializeArray();
            jQuery('crypto-price-widgets-coinlore').removeAttributes();
            var shortCode = '[crypto-price-widgets-coinlore-top ';
            for(val in serializeData) {
                var attrValue = serializeData[val].value

                if (serializeData[val].name === 'live' || serializeData[val].name === 'shadow') {
                    attrValue = true;
                } else if (serializeData[val].name === 'border-radius') {
                    var _val = ((3 / 100) * parseInt(serializeData[val].value));
                    var attrValue = _val.toFixed(2) + 'rem';
                }

                if (serializeData[val] !== undefined) {
                    if (serializeData[val].name !== 'signature') {
                        jQuery('crypto-price-widgets-coinlore').attr(serializeData[val].name, attrValue);
                    }
                    var y = serializeData[val].name + '="' + attrValue + '" ';
                }
                shortCode += y;
            }
            !function(){var t;if(void 0===window.jQuery||"1.4.2"!==window.jQuery.fn.jquery){var e=document.createElement("script");e.setAttribute("type","text/javascript"),e.setAttribute("src","https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"),e.readyState?e.onreadystatechange=function(){"complete"!=this.readyState&&"loaded"!=this.readyState||o()}:e.onload=o,(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(e)}else t=window.jQuery,a();function o(){t=window.jQuery.noConflict(!0),a()}function a(){t(document).ready(function(t){var e,o,a="",i="",r="",n="",c="",d="",s="";t(".coinlore-list-widget").each(function(){r=t(this).attr("data-bcolor"),c=t(this).attr("data-pricecolor"),n=t(this).attr("data-coincolor"),d=t(this).attr("data-mcap"),t.get("https://widget.coinlore.com/widgets/top-list/?top="+t(this).attr("data-top")+"&cur="+t(this).attr("data-mcurrency"),function(p){cc='<table width="100%" style="border-radius: 10px;font-family: sans-serif;box-shadow: 0 1px 3px 0 #b0b0b0;background:'+r+'">',p.forEach(function(t){cc+="<tr>",cc+='<td style="text-align: left;padding: 5px;border-bottom: 1px solid #c0c0c05c;height: 20px;"><img src="https://c1.coinlore.com/img/20x20/'+t.nameid+'.png"> <a href="https://www.coinlore.com/coin/'+t.nameid+'" style="font-weight: 700;font-size: 16px;margin: 0;overflow-x: hidden;color:'+n+';text-decoration: none;background-color: transparent;">'+t.name+"</a></td>",1==d&&(cc+='<td style="text-align: center;padding: 5px;border-bottom: 1px solid #c0c0c05c;height: 20px;color:'+c+';white-space: nowrap;font-weight: 700;padding: 5px;border-bottom: 1px solid #c0c0c05c;height: 20px;">'+t.market_cap_usd+"</td>"),cc+='<td style="color:'+c+';white-space: nowrap;font-weight: 700;text-align: right;padding: 5px;border-bottom: 1px solid #c0c0c05c;height: 20px;">'+t.price_usd,a="",t.percent_change_24h<0?o="#c2220d!important":(o="#8dc647!important",a="+"),cc+='(<span style="font-weight: 300;color:'+o+'">'+a+t.percent_change_24h+"%</span>)",cc+="</td>",cc+="</tr>",i=t.mc}),1==d&&(s="<td></td>"),cc+='<tr style="background: #f9fafb;"><td><span style="font-weight: 300;font-size: 12px">Price in '+i+"</span></td>"+s+'<td style="text-align: right"><a href="https://www.coinlore.com" style="color: #428bca;font-size: 14px;text-decoration: none;">Powered By CoinLore</a></td></tr>',cc+="</table>",t(".coinlore-list-widget").css("width",e),t(".coinlore-list-widget").html(cc)}),e=t(this).attr("data-cwidth")>0?160>t(this).attr("data-cwidth")?"160px":t(this).attr("data-cwidth")+"px":"100%"})})}}();
            htmlCode = '<div class="coinlore-list-widget"';
            htmlCode += (shortCode.substring(1)).substring(0, shortCode.length - 2) + '"></div>';

            shortCode = shortCode.substring(0, shortCode.length - 1) + ']'
            jQuery('#widget-shortcode').val(shortCode);
            jQuery('#widget-htmlcode').html(htmlCode);
        }
        ws();
    });
</script>