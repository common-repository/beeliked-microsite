=== BeeLiked Plugin ===
Contributors: BeeLiked, thyagotc
Tags: promotion, marketing, campaign, engagement
Requires at least: 3.0
Tested up to: 5.3
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Allows the embed of a BeeLiked microsite into a post or a page using an iframe.


== Description ==

Beeliked is a plugin that will let you embed Beeliked microsites as iframe - an HTML tag that allows a webpage to be displayed inline with the current page, in a Wordpress post.

BeeLiked is a digital marketing platform proving a suite of customizable digital campaigns and competitions to engage and entertain your audiences. Used by some of the largest brands on the planet, BeeLiked's range of highly advanced campaign concepts are quick to set up and are guaranteed to boost your audience engagement across all social networks and devices. 

Major features of BeeLiked:

* Over 20 innovative digital campaigns types to choose from, all full mobile optimized.
* Comprehensive suite of tools for managing competition entries and selecting winners.
* Average set up time of 15 minutes per campaign.
* Full integration with all the major social networks.
* Beautiful templates that are quick to customize.
* Free plans to get started.

You will need a BeeLiked Account in order to be able to use the WordPress plugin. Sign up free at [beeliked.com](https://beeliked.com)


== Installation ==

Instructions for installing Wordpress plugin
1. Download the 'BeeLiked Microsite' WordPress plugin by clicking the download link above (or search for it in WordPress plugins and Install);
2. Login to your WordPress admin console account and find 'Plugin' in the menu. Click 'Add Plugin';
3. Upload the 'BeeLiked Microsite' plugin by clicking choose file and browsing to the saved file.;
4. Click 'Install now'.

*Notes:* If you are asked for an FTP password, please check with your hosting provider who will be able to provide this.


== Usage ==

Just add the following tag to your code and set the src value as the URL of your BeeLiked campaign microsite:

`[beeliked src="<your microsite url>"]`

e.g.

`[beeliked src="https://beeliked-ready-made-2-0.pollin8.co/basic-red-campaign-spin-the-needle"]`

You can also configure optional parameters:
* id: Set a unique ID for the component element
* auto-resize: set 1 or 0 to auto resize the iframe to fit its content, avoiding scrollbars (default: 1)
* width (default: 100%)
* height (default: 700px)
* class (default: beeliked-iframe)
* loader-message (default: Loading...)
* loader-image (default: https://campaign.beeliked.com/imgs/microsites/loader-dark.gif)
