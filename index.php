
<?php
// ServerURL, DashboardPath and AuthorizeSeverURL to embed widget 
$serverUrl = "http://localhost:53623/bi/site/site1";
$dashboardId ="42d69d1a-dcd8-41b0-93a4-d4cdd2c53241";
$authorizeServerUrl = "http://localhost:3000/rest/authorizeserver.php";
?>

<html>
<head>
<script type="text/javascript" src="https://cdn.boldbi.com/embedded-sdk/v6.1.8/boldbi-embed.js"></script>
</head>
<body onload="embedSample();">
<div id="dashboard_container">
   <div id="widget_container1" style="float:left;"></div>
   <div id="widget_container2" style="float:left;"></div>
</div>
    <script>
        function embedSample() {
            var dashboardemb = BoldBI.create({
                serverUrl: '<?php echo $serverUrl;?>',
                dashboardId: '<?php echo $dashboardId;?>',
                embedContainerId: "widget_container1",// This should be the container id where you want to embed the widget1
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



