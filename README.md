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
> **NOTE:** In Visual studio code download the extensions, PHP intelephense and PHP Server.

## Configuration

* Please ensure you have enabled embed authentication on the `embed settings` page. If it is not currently enabled, please refer to the following image or detailed [instructions](https://help.boldbi.com/site-administration/embed-settings/#get-embed-secret-code) to enable it.

    ![Embed Settings](/images/enable-embedsecretkey.png)

* To download the `embedConfig.json` file, please follow this [link](https://help.boldbi.com/site-administration/embed-settings/#get-embed-configuration-file) for reference. Additionally, you can refer to the following image for visual guidance.

    ![Embed Settings Download](/images/download-embedsecretkey.png)
    ![EmbedConfig Properties](/images/embedconfig-file.png)

* Copy the downloaded `embedConfig.json` file and paste it into the designated [location](https://github.com/boldbi/php-sample/tree/master/rest) within the application. Please ensure you have placed it in the application, as shown in the following image.

    ![php-embedconfig](/images/embedconfig-location.png)

## Run a PHP Sample
 
 * Open the PHP sample in Visual Studio Code or any respective IDE.
 
 * Ensure whether embedConfig file is located in following location, `rest/embedConfig.json` and run the PHP application using the respective IDE or using visual studio code.

 * Right-click the `index.php` file and select `PHP Server: Serve project`.

   ![php server](/images/php-server-run.png)

 * After that application has started, it will display a URL in the command line interface, typically something like (e.g., http://localhost:3000/). Copy this URL and paste it into your default web browser.

   ![dashboard image](/images/dashboard.png)
   
Please refer to the [help documentation](https://help.boldbi.com/embedded-bi/javascript-based/samples/v3.3.40-or-later/php-with-javascript/#how-to-run-the-sample?utm_source=github&utm_medium=backlinks) to know how to run the sample.

## Online Demos

Look at the Bold BI Embedding sample to live demo [here](https://samples.boldbi.com/embed?utm_source=github&utm_medium=backlinks).

## Documentation

A complete Bold BI Embedding documentation can be found on [Bold BI Embedding Help](https://help.boldbi.com/embedded-bi/javascript-based/?utm_source=github&utm_medium=backlinks).
