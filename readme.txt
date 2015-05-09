=== Semantics for WordPress ===
Contributors: dshanske
Tags: indieweb, microformats, semantics, microdata
Stable tag: 0.1.0
Requires at least: 4.0
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Functions to add semantic markup and structured data to your site

== Description == 

Functions to add semantic markup to your site. This is designed to use in conjunction with a theme and
as a proof of concept for future enhancements to WordPress.

One of the biggest problems with standards is that the current flavor of the week won't be in the future.
The only structured data standard that WordPress sort of supports is classic microformats(superseded by
microformats2) and only in a limited way that still requires the theme to mark certain elements appropriately.

Ideally, the best idea is to allow your theme to focus on the presentation, specify which element is which, and
hand over control of the structured data markup to outside of the theme as much as possible.

Without any theme modification, this plugin will implement microformats2 support in as many places as possible. 
Adding the structured data functions in the appropriate places in a theme will add the capability to add better 
support for microformats as well as the ability to add microdata and other standards.



== Changelog == 

* Version 0.1.0 - Initial release
