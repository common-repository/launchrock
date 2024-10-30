=== LaunchRock ===
Contributors: ziodave
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=43GGXTUREFNZE
Tags: launchrock, coming soon page, landing page, landing pages, launch page, referral generation, sales pages, signup bar, squeeze page, welcome pages
Requires at least: 3.3.0
Tested up to: 3.5.2
Stable tag: 1.1.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed the LaunchRock sign-up form in your blog.

== Description ==

The LaunchRock sign-up form is a WordPress plugin that enables you to embed a simple sign-up form for LaunchRock in your blog.

Features include:

* A simple e-mail form for sign-up via LaunchRock.
* Add your own custom fields to the form (be sure to configure them in LaunchRock as well).
* A short-code to publish the form wherever you want in your blog.

== Installation ==

1. Install LaunchRock either via the WordPress.org plugin directory, or by uploading the files to your server
2. After activating LaunchRock, you will need to get your LaunchRock site id
3. You can find your site id by opening the sign-up page source and looking for the rel value in &lt;div id=&quot;lr-widget&quot; rel=&quot;**your-site-id**&quot;&gt;&lt;/div&gt; (see [screenshots](../screenshots))
4. Insert the *[launchrock site=**your-site-id**]* short-code wherever you want an e-mail form to appear
5. Users can now use this form to sign-up via LaunchRock

This is an example use (using the Contact Form plugin CSS classes to style the form):

<pre>
[launchrock btn_text="Signup"
            site="<em>your LaunchRock site id</em>"
            form_class="wpcf7-form"
            btn_class="wpcf7-form-control wpcf7-submit"]

[launchrock_field label="Company" name="company"]

[/launchrock]

[launchrock_success]
	Success!
[/launchrock_success]
[launchrock_failure]
	{message} :-(
[/launchrock_failure]
</pre>

== Screenshots ==

1. The site id in the LaunchRock sign-up page source (e.g. ABCDEFGH).
2. A sample sign-up form.

== Changelog ==

= 1.1.8 =
* Enhancement: add support for message templates to allow further configurations.

= 1.1.8 =
* Fix: compatibility issues.

= 1.1.7 =
* Enhancement: add inline custom feedback messages for success/failure.

= 1.1.6 =
* Enhancement: review formatting of readme.txt.

= 1.1.5 =
* Enhancement: add a screenshot of a sample form.

= 1.1.4 =
* Fix: fix readme.txt.

= 1.1.3 =
* Enhancement: add support for submit button caption.
* Fix: add escaping of attributes/labels.

= 1.1.2 =
* Enhancement: add support for stylesheet class on the form.

= 1.1.1 =
* Enhancement: add support for stylesheet class on the submit button.

= 1.1.0 =
* Enhancement: add support for custom fields.

= 1.0.0 =
* Initial release
