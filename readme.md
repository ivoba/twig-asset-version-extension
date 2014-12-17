# Asset Version Twig Extension

Render versioned asset filenames in twig.  

[![Build Status](https://secure.travis-ci.org/ivoba/twig-asset-version-extension.png?branch=master)](http://travis-ci.org/ivoba/twig-asset-version-extension)

## Install

Use composer:

    require ivoba/twig-asset-version-extension

## Usage
In your twig files:

    <script src="{{ asset_versioned('/dist/js/script.js') }}"></script>

This will render : /dist/js/script.12345.js  

Where *12345* is by default the md5 content digest of the file.  

The **trick** is to leave the file with the original filename: */dist/js/script.js*  
and let the webserver rewrite the url by pattern.  

F.e, for the above pattern and apache mod_rewrite you could use:

    RewriteRule ^dist/(.+)\.(.+)\.(js|css|png|jpg|gif)$ /dist/$1.$3 [L]
    
For nginx:

    location ~* ^.+\.(dist)$ {
            rewrite ^(.+)\.(\d+)\.(dist)$ $1.$3 last;
            expires 31536000s;
    
## Integration

### Silex:
Register the Twig Extension:  

    $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
        $twig->addExtension(new \Ivoba\AssetVersion\Twig\AssetVersionExtension(new \Ivoba\AssetVersion\Version\Md5ContentAssetVersion(),
                                                                               new \Ivoba\AssetVersion\Namer\DefaultNamer(),
                                                                                __DIR__. '/../web'));
        return $twig;
    }));

### Symfony: 
Add this in your services.xml:

    <service id="ivoba_asset_version.version.md5_content"
             class="Ivoba\AssetVersion\Version\Md5ContentAssetVersion">
    </service>
    <service id="ivoba_asset_version.namer.default"
             class="Ivoba\AssetVersion\Namer\DefaultNamer">
    </service>
    <service id="ivoba_asset_version.twig.asset_version_extension"
             class="Ivoba\AssetVersion\Twig\AssetVersionExtension">
        <argument type="service" id="ivoba_asset_version.version.md5_content"/>
        <argument type="service" id="ivoba_asset_version.namer.default"/>
        <argument>%asset_dir%</argument>
        <tag name="twig.extension"/>
    </service>

## Extend
You can create your own Version or Namer class by implementing their resp. interfaces and pass them to the extension.  
F.e if you prefer timestamp as version or a different pattern in the filename.

In the Extension you can add options as 4th parameter, as for now it only offers options['asset.directory'], as standard directory for assets.

## Credits

Read more about the idea:  

[http://www.particletree.com/notebook/automatically-version-your-css-and-javascript-files/](http://www.particletree.com/notebook/automatically-version-your-css-and-javascript-files/)

[http://www.bephpug.de/folien/asset_fingerprinting_with_php_demo_2012-08-07.pdf](http://www.bephpug.de/folien/asset_fingerprinting_with_php_demo_2012-08-07.pdf)