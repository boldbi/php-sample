
<?php
// ServerURL, DashboardPath and AuthorizeSeverURL to embed widget 
$serverUrl = "http://localhost:49721/bi/site/site1";
$dashboardId ="b3609bfd-51f8-4acf-b1d0-21c0af5b5401";
$authorizeServerUrl = "http://localhost:3000/rest/authorizeserver.php";
?>

<html>
<head>
<script type="text/javascript" src="https://cdn.boldbi.com/embedded-sdk/latest/boldbi-embed.js"></script>
</head>
<body onload="embedSample();">
<div id="dashboard"></div>
    <script>
        function embedSample() {
            var dashboardemb = BoldBI.create({
                serverUrl: '<?php echo $serverUrl;?>',
                dashboardId: '<?php echo $dashboardId;?>',
                embedContainerId: "dashboard",// This should be the container id where you want to embed the widget1
                embedType: BoldBI.EmbedType.Component,
                environment: BoldBI.Environment.Enterprise,
                height: "700px",
                width: "1500px",
                authorizationServer: {
                    url: '<?php echo $authorizeServerUrl;?>'
                },
                expirationTime: "100000",
            });
            dashboardemb.loadDashboard();
        }
    </script>
</body>
</html>



