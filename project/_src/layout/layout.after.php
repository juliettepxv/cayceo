<!--svg-collection icons-->
<div style="display: none;">
    <?=pov()->svg->import("dist/svg-collection/startup.svg")?>
</div>
<?=cq()->_layoutStuff();?>
<?if(site()->googleAnalyticsId):?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?=site()->googleAnalyticsId?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?=site()->googleAnalyticsId?>');
    </script>
<?endif?>
<?php //hubspot?>
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/7170654.js"></script>

<div class="webpack-time"></div>