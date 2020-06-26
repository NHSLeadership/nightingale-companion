=== Nightingale Companion ===
Contributors: Nick-Summerfield, tblacker7
Tags: theme, nightingale, nhs
Plugin Name:: Nightingale Companion
Requires at least: 5.3
Tested up to: 5.4.1
Stable tag: 1.0.5
Requires PHP: 5.6
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A plugin to enhance performance on sites running the Nightingale theme

== Description ==

NIGHTINGALE THEME MUST BE INSTALLED AND ACTIVE FOR THIS PLUGIN TO WORK

This plugin is a companion to the Nightingale theme. It is aimed at improving performance and user experience on a site
that uses the Nightingale theme. The plugin adds additional functionality to the theme, each component of which is
enabled by default on installation but can be switched off easily via the admin panel > Settings > Nightingale Companion

 - Retina Images - this enables your site to serve double quality images for retina display devices, and makes multiple
 sizes for each of the sizes configured on your site. This all happens automatically in the background and will improve
 the look of your thumbnails, images and banners across your site for retina capable screens.
 - Disable Emojis - this disables the default emoji packages that ship with WordPress, which load on every single page
 of your site and impact performance and speed. This is a tiny tweak that has an incremental benefit.
 - LoadCSS - this uses the loadcss javascript library (https://github.com/filamentgroup/loadCSS) which defers loading of
  your stylesheets to after the main html has loaded. This increases the speed of time to interaction for your pages
 - InstantPage - this uses the instantpage javascript library (https://github.com/instantpage/instant.page) to trigger
 pages preloading when a user hovers their mouse over links. This does not, in fact increase load times but does appear perception of load times as those few partial
  seconds pre click are actually being used to start loading the next page.
 - DeferJS - adds a defer tag to all javascript (excluding jQuery and loadcss) to defer loading of js resources until
 after HTML has loaded in.
 - Set Browser Cache - this is a setting to tell users' browser to cache locally the content. The value is number of
 seconds that this local cache should be stored, defaulting to 43200 (12 hours)
 - Enable LazyLoading - adds a tag to all media resources to use native lazyloading. This will work on all modern
 browsers (except FireFox)
 - Cleanup WordPress meta tags - removes lots of WP native tags included in the header region.
 - Compress HTML output - very basic minification of output HTML. This does not combine or minify included files. Will
 reduce size of output HTML by around 3-5%
 - Use Excerpts as Meta Description - WordPress automatically takes the first 55 words of a post or page to create an
 excerpt (or you can manually add your own per page/post). This modification uses this excerpt to populate the meta
 description tag. If you have an alternative method of generating this meta tag, you should disable this option.
 - Modified the login page to use the theme design and layout (this option is not switchable at present)
 - Adds the emergency alert header to the theme customiser (this option is not switchable at present)


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
