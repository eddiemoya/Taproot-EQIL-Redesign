=== Simple Hook Widget ===
Contributors: eddiemoya
Donate link: http://eddiemoya.com
Tags: widget, sidebar, hook, custom hook
Requires at least: unknown
Tested up to: 3.2.1
Stable tag: trunk

Allows user to insert a custom hook with a name of their choosing into any sidebar.

== Description ==

This widget allows the user to insert a hook, with a name of their choosing, in any sidebar. 

The hook can be anything, an existing hook from the WordPress Core, a plugin, a theme, or something you've come up with on the fly. Once the hook exists, your plugins, your theme, or the WordPress Core to make something happen with that hook.

This can be used in conjunction with other more complex plugins, to give the user control of then things occur (yes, that is intentionally vague). It can also serve as a quick alternative to making very simple widgets tied to code from a theme. Say you have a chunk of code which already exists on your site, you'd like to also have it placed in a sidebar, but don't want to make a widget out of it (since its entirely theme-centric). You could simply hook this chunk of code to a custom hook and use the Simple Hook Widget to place that custom hook in the sidebar. This is absolutely not an endorsement toward that strategy for widget development, but there may be times where such on option is useful to a developer in a pinch.

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. In the widgets interface, drag to desired location.
1. Enter desired hook name.
1. Enjoy cake.

== Frequently Asked Questions ==

= Does this plugin work? =

Yes

= Is it simple? =

Yes

= Is it dishwasher safe? =

No.


== Upgrade Notice ==

= 1.1.1 =
Please upgrade to 1.1.1 - Fixes a problem that caused plugin to fail during activation.

== Changelog ==

= 1.1.1 =
Fixed a packaging problem which made plugin activation fail

= 1.1 =
Changed the name of the update hook prefix from simplehook_ to simplehookupdate_ 

= 1.0 =

== Note to Developers ==

This widget also contains an internal hook, which will be _your_ hook, prefixed with simplehookupdate_. So if you use this plugin to create a hook name 'testhook', the widget, aside from creating the 'testhook' in the chosen sidebar location, will also create a hook called 'simplehookupdate_testhook'. This hook occurs within the update method of the WP_Widget class, immediately before $instance is returned.