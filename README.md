# WordPress Companion Plugin for Nightingale Theme

This repository houses the companion plugin for the Nightingale WordPress theme from NHS Leadership Academy. 
This is a standalone plugin, but is intended to be used in concert with the
[Nightingale](https://wordpress.org/themes/nightingale) theme. The plugin and theme together form the WordPress deployment of the NHSUK Frontend design. We would also recommend the [NHSBlocks](https://github.com/NHSLeadership/nhsblocks) plugin.

## Requirements
This plugin requires minimum Wordpress 5.0 and PHP 5.6 (PHP 7 or higher is preferred). It also requires (and checks
) that the Nightingale theme is installed and active.

## Deployment Instructions
Download the `nightingale-companion.zip` from this repository. Install this to your wordpress via admin > plugins > add
 new > upload. Go to your wordpress admin, and activate the Nightingale Companion plugin. By default all options
  within the plugin will be enabled. To modify the options, please go to your admin and click Settings > Nightingale
   Companion. To disable any feature simply untick the box (or in the case of browser cache set the number to 0)
 
## Additional Features this Plugin provides ##

 ### Display Options ###
 - Disable Emojis - this disables the default emoji packages that ship with WordPress, which load on every single page
 of your site and impact performance and speed. This is a tiny tweak that has an incremental benefit.
 - Style login page - Modified the login page to use the theme design and layout
 - Enable Emergency Alert - Adds the emergency alert header to the theme customiser. Even when enabled, you will still need to add content via themes > customiser to make it display on your site.
 - Sharing buttons. Choose whether you would like sharing buttons showing on individual posts and pages. You can
  select to not show these, show them at the top of your content, below your content or both. This is a global setting.
 - Sharing Title - choose what text to show before the sharing buttons. Default is `Share This:`
 
 ### Functionality ###
 
 - Use Excerpts as Meta Description - WordPress automatically takes the first 55 words of a post or page to create an
 excerpt (or you can manually add your own per page/post). This modification uses this excerpt to populate the meta
 description tag. If you have an alternative method of generating this meta tag, you should disable this option.
 - Cleanup meta - removes lots of WP native tags included in the header region.
 
 
 ### Performance ###
 - REMOVED - [LoadCSS](https://github.com/filamentgroup/loadCSS) - this uses the loadcss javascript library which defers
  loading of
  your stylesheets to after the main html has loaded. This increases the speed of time to interaction for your pages
 - REMOVED - [InstantPage](https://github.com/instantpage/instant.page) - this uses the instantpage javascript library to trigger
 pages preloading when a user hovers their mouse over links. This does not, in fact increase load times but does appear perception of load times as those few partial
  seconds pre click are actually being used to start loading the next page.
 - REMOVED - Javascript Loading - Defaultss to native WP loading, but you can choose to instead:
   - adds a defer tag to all javascript (excluding jQuery and loadcss) to defer loading of js resources until
 after HTML has loaded in.
   - Move Scripts to Footer - move the javascript and stylesheet files to the footer. This enables visible display of the page quicker.
   - Both the above.
 - REMOVED - Browser Cache - this is a setting to tell users' browser to cache locally the content. The value is
  number of
 seconds that this local cache should be stored, defaulting to 43200 (12 hours)

 
 
 ### Blog Settings ###
 - Hide Featured Images - this will prevent featured images from being displayed on individual posts and pages
 . Global setting.
 - Show Author Bio - this adds an author bio section to the bottom of posts, including a link to all posts by author.
 - Show Author Posts - displays the most recent 6 posts from the author at the bottom of post.
 
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
  
## Future Intentions
 - merge stylsheets to one file and compress
 - add in rich snippets for things such as opening hours, address, alumni etc. Have these configurable to be either per page or site wide (ie a hospital may have different opening hours for different departments)
 - add in status ribbon (to denote beta/alpha/in development etc) - this is non NHSUK so undecided whether to put this into our own LA plugin or this one
 - subpages display - we currently have this as a shortcode, would be relatively easy to add this in (i.e. - show subpages as clickable panels on parent page with excerpts showing...)
 - cookie control...?

