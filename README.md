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

