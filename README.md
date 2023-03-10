# BoldBI Embedding PHP Sample

 This Bold BI PHP sample repository contains the Dashboard embedding sample. This sample demonstrates how to embed the dashboard which is available in your Bold BI server.

This section guides you in using the Bold BI dashboard in your PHP sample application.

 * [Requirements to run the demo](#requirements-to-run-the-demo)
 * [Using the PHP sample](#using-the-php-sample)
 * [Online Demos](#online-demos)
 * [Documentation](#documentation)
 
## Requirements to run the demo

The samples require the following requirements to run.

 * [PHP installer](https://windows.php.net/download/)
 * [Visual Studio Code](https://code.visualstudio.com/download)
 * In Visual studio code download the extensions, PHP intelephense and PHP Server.

 ## Using the PHP sample
 
 * Open the PHP sample's file `index.php` in Visual studio code or any IDE which supports PHP. 

 * Please change the following properties in the `index.php` file as per your Bold BI Server.

    <meta charset="utf-8"/>
    <table>
    <tbody>
        <tr>
            <td align="left">serverUrl</td>
            <td align="left">Dashboard Server BI URL. For Enterprise Edition it should be like - http://localhost:5000/bi/site/site1 and for Cloud it should be like - http://dashboard.syncfusion.com/bi.</td>
        </tr>
        <tr>
            <td align="left">dashboardId</td>
            <td align="left">Dashboard id of the dashboard you want to embed here.</td>
        </tr>
        <tr>
            <td align="left">authorizeServerUrl</td>
            <td align="left">URL pointing to AuthorizeServer API . We have running PHP sample in 8080 port. Ex: http://localhost:8080/rest/authorizeserver.php.</td>
        </tr>
    </tbody>
    </table>


* Open the `authorizeserver.php` file and provide the value for below described properties as per your Bold BI server.

    <meta charset="utf-8"/>
    <table>
    <tbody>
        <tr>
            <td align="left">secretCode</td>
            <td align="left">Get your EmbedSecret key from the Embed tab by enabling the `Enable embed authentication` on the Administration page https://help.boldbi.com/embedded-bi/site-administration/embed-settings/.</td>
        </tr>
        <tr>
            <td align="left">userEmail</td>
            <td align="left">UserEmail of the Admin in your Bold BI, which would be used to get the dashboard list.</td>
        </tr>
    </tbody>
    </table>

* Now run the PHP sample to render the particular dashboard.

Please refer to the [help documentation](https://help.boldbi.com/embedded-bi/javascript-based/samples/v3.3.40-or-later/php-with-javascript/#how-to-run-the-sample) to know how to run the sample.

## Online Demos

Look at the Bold BI Embedding sample to live demo [here](https://samples.boldbi.com/embed).


## Documentation

A complete Bold BI Embedding documentation can be found on [Bold BI Embedding Help](https://help.boldbi.com/embedded-bi/javascript-based/).

