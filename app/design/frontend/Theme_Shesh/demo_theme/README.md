## Synopsis

This extension contains a sample theme for Magento 2

## Motivation

This sample theme extension demonstrates how to create a customized theme by overriding elements from its parent theme.

## Technical feature

* This component demonstrates a customized theme named "demo_theme" created by vendor "Magento". This theme inherits from the Magento/luma theme.
* The theme is declared in [theme.xml](theme.xml). The theme.xml file also contains information about the inheritance relationship and the location for a theme preview image [preview.png](media/preview.png).
* To extend the layout for Magento/luma, [default.xml](Magento_Theme/layout/default.xml) is created and can be used to customize the layout. In this case, the "Report Bugs" link is removed from the footer. Additionally, a customized [logo.svg](web/images/logo.svg) file is added and used by the new theme "demo_theme".
* [_demo_theme.less](web/css/source/_demo_theme.less) file is added to override the default variables values from the parent theme. In this case, the background color of the "copyright" section and the "header panel" section was changed from gray to blue. This can be achieved by declaring any element you wish to override with a new value at the end of the _demo_theme.less file.
* The [composer.json](composer.json) file contains the dependency information required for this theme, which is defined under "require". The installation path of this theme is defined under "extra".
* For more details, please refer to the public dev docs regarding theme: http://devdocs.magento.com/guides/v2.2/frontend-dev-guide/themes/theme-general.html

## Installation

This extension is intended to be installed using composer. After installing "demo_theme" theme, you can verify that it is installed by going the backend at:

CONTENT -> Design -> Themes

Once there check that the theme "demo_theme" shows up in the list to confirm that it is installed correctly. The theme preview can also be viewed by clicking on the thumbnail.

To set this theme for the storefront, go to:

STORES -> Configuration -> Design ->  Design Theme

Select "demo_theme" from the drop-down list and save the configuration. Go to frontend after flushing the page cache as prompted.

## Contributors

Shesh Kumar Mishra

## License

[Open Source License](LICENSE.txt)