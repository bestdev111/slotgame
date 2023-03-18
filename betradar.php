
<!DOCTYPE html>

<html data-origin="sportradar">

    <head>
        <title>Live Match Tracker</title>
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name = "viewport" content = "initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <link rel="icon" type="image/x-icon" href="https://cs.sportradar.com/ls/widgets/assets/thebetarena/widgets/images/favicon.ico">

        
        <meta property="og:title" content="Live Sport Centre" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="https://cs.sportradar.com/ls/widgets/assets/thebetarena/widgets/images/lmts/LMT-share-thumbnail.png" />
        <meta property="og:image:width" content="1000" />
        <meta property="og:image:height" content="1000" />

        <link href="https://cs.sportradar.com/ls/widgets/assets/thebetarena/widgets/css/widgets_lmts.css?v=1844735604" type="text/css" rel="stylesheet" />            </head>

    <body class="srw-container  " >
                <div class="lmts-wrapper">
            <div class="lmts-container"></div>
        </div>

        <script
            type="text/javascript"
            data-autoInit="true"
            src="https://cs.sportradar.com/ls/widgets/?/thebetarena/tr/Europe:Berlin/widgetloader/widgets"
            >
        </script>

        <script type="text/javascript">
            SRConfig = {
                client: {
                    layout: 'Live Match Tracker 2.0'
                },
                on: {
                    srlive_initialized : function() {
                        var lmts_first_render = true;
                        var firstMatchlistRender = true;
                        var open = SRjQuery('.srw-container').hasClass('lmts-ml-expanded');
                        var expand_btn = document.querySelector('#expandBtn');
                        var matchlist_container = document.querySelector('#lmts-matchlist-container');

                        var lmtsOptions = {};
                        var lmtsNamespace = 'lmts';

                        //after srlive initialized partial
                        
                                                if (!lmtsOptions.on) {
                            lmtsOptions.on = {};
                        }
                        lmtsOptions.on.postRender = function() {
                            if (lmts_first_render) {
                                if (expand_btn) {
                                    expand_btn.addEventListener('click', function() {
                                        var sportIcon = document.querySelector('.lmts-ml-body .sr-lmts-scoreboard-wraper .sr-scoreboard-head .sr-sport-icon');
                                        var title = document.querySelector('.sr-scoreboard-head .sr-scoreboard-head-title');
                                        if (open) {
                                            SRjQuery('body').removeClass('lmts-ml-expanded');
                                            open = false;
                                        } else {
                                            SRjQuery('body').addClass('lmts-ml-expanded');
                                            open = true;
                                            SRLive.trigger('window_size_changed');
                                        }
                                    });    
                                }    
                                lmts_first_render = 0;

                                
                                
                                                            }
                                                    };
                        
                        lmtsOptions.container = '.lmts-container';
                        
                        var collapse_flag = lmtsOptions.collapse_startCollapsed;
                        
                        if (collapse_flag) {
                            SRjQuery('body').addClass('lmts-ml-collapsed');
                        }

                        // lmts
                        var lmtsHandle = SRLive.addWidget({
                            name: 'widgets.lmts', 
                            config: lmtsOptions
                        });

                        
                        SRLive.addWidget('common.hashmonitor');

                                            }
                }
            };
        </script>
            </body>
</html>