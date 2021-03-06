<?php
$bgLayoutColor=site()->themeColor;
$fgLayoutColor=site()->themeColorNegative;
$bgBodyColor="#FFFFFF";
$fgBodyColor="#222222";

?>
<head>
    <style>
        /* Some resets and issue fixes */
        #outlook a { padding:0; }
        body{ width:100% !important; -webkit-text; size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; }
        .ReadMsgBody { width: 100%; }
        .ExternalClass {width:100%;}
        .backgroundTable {margin:0 auto; padding:0; width:100%;!important;}
        table td {border-collapse: collapse;}
        .ExternalClass * {line-height: 115%;}
        /* End reset */
    </style>
</head>
<body style="padding:0; margin:0">
<table style="background-color: <?=$bgLayoutColor?>; border-radius: 4px; padding:5px; width: 100%; font-family: 'Muli', 'Helvetica', 'Arial', sans-serif;">
    <?//-------header--------------------?>
    <tr>
        <td style="text-align: center;padding-bottom: 10px;padding-top: 15px;">
            <a href="<?=site()->homePage()->href()->absolute()?>">
                <img width=" 150px" src="<?=the()->fileSystem->filesystemToHttp("project/_src/emails/logo.png",true)?>">
            </a>
        </td>
    </tr>
    <tr style="">
        <td style="padding: 5px;" align="center">
            <table style="min-height: 200px; max-width: 600px !important;background-color: <?=$bgBodyColor?>;border-radius: 8px;">
                <tr>
                    <td style="padding: 30px;color: <?=$fgBodyColor?>;">
                        <?=$view->insideContent?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <?//-------footer--------------------?>
    <tr>
        <td style="color: <?=$fgLayoutColor?>; text-align: center; font-size: 10px; padding: 30px;">
            <a style="color: <?=$fgLayoutColor?>;" href="<?=site()->homePage()->href()->absolute()?>">
                <?=site()->projectName?>
            </a>
        </td>
    </tr>
</table>
</body>

