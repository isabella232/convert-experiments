=== Convert Experiments by Yoast ===
Contributors: joostdevalk, barrykooij
Tags: plugin, a/b test, a/b testing, conversion optimization, split testing, website optimization, convert
Requires at least: 3.5.1
Tested up to: 3.8
Stable tag: 2.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Convert Experiments™ provides advanced A/B and Multivariate Testing functionality for your website or blog.

== Description ==
A/B testing for WordPress now possible and simple. This plugin is a combined effort by both Convert and Yoast.
It will enable your WordPress installation for use with the Convert Experiments™ conversion optimization suite.
On top of that, you'll be able to register for a free [special Yoast account on Convert.com](http://www.convert.com/yoast/),
giving you some nice extras.

The plugin will automatically send the page type, page name, category name, category ID, and tags to Convert Experiments.
A/B testing on any set of categories or pages is then easy with the advanced filtering and segmentation during test
configuration.

> You'll need a [Convert Experiments account](http://www.convert.com/yoast/) to use this plugin.  Once you have that,  A/B tests are easy to
> setup without any technical knowledge. If you set up an account through this link, you'll get a special Convert Yoast account, which has:
>
> 1. Free 5,000 tested visitors per month for 12 months
> 2. Free A/B and Split URL testing
> 3. Upgrade discounts to paid plans


=== What does the plugin do? ===

At a high level, this plugin's sole purpose is to quickly install a small block of javascript onto each page of your
WordPress installation. The installed javascript is necessary for the Convert Experiments suite to perform its
A/B, split URL and multivariate functionality on your blog.

With some slight variations (based on the type of page being viewed: home, single, category, tag, or page), the
inserted javascript will look like the following:

`<!-- begin Convert Experiments code--><script type="text/javascript">var _conv_host = (("https:" == document.location.protocol) ? "https://d9jmv9u00p0mv.cloudfront.net" : "http://cdn-1.convertexperiments.com");document.write(unescape("%3Cscript src='" + _conv_host + "/js/1-4.js' type='text/javascript'%3E%3C/script%3E"));</script><!-- end Convert Experiments code -->`

=== Development ===

Development of this plugin happens on GitHub. You can find the [plugins GitHub repository here](https://github.com/Yoast/convert-experiments/). Translations for this plugin are very welcome, you can translate the plugin by going to [translate.yoast.com](http://translate.yoast.com/projects/convert-experiments).

== Installation ==
[Sign up on the Yoast Convert page](http://www.convert.com/yoast/).

1. Go to Plugins -> Add New and upload the plugins zip file.
2. Activate the plugin.
3. Copy your project number from Convert Experiments™ into the plugin configuration screen.

== Frequently Asked Questions ==
You'll [find the FAQ on Yoast.com.](https://yoast.com/wordpress/plugins/yoast-convert-plugin/faq/)

== Screenshots ==

1. Project Number
1. Visitor Segmentation

== Changelog ==

= 2.0 =
* Yoast rewrote plugin logic for better development standards.
* Made the entire plugin i18n ready.

= 1.3 =
* Changing tracking code to a better and faster one that allows experiments to be triggered faster and tracked better.

= 1.2 =
* Fix limitation on number of characters the project code could have.

= 1.1 =
* Added post title, page title, and category names as 'product name'
* Escape single quotes in javascript text variables.
* Added image showing where to retrieve the Product Number from the Convert Experiments™ dashboard.

= 1.0 =
* Initial release.

