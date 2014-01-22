=== Convert Experiments by Yoast ===
Contributors: joostdevalk, barrykooij
Donate link: http://yoast.com/
Tags: plugin, a/b test, a/b testing, conversion optimization, split testing, website optimization, convert
Requires at least: 3.5.1
Tested up to: 3.8
Stable tag: 2.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Convert Experiments™ provides advanced A/B and Multivariate Testing functionality for your website or blog.

== Description ==

A/B testing for Wordpress now possible and simple. This plugin will enable your WordPress installation for use with Convert Experiments™ conversion optimization suite.

The plugin will automatically send the page type, page name, category name, category ID, and tags to Convert Experiments. A/B testing on any set of categories or pages is then easy with the advanced filtering and segmentation during test configuration.

You'll need a [Convert Experiments](http://convert.com/) account to use it. But then A/B tests are easy to setup without any technical knowledge. Split testing and multivariate testing is available within Convert Experiments and this plugin as well. So besides A/B testing any other conversion rate optimization testing is easy and fast.

Convert Experiments A/B testing tool works with Google Analytics (GA), Google Analytics (GA) custom variables, Google Analytics Ecommerce Revenue Tracking, KissMetrics and helps optimize your PPC and SEO efforts. Great plugin to have and combine with SEO pack, SEO by Yoast, SEO Ultimate or Google Analytics for Wordpress.

== Installation ==

Sign up at [Convert.com](http://convert.com/).

1. Upload the `convert` directory to your blog's `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Copy your project number from Convert Experiments™ into the plugin configuration screen.

== Frequently Asked Questions ==

= How do I register for my free trial? =

Visit the Convert Experiments™ [Registration Page](https://www.convertexperiments.com/login?action=register)

= Where do I find my project number? =

Log into your account at [Convert.com](http://www.convert.com/). From your project dashboard,
click the settings link and you can see Account details. Your project number will be visible there (see screenshot-1).
Your project number will look something like *1000000_1234567*.

= Why don't I see the code on my site? =

If you have a caching plugin installed make sure you refresh the cache to display the code. Pay attention to this when using WP Super Cache, W3 Total Cache or any other caching plugin.

== What does the plugin do? ==

At a high level, this plugin's sole purpose is to quickly install a small block of javascript onto each page of your
WordPress installation. The installed javascript is necessary for the Convert Experiments suite to perform its
A/B, split URL and multivariate functionality on your blog.

With some slight variations (based on the type of page being viewed: home, single, category, tag, or page), the
inserted javascript will look like the following:

`<!-- begin Convert Experiments code--><script type="text/javascript">var _conv_host = (("https:" == document.location.protocol) ? "https://d9jmv9u00p0mv.cloudfront.net" : "http://cdn-1.convertexperiments.com");document.write(unescape("%3Cscript src='" + _conv_host + "/js/1-4.js' type='text/javascript'%3E%3C/script%3E"));</script><!-- end Convert Experiments code -->`

== Screenshots ==

1. Project Number
1. Visitor Segmentation
1. Multiple Conversion Goals for A/B testing

== Changelog ==

= 2.0 =
* Rewritten plugin

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

