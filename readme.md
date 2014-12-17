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
todo
### Symfony: 
todo

## Extend
todo

## Credits

Read more about the idea:  

[http://www.particletree.com/notebook/automatically-version-your-css-and-javascript-files/](http://www.particletree.com/notebook/automatically-version-your-css-and-javascript-files/)

[http://www.bephpug.de/folien/asset_fingerprinting_with_php_demo_2012-08-07.pdf](http://www.bephpug.de/folien/asset_fingerprinting_with_php_demo_2012-08-07.pdf)