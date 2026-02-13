<?php
$apiHost = "http://localhost:3000";
$tokenGenerationUrl = $apiHost . "/rest/tokengeneration.php";
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

        function getEmbedToken() {
            return fetch('<?php echo $tokenGenerationUrl; ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => {
                    if (!response.ok) throw new Error("Token fetch failed");
                    return response.text();
                });
        }

        function renderDashboard(data) {
            getEmbedToken().then(accessToken => {
                var boldbiEmbedInstance = BoldBI.create({
                    serverUrl: data.ServerUrl + "/" + data.SiteIdentifier,
                    dashboardId: data.DashboardId,
                    embedContainerId: "dashboard",
                    embedToken: accessToken
                });
                boldbiEmbedInstance.loadDashboard();
            }).catch(err => {
                console.error("Failed to get embed token:", err);
            });
        }
    </script>
</body>

</html>