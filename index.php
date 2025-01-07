<?php
$apiHost = "http://localhost:3000";
$authorizeServerUrl = $apiHost . "/rest/authorizeserver.php";
$getDataUrl = $apiHost . "/rest/getData.php";
?>

<html>

<head>
    <script type="text/javascript" src="https://cdn.boldbi.com/embedded-sdk/latest/boldbi-embed.js"></script>
</head>

<body onload="Init();">
    <div id="dashboard"></div>
    <script>
        async function Init() {
            try {
                // Fetch data from the PHP backend
                const response = await fetch('<?php echo $getDataUrl; ?>');
                console.log("Response ", response);
                // Check if the response is okay
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }

                // Parse the JSON data
                const data = await response.json();
                // Call the function to render the dashboard with the fetched data
                renderDashboard(data);
            } catch (error) {
                console.error("Error fetching the embed configuration:", error);
            }
        }

        function renderDashboard(data) {
            this.dashboard = BoldBI.create({
                serverUrl: data.ServerUrl + "/" + data.SiteIdentifier,
                dashboardId: data.DashboardId,
                embedContainerId: "dashboard",
                width: "100%",
                height: window.innerHeight + 'px',
                authorizationServer: {
                    url: '<?php echo $authorizeServerUrl; ?>'
                }
            });

            this.dashboard.loadDashboard();
        }
    </script>
</body>

</html>