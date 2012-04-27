=== Media Categories ===
Contributors: eddiemoya
Donate link: http://eddiemoya.com
Tags: media categories, media, category, categories, attachment categories, taxonomy, category metabox, metabox, admin, media library, media editor, attachment editor, attachment
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: trunk

Allows users to assign categories to items in their Media Library with a clean and simplified, filterable version of the standard category meta box 

== Description ==

Allows users to assign categories to items in their Media Library with a clean and simplified, filterable version of the standard category meta box. 
The filter allows you to narrow your search for category as you type - this filter is not native to WordPress but is instead borrowed from Jason Corradino's 
[Searchable Categories](http://wordpress.org/extend/plugins/searchable-categories/) plugin. If you would like to enable this feature for your posts and pages
[download his plugin here](http://wordpress.org/extend/plugins/searchable-categories/)

== Related Plugins ==

As stated in the description, the filtering ability in this plugin is taken from Jason Corradino's 
[Searchable Categories](http://wordpress.org/extend/plugins/searchable-categories/) plugin. While I do
not employ the plugin directory, the javascript used for filtering is in fact derived with consent from 
that plugin. To enable this feature on all you category metabox, the 
[Searchable Categories](http://wordpress.org/extend/plugins/searchable-categories/) plugin

I'd like to point out that I drew some inspiration from the ['WOS Media Categories'](http://suburbia.org.uk/page/projects.html#wos_media_categories) plugin which
is not generally easy to find since its not in the plugin directory. However [WOS Media Categories](http://suburbia.org.uk/page/projects.html#wos_media_categories)
was missing the clean simple to use hierarchical category interface that we are used to in
WordPress. A couple of my projects were dependant that plugin, but as the scale of the project
increased and the number of categories grew exponentially, the disorganized grid of checkboxes
were no longer a viable option.

= TL;DR =
Checkout these related plugins from which I borrowed code and drew inspiration.

* [Searchable Categories](http://wordpress.org/extend/plugins/searchable-categories/) by Jason Corradino
* [WOS Media Categories](http://suburbia.org.uk/page/projects.html#wos_media_categories) by Rick Curran

WOS is not as relevant since this plugin supplants that one, but the Searchable Categories plugin is a
great simple plugin which adds very useful functionality that I think should be included in WordPress Core.

== Screenshots ==

1. This plugin will include clean, simple to use, filterable categories to your Media Editor page.
2. Use categories in much the same way you use them on your posts and pages.
3. Filter categories as you type, very useful if you have a lot of categories to look through (thanks to Jason Corradino's "Searchable Categories" plugin)

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


== Changelog ==

= 1.0 =
* Initial commit.

= 1.1 = 
* Changed jQuery to use .live() rather than .on() for compatability with WordPress which only added jQuery 1.7 in v3.3
* Removed superfilous file which was accidentally included from a different plugin of mine. Would fatal errors if both plugins were turned on at the same time.

== Upgrade Notice ==
* For compatibility with WordPress versions earlier than 3.3, upgrade to version 1.1 of this plugin. 
