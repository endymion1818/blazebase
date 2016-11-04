# EchBase
A starting point Wordpress theme with SASS Bootstrap set up, Grunt modules and a few basic templates.

Theme URI on Github: [Theme on Github](https://github.com/EchDev/EchBase)

## This theme also contains:

**wp-config-sample**
A few settings to help when using different development / production and live environments

**htaccess-sample.txt**
A few server settings such as enabling gZip (if possible), SVG support and maintenance mode settings when required.

## A Few Notes

This theme is meant to be very basic. It's a good starting point if you want the convenience of the following setup in a Wordpress theme:

- Bootstrap SASS files (so you can pick and choose components instead of loading everything, improving performance
- Bootstrap Javascript (uncompressed and un minified - so that you can include only the files you need and let Grunt do the rest)
- An established root for all assets
- A gruntfile with some starter modules
- A template for wp-config.php so that you can work on seperate versions without having to worry about rewrites deleting your database information
- A template for htaccess (Apache server config file) that enables gZip by default and adds server support for svg files

- I recommend using [Theme Unit Test](https://codex.wordpress.org/Theme_Unit_Test) to test the theme works as you expect, pending actual content.

### How To use

Download or clone this repo, *IMPORTANT:* delete the hidden `.git` folder and initiate your own new repository before use.


### Menus

Menus have been inculded which must be named identically in Wordpress:

- Header Menu
- Footer Menu

You must then tick the box to identify the theme location so that these menus function with the Bootstrap code I've created.

Some extra menu styles have been created in `_blazebase.scss` to fit in with Bootstrap's code. You may need to rewrite these depending on the styles you need.


Enjoy :-)
