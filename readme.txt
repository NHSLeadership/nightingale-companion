=== Nightingale Companion ===
Contributors: Nick-Summerfield, tblacker7
Tags: theme, nightingale, nhs
Plugin Name:: Nightingale Companion
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 1.3.6
Requires PHP: 5.6
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A plugin to enhance performance on sites running the Nightingale theme

== Description ==

NIGHTINGALE THEME MUST BE INSTALLED AND ACTIVE FOR THIS PLUGIN TO WORK

This plugin is a companion to the Nightingale theme. It is aimed at improving performance and user experience on a site
that uses the Nightingale theme. The plugin adds additional functionality to the theme, each component of which is
enabled by default on installation but can be switched off easily via the admin panel > Settings > Nightingale Companion

 - Disable Emojis - this disables the default emoji packages that ship with WordPress, which load on every single page
 of your site and impact performance and speed. This is a tiny tweak that has an incremental benefit.
 - LoadCSS - Removed as caused a number of conflicts with some WP plugins.
 - InstantPage - Removed as causing multiple issues on the sites.
 pages preloading when a user hovers their mouse over links. This does not, in fact increase load times but does appear perception of load times as those few partial
  seconds pre click are actually being used to start loading the next page.
 - DeferJS - Removed as caused a number of conflicts with some WP plugins.
 - Set Browser Cache - Removed as caused a number of conflicts with some WP plugins. (Recommend using CloudFlare or
 similar for better results)
 - Cleanup WordPress meta tags - removes lots of WP native tags included in the header region.
 - Use Excerpts as Meta Description - WordPress automatically takes the first 55 words of a post or page to create an
 excerpt (or you can manually add your own per page/post). This modification uses this excerpt to populate the meta
 description tag. If you have an alternative method of generating this meta tag, you should disable this option.
 - Modified the login page to use the theme design and layout
 - Adds the emergency alert header to the theme customiser


== Installation ==

This section describes how to install the plugin and get it working.
1. Install and activate the Nightingale theme from the appearance section of your WordPress site.
2. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
3. Activate the plugin through the 'Plugins' screen in WordPress
4. Functions that the plugin adds can be activated and deactivated through the nightingale companion tab under 'Settings'.

== Frequently Asked Questions ==

= Why isn't this plugin working? =

Please ensure that you have installed and activated the Nightingale theme on your site. If the issue persists, please log an issue.

= Is this plugin restricted to only NHS Organisations =

This plugin has been built specifically for use in the NHS, but it is open source code and you are free to use it on any site.

= My site is doing weird stuff with loading or appearance. Why? =

If you have other plugins running on your site, it is possible they do things that this plugin also does and either
conflicts or duplication is happening. Try disabling options in the plugin to see what is causing the issue.

= Will this give me a perfect LightHouse score? =

No. This improves the performance and accessibility of your site. But your site scores in LightHouse will also be
influenced by your content, your server environment and your other plugins running on your website. We have tested this
with sample content on a site running the Nightingale theme, this plgin and the NHSBlocks plugin. With these parameters,
 we generated a 100 score in LightHouse for the metrics of Performance, Accessibility, Best Practices and SEO.

 == Changelog ==

 = 1.3.6 =

 -Removed InstantPage

 = 1.3.5 =

 -Fix php warning when there is no social sharing configured.

 = 1.3.4 =

 -Fix issue with previous release process

 = 1.3.3 =

 -Fix for plugin errors on activation 

 = 1.3.2 =

 -Fix for E_ERROR when upgrading from PHP 7 to PHP 8
 -Previous release issue fix  

 = 1.3.1 =

 -Fix for E_ERROR when upgrading from PHP 7 to PHP 8

 = 1.3.0 =

 -Updated Dependancies and tested on new WP version

= 1.2 =
Maintenance release:
 - Removed LoadCSS, defer JS to footer and cache options. All three were minor performance improvements but introduced
 bugs with other plugins (notably LearnDash, BuddyBoss and Events Calendar). With good server configuration and usage of
 tools like CloudFlare better results can be achieved without damaging functionality of third party plugins.
 - Corrected issue where styled login page would not inherit site colour settings from theme. It now does.
 - updated various dependancy libraries for security and stability.
 - tested up to WordPress 5.8

= 1.1.1 =
Added audio playback speed controls (under display section of settings)

= 1.1.0 =
Security and stability update:
Thank you to all users submitting feedback.
 - Javascript loading has been combined, with a simplified control. Now you have the option of deferring JS to after
pageload, moving scripts to the footer, or both, or neither.
 - Cache control has been improved to bust the cache for logged in users, so people adding content or editing can see
 their changes reflected without doing a hard refresh.
 - This release sees the removal of:
   - Retina Images - the theme instead uses WordPress native multiimage display.
   - Update jQuery - WP core is updating jQuery through the next few releases, this feature is no longer required.
   - LazyLoading - as of WP 5.5. this is a native function so does not need to be in a plugin.
   - Compress HTML - this was breaking data reporting from Google Tag Manager and also impacted some javascript triggers
   .

= 1.0.5.1 =
Maintenance release

 = 1.0.5 =
 Bugfixes:
  - corrected install routine to add correct default settings to plugin
  - corrected check to see if child theme of Nightingale is in use, if so allow activation
  - Added multisite functionality. If you have a previous version to enable multisite, please remove the plugin and
  reinstall so that the install routine runs again to activate this correctly.
 Feature additions:
  - Added social sharing buttons functionality. This uses the addthis library and is configurable to be disabled, above
  posts, below posts or both
  - Added editable title for social sharing region. Default is "Share This:"
  - added update jQuery option to enable more recent version of jQuery to be loaded to your WP install. Please note this
   may cause othe rplugins to fail. If enabling, use with caution and test thoroughly. Default is disabled.
  - Added blog settings, allowing you to suppress featured images on individual posts/pages, add an author bio section and add other posts by author section.
  - Added social widget to allow you to link to your social channels using a panel of buttons that stick to either the
  left or right of display. Configurable via Customiser > Social Widget, includes FaceBook, Twitter, YouTube, Vimeo,
  LinkedIn and RSS feed.

 = 1.0.2 =
Initial release.
