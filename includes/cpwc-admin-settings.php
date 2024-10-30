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
                            <label for="data-id"><?php _e('Coin', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <select id="data-id" name="data-id">
                                <option value="bitcoin" selected>BTC</option>
                            </select>
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
                            <label for="data-rank"><?php _e('Include Rank', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <select name="data-rank" id="data-rank">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
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
                            <label for="data-d7"><?php _e('7D Change', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <select name="data-d7" id="data-d7">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-vol"><?php _e('Include Volume', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <select name="data-vol" id="data-vol">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
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
                            <label for="data-tcolor"><?php _e('Text Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-tcolor" name="data-tcolor" type="text" value="#333" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-ccolor"><?php _e('Coin Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-ccolor" name="data-ccolor" type="text" value="#333" class="color-field">
                            <input type="button" name="random-color" class="button button-primary" value="<?php _e('Random color', 'crypto-price-widgets-coinlore'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="cpwc-row">
                            <label for="data-pcolor"><?php _e('Price Color', 'crypto-price-widgets-coinlore'); ?></label>
                        </th>
                        <td>
                            <input id="data-pcolor" name="data-pcolor" type="text" value="#333" class="color-field">
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
        jQuery('select[name="data-id"]').select2({
            ajax: {
                url: 'https://api.coinlore.net/api/coins-widget/',
                dataType: 'json',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function (response, params) {
                    return {
                        results: response.data
                    };
                },
            },
            minimumInputLength: 2,
            placeholder: 'BTC',
            width: "100%",
            templateResult: function(data) {
                return data.symbol;
            },
            templateSelection: function(e) {
                ws();
                return e.name
            }
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
            var shortCode = '[crypto-price-widgets-coinlore ';
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
            !function(){var t;if(void 0===window.jQuery||"1.4.2"!==window.jQuery.fn.jquery){var e=document.createElement("script");e.setAttribute("type","text/javascript"),e.setAttribute("src","https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"),e.readyState?e.onreadystatechange=function(){"complete"!=this.readyState&&"loaded"!=this.readyState||i()}:e.onload=i,(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(e)}else t=window.jQuery,n();function i(){t=window.jQuery.noConflict(!0),n()}function n(){t(document).ready((function(t){t(".coinlore-coin-widget").each((function(){var e,i,n="",a=0,o=t(this).attr("data-rank"),c=t(this).attr("data-mcap"),d=t(this).attr("data-d7"),r=t(this).attr("data-vol"),s=t(this).attr("data-cwidth"),p=t(this).attr("data-bcolor"),l=t(this).attr("data-tcolor"),h=t(this).attr("data-ccolor"),x=t(this).attr("data-pcolor");t.get("https://widget.coinlore.com/widgets/new-single/?id="+t(this).attr("data-id")+"&cur="+t(this).attr("data-mcurrency"),(function(g){cc='<div style="border-radius: 10px;color:'+l+";background: "+p+";box-shadow: 0 1px 3px 0 #ccc;font-family: Helvetica,Arial,sans-serif;min-width:285px; width:"+s+'">',cc+='<div><div style="float:right;width:67%;border: none;text-align:left;padding:5px 0px;line-height:25px;">',cc+='<span style="font-size: 17px;"><a href="https://www.coinlore.com/coin/'+g[0].nameid+'" target="_blank" style="text-decoration: none; color: '+h+';font-weight: bold">'+g[0].name+'</a><span style="font-size: 10px;padding-left: 5px">'+g[0].symbol+"</span></span>",g[0].percent_change_24h<0?i="#c2220d!important":(i="#8dc647!important",n="+"),cc+='<div style="font-size: 16px;color:'+x+'">'+g[0].price_usd+" "+g[0].mc+' <span style="color:'+i+'">('+n+g[0].percent_change_24h+")</span></div>",cc+='<div style="font-size: 12px; color:#959595">'+g[0].price_btc+" BTC </div>",cc+="</div>",cc+='<div style="text-align:center;padding:5px 0px;width:33%;"><img src="https://c2.coinlore.com/img/'+g[0].nameid+'.png" width="64px" height="64px" style="margin: 0 auto;"></div>',cc+="</div>",cc+='<div style="border-top: 1px solid #e1e5ea;clear:both;">',1==o&&(a+=1),1==c&&(a+=1),1==d&&(a+=1),1==r&&(a+=1),e=100/a,1==o&&(cc+='<div style="text-align:center;float:left;width:'+e+'%;font-size:12px;padding:12px 0;border-right:1px solid #e1e5ea;line-height:1.25em;"><b>Rank</b><br><br><span style="font-size: 17px; ">'+g[0].rank+"</span></div>"),1==c&&(cc+='<div style="text-align:center;float:left;width:'+e+'%;font-size:12px;padding:12px 0 16px 0;border-right:1px solid #e1e5ea;line-height:1.25em;"><b>Market Ca</b>p<br><br> <span style="font-size: 14px; ">'+g[0].market_cap_usd+' <span style="font-size:9px">USD</span></span></div>'),1==r&&(cc+='<div style="text-align:center;float:left;width:'+e+'%;font-size:12px;padding:12px 0 16px 0;line-height:1.25em;border-right:1px solid #e1e5ea;"><b>Vol (24H)</b><br><br> <span style="font-size: 14px; ">'+g[0].t24h_volume_usd+' <span style="font-size:9px">USD</span></span></div>'),n="",g[0].percent_change_7d<0?i="#c2220d!important":(i="#8dc647!important",n="+"),1==d&&(cc+='<div style="text-align:center;float:left;width:'+(e-1)+'%;font-size:12px;padding:12px 0 16px 0;line-height:1.25em;"><b>7D Change</b><br><br> <span style="font-size: 14px;color: '+i+';">'+n+g[0].percent_change_7d+'<span style="font-size:9px">%</span></span></div>'),cc+="</div>",cc+='<div style="background: #f9fafb;box-shadow: 1px 0px 3px 0 #ccc;text-align:center;clear:both;font-size:11px;font-style:italic;padding:5px 0;"><a href="https://www.coinlore.com/" target="_blank" style="text-decoration: none; color: rgb(16, 112, 224);">Powered by CoinLore</a></div>',cc+="</div>",t(".coinlore-coin-widget").css("width",undefined),t(".coinlore-coin-widget").html(cc)}))}))}))}}();
            htmlCode = '<div class="coinlore-coin-widget"';
            htmlCode += (shortCode.substring(1)).substring(0, shortCode.length - 2) + '"></div>';

            shortCode = shortCode.substring(0, shortCode.length - 1) + ']'
            jQuery('#widget-shortcode').val(shortCode);
            jQuery('#widget-htmlcode').html(htmlCode);
        }
        ws();
    });
</script>