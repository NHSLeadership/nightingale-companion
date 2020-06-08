# WordPress Companion Plugin for Nightingale Theme

This repository houses the companion plugin for the Nightingale WordPress theme from NHS Leadership Academy. 
This is a standalone plugin, but is intended to be used in concert with the [Nightingale](https://wordpress.org
/themes/nightingale) theme. The plugin and theme together form the WordPress deployment of the NHSUK Frontend design
. We would also recommend the [NHSBlocks](https://github.com/NHSLeadership/nhsblocks) plugin.

## Requirements
This plugin requires minimum Wordpress 5.0 and PHP 5.6 (PHP 7 or higher is preferred). It also requires (and checks
) that the Nightingale theme is installed and active.

## Deployment Instructions
Download the `nightingale-companion.zip` from this repository. Install this to your wordpress via admin > plugins > add
 new > upload. Go to your wordpress admin, and activate the Nightingale Companion plugin. By default all options
  within the plugin will be enabled. To modify the options, please go to your admin and click Settings > Nightingale
   Companion. To disable any feature simply untick the box (or in the case of browser cache set the number to 0)
 
## Additional Features this Plugin provides ##

 - Retina Images - this enables your site to serve double quality images for retina display devices, and makes multiple
 sizes for each of the sizes configured on your site. This all happens automatically in the background and will improve
 the look of your thumbnails, images and banners across your site for retina capable screens.
 - Disable Emojis - this disables the default emoji packages that ship with WordPress, which load on every single page
 of your site and impact performance and speed. This is a tiny tweak that has an incremental benefit.
 - [LoadCSS](https://github.com/filamentgroup/loadCSS) - this uses the loadcss javascript library which defers loading of
  your stylesheets to after the main html has loaded. This increases the speed of time to interaction for your pages
 - [InstantPage](https://github.com/instantpage/instant.page) - this uses the instantpage javascript library to trigger
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
 
## Development Instructions
To develop your own modifications, you will need to download the full [repo from GitHub](https://github.com/NHSLeadership/nightingale-companion) - you should be in your `wp-content/plugins` folder.
Once you have this locally, you will need to change directory to `wp-content/plugins/nightingale-companion`.

We have structured the plugin so that features are divided into their respective folders of `display`, `functionality
` and `performance`. All features have a corresponding setting which should be added to settings.php, and where
 applicable are also wrapped in qualifying if statements (ie if a feature depends on an installed plugin, you should
  check the plugin exists and is active around the include statement).
 
Any improvements, bug fixes or amendments should also be submitted back as pull requests to this GitHub repo so that the
 whole community can benefit from the work.

## Credits
This plugin was written by Nick Summerfield, NHS Leadership Academy Digital Delivery Team. It was inspired by a
 session with Harry Roberts [csswizardry](https://csswizardry.com/), and uses code from 
 [loadCSS](https://github.com/filamentgroup/loadCSS), [instantPages](https://github.com/instantpage/instant.page), as
  well as multiple WordPress and Stack Exchange suggestions for code improvement.

