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

    ![Embed Settings](https://github.com/boldbi/aspnet-core-sample/assets/91586758/b3a81978-9eb4-42b2-92bb-d1e2735ab007)

* To download the `embedConfig.json` file, please follow this [link](https://help.boldbi.com/site-administration/embed-settings/#get-embed-configuration-file) for reference. Additionally, you can refer to the following image for visual guidance.

    ![Embed Settings Download](https://github.com/boldbi/aspnet-core-sample/assets/91586758/d27d4cfc-6a3e-4c34-975e-f5f22dea6172)

    ![EmbedConfig Properties](https://github.com/boldbi/aspnet-core-sample/assets/91586758/d6ce925a-0d4c-45d2-817e-24d6d59e0d63)

* Copy the downloaded `embedConfig.json` file and paste it into the designated [location](https://github.com/boldbi/php-sample/tree/master/rest) within the application. Please ensure you have placed it in the application, as shown in the following image.

    ![EmbedConfig image](https://github.com/boldbi/aspnet-core-sample/assets/91586758/95e8e272-53e8-449a-8a46-592cf8646d7c)

## Run a PHP Sample
 
 * Open the PHP sample in visual studio code or any respective IDE.
 
 * Ensure whether embedConfig file is located in following location, `rest/embedConfig.json` and run the PHP application using the respective IDE or using visual studio code.

 * Right-click the `index.php` file and select `PHP Server: Server project`.

Please refer to the [help documentation](https://help.boldbi.com/embedded-bi/javascript-based/samples/v3.3.40-or-later/php-with-javascript/#how-to-run-the-sample?utm_source=github&utm_medium=backlinks) to know how to run the sample.

## Online Demos

Look at the Bold BI Embedding sample to live demo [here](https://samples.boldbi.com/embed?utm_source=github&utm_medium=backlinks).

## Documentation

A complete Bold BI Embedding documentation can be found on [Bold BI Embedding Help](https://help.boldbi.com/embedded-bi/javascript-based/?utm_source=github&utm_medium=backlinks).
