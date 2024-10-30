<div class="wrap">
    <h1 class="wp-heading-inline">Ticker Crypto Widget - CoinLore</h1>
    <div class="cpwc-row">
        <div class="col-12 col-lg-6">
            <h2><?php _e('Settings', 'crypto-price-widgets-coinlore'); ?></h2>
            <form id="widget-settings">
                <table class="form-table">
                    <tbody>
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
                            <label for="data-bcolor"><?php _e('1st Background Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-bcolor" name="data-bcolor" type="text" value="#fff" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-scolor"><?php _e('Symbol Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-scolor" name="data-scolor" type="text" value="#333" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-ccolor"><?php _e('Coin Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-ccolor" name="data-ccolor" type="text" value="#428bca" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-pcolor"><?php _e('Price Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-pcolor" name="data-pcolor" type="text" value="#428bca" class="color-field">
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
            var shortCode = '[crypto-price-widgets-coinlore-ticker ';
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
            !function(){var e;if(void 0===window.jQuery||"1.4.2"!==window.jQuery.fn.jquery){var t=document.createElement("script");t.setAttribute("type","text/javascript"),t.setAttribute("src","https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"),t.readyState?t.onreadystatechange=function(){"complete"!=this.readyState&&"loaded"!=this.readyState||n()}:t.onload=n,(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(t)}else e=window.jQuery,i();function n(){e=window.jQuery.noConflict(!0),i()}function i(){e(document).ready((function(e){var t,n="",i="",a="",o="";e(".coinlore-priceticker-widget").each((function(){i=e(this).attr("data-bcolor"),o=e(this).attr("data-pcolor"),a=e(this).attr("data-ccolor"),scolor=e(this).attr("data-scolor"),e.get("https://widget.coinlore.com/widgets/top-list/?top="+e(this).attr("data-top")+"&cur="+e(this).attr("data-mcurrency"),(function(c){cc="<style>.marqueecoinlore{width:100%;margin:0 auto;overflow:hidden;white-space:nowrap;box-sizing:border-box;animation:marquee 50s linear infinite}.marqueecoinlore:hover{animation-play-state:paused}@keyframes marquee{0%{text-indent:27.5em}100%{text-indent:-105em}}</style>",cc+='<div style="color: #333;background: '+i+';box-shadow: 0 1px 3px 0 #ccc;font-family: Helvetica,Arial,sans-serif;min-width: 300px;width: 100%;line-height: 35px;font-size: 16px;">',cc+='<div class="marqueecoinlore">',c.forEach((function(e){n="",e.percent_change_24h<0?t="#c2220d!important":(t="#8dc647!important",n="+"),cc+='<a style="padding-left: 10px;padding-right: 10px;" href="https://www.coinlore.com/coin/'+e.nameid+'" title="'+e.name+" "+e.symbol+' Coin Price" target="_blank">\n<img style="vertical-align: sub; border-style: none;padding:2px;-webkit-box-align: center; -ms-flex-align: center; align-items: center;width: 20px;height: 20px;" src="https://c1.coinlore.com/img/20x20/'+e.nameid+'.png">\n<span style="color: '+a+'">'+e.name+'</span> <span style="color: '+scolor+'">('+e.symbol+')</span>\n<span style="color: '+o+';">'+e.price_usd+'<span style="font-size: 10px">'+e.mc+'</span></span><span style="color:'+t+'"> ('+n+e.percent_change_24h+"%) </span>\n</a>"})),cc+="</div>",cc+="</div>",e(".coinlore-priceticker-widget").css("width",undefined),e(".coinlore-priceticker-widget").html(cc)}))}))}))}}();
            htmlCode = '<div class="coinlore-priceticker-widget"';
            htmlCode += (shortCode.substring(1)).substring(0, shortCode.length - 2) + '"></div>';

            shortCode = shortCode.substring(0, shortCode.length - 1) + ']'
            jQuery('#widget-shortcode').val(shortCode);
            jQuery('#widget-htmlcode').html(htmlCode);
        }
        ws();
    });
</script>