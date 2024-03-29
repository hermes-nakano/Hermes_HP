=== mqTranslate ===
Contributors: chsxf
Tags: multilingual, language, admin, tinymce, bilingual, widget, switcher, i18n, l10n, multilanguage, professional, translation, service, human
Requires at least: 3.9
Tested up to: 4.0-beta2-20140729
Stable tag: 2.6.4
Donate Link: http://www.xhaleera.com/
License: GPLv2

Based on qTranslate, adds userfriendly multilingual content management and translation support, with collaborative and team-oriented extensions.

== Description ==

Writing multilingual content is already hard enough, why make using a plugin even more complicated? qTranslate has been created to let Wordpress have an easy to use interface for managing a fully multilingual web site.

mqTranslate is a fork of the well-known qTranslate plugin, extending the original software with collaborative and team-oriented features.

qTranslate makes creation of multilingual content as easy as working with a single language. Here are some features:

- qTranslate Services - Professional human and automated machine translation with two clicks
- One-Click-Switching between the languages - Change the language as easy as switching between Visual and HTML
- Language customizations without changing the .mo files - Use Quick-Tags instead for easy localization
- Multilingual dates out of the box - Translates dates and time for you
- Comes with a lot of languages already builtin! - English, German, Simplified Chinese and a lot of others
- No more juggling with .mo-files! - mqTranslate will download them automatically for you
- Choose one of 3 Modes to make your URLs pretty and SEO-friendly. - The everywhere compatible `?lang=en`, simple and beautiful `/en/foo/` or nice and neat `en.yoursite.com`
- One language for each URL - Users and SEO will thank you for not mixing multilingual content

qTranslate supports infinite languages, which can be easily added/modified/deleted via the comfortable Configuration Page.
All you need to do is activate the plugin and start writing the content!

For more Information on qTranslate, visit the [Original qTranslate Homepage](http://www.qianqin.de/qtranslate/).

mqTranslate adds the following features to qTranslate:

- Language selection for editor accounts (allows your translators to see only their source and target languages)
- Protection of concurrent edits of different languages (ie your english and german translators can save their work at the same time without risking data loss)

For more Information on mqTranslate, visit the [Plugin Homepage](http://www.xhaleera.com/index.php/wordpress/mqtranslate/).

Flags in flags directory are made by Luc Balemans and downloaded from FOTW Flags Of The World website at
[http://flagspot.net/flags/](http://www.crwflags.com/FOTW/FLAGS/wflags.html)

== Installation ==

**IMPORTANT NOTE:** Please disable qTranslate if it is installed and active before activating mqTranslate.

Installation of this plugin is fairly easy:

1. Download the plugin from [here](http://wordpress.org/plugins/mqtranslate/ "the WordPress Plugin Repository").
1. Extract all the files.
1. Upload everything (keeping the directory structure) to the `/wp-content/plugins/` directory.
1. There should be a `/wp-content/plugins/mqtranslate` directory now with `mqtranslate.php` in it.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add the mqTranslate Widget to let your visitors switch the language.

== Frequently Asked Questions ==

The original qTranslate FAQ is available at the [Original qTranslate Homepage](http://www.qianqin.de/qtranslate/).

For Problems with the original qTranslate features, visits the [qTranslate Support Forum](http://wordpress.org/support/plugin/qtranslate).

For Problems with mqTranslate-specific features, visits [our Support Page](http://wordpress.org/support/plugin/mqtranslate).

== Screenshots ==

1. Wordpress Editor with mqTranslate
2. Language Management Interface
3. qTranslate Services (Translation)

== Changelog ==

2.6.4:

- Optimized some key functions (about 10~15% faster page generation on our test setup) thanks to normadize suggestions on the forums

2.6.3:

- Fixed mqTranslate behavior with custom post types. Data won't be altered by mqTranslate anymore (fixes corrupted data with TablePress and probably other plugins).
- Added "Allowed Custom Post Types" advanced setting to enable multi-language support from mqTranslate for specific custom post types. 
- Added setting to remove displayed language prefix when content is not available for the selected language.
- Fixed wrongly reported 404 errors when default language was provided in the URL in Pre-Path mode while set to be hidden in URLs 
- Fixed minor JavaScript bug

2.6.2.6:

- Fixed a bug introduced in version 2.6.2.5

2.6.2.5:

- Changed behavior of user-level language protection: from now, users whom profile has not been setup explictly will have read-write access to all languages
- Added option to disable user-level language protection
- Added translation support of user Biographical Info
- Fixed bug causing backslashes to be unexpectedly removed from post title and content
- Fixed bug in URL generation in the mqTranslate language menu (through widget or function) when qTranslate Slug is active
- Fixed bug when using quicktags
- Slightly improved settings page

2.6.2.4:

- Fixed TinyMCE resizing bug
- Hidden TinyMCE fullscreen edit button until mqTranslate supports this mode
- Improved display of alert message when incompatible WordPress version is found

2.6.2.3:

- Fixed a regression introduced by version 2.6.2.2

2.6.2.2:

- Fixed a bug when reporting post modification date
- Fixed a bug when dealing with timestamps when overridding date format when default formats
- Fixed support for qTranslate Slug
- Fixed a rare notice message appearing in options page related to flags

2.6.2.1:

- Fixed a blocking bug introduced in version 2.6.2

2.6.2:

- Improved WordPress minor versions support. mqTranslate now checks only the WordPress major release version number to check its compatibility.
- Fixed some unwanted notice messages for plugin developers or people having notice error displayed
- [EXPERIMENTAL] Added support for WordPress 4.0-alpha

2.6.1:

- Added support for language switches in the_date(), get_the_date(), the_modified_date() and get_the_modified_date() functions.
- Fixed problem with pagination URLs
- Fixed support for qTranslate Services

2.6:

- Updated for WordPress 3.9

2.5.45:

- Updated for WordPress 3.8.3

2.5.44:

- Updated for WordPress 3.8.2
- Minor visual improvements

2.5.43:

- Fixed potential bug with Pre-Path mode resulting in 404 Not Found errors
- Fixed duplicate language information in search form action URL (Pre-Path mode only)

2.5.42:

- Updated for WordPress 3.8.1

2.5.41:

- Fixed compatibility with bbPress

2.5.40:

- Updated for WordPress 3.8
- Fixed a bug in the URL parser when adding language information
- Fixed a bug with post dates and times
- Added Serbo-Croatian translation thanks to Borisa Djuraskovic from [WebHostingHub](http://www.webhostinghub.com)

2.5.39:

- Updated for WordPress 3.7.1

2.5.38:

- Updated for WordPress 3.7

2.5.37:

- Updated to match up qTranslate 2.5.37

2.5.36.1:

- Updated for WordPress 3.6.1

2.5.36:

- Updated to match up qTranslate 2.5.36

2.5.35.1:

- Added language information to URLs returned by home_url()

2.5.35:

- Updated to match up qTranslate 2.5.35

2.5.34.4:

- Fixed a bug with alternative master language selection when user is not allowed to edit default language

2.5.34.3:

- Fixed a display bug on the setup page

2.5.34.2:

- Added the ability to migrate settings from/to qTranslate (under Advanced Settings > Settings Migration)
- Added the ability to select a master language at user level to override the default language setting
- Removed mqtranslate self translation files (except French) until they can be upgraded with correct information

2.5.34.1:

- Fixes an issue when switching to code editor
- Reintroduces credits for gl translator from qTranslate
- Conforms to qTranslate's default installation with the inclusion of zh locale

2.5.34:

- Initial version

== Upgrade Notice ==

WARNING!
Original qTranslate software provides a specific version of the plugin for each version of WordPress. qTranslate is only compatible with the WordPress version it has been designed for.
As a fork, mqTranslate inherits some drawbacks of this issue, despite our efforts to reduce its impact.
Be aware of the fact that upgrading your WordPress installation to a new version prior the availability of the matching qTranslate or mqTranslate release will disable those plugins.