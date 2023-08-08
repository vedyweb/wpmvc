=== WP MVC ===
Contributors: vedyweb
Tags: mvc, plugin, framework, development
Requires at least: 5.6
Tested up to: 5.8
Stable tag: 1.0.0
Requires PHP: 7.2.5
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

WP MVC Plugin is a powerful tool designed to enhance the functionality of your WordPress website. Built with an Object-Oriented Programming (OOP) approach and following the Model-View-Controller (MVC) architectural pattern, this plugin provides developers with a solid foundation for creating professional, efficient, and maintainable code.

== Description ==

WP MVC Plugin is a versatile and developer-friendly plugin that simplifies the process of creating complex WordPress plugins. It follows the MVC design pattern, allowing you to separate your code into manageable components, making your plugin more maintainable and scalable.

Features:
- **MVC Architecture**: Utilize the power of the Model-View-Controller architecture to organize your codebase and improve maintainability.
- **Custom Post Types**: Easily create and manage custom post types, taxonomies, and meta boxes for seamless content management.
- **Clean Codebase**: Write clean, structured, and organized code following best practices and standards.
- **Third-Party Library Integration**: Seamlessly integrate popular third-party libraries and frameworks for enhanced functionality.
- **Extensive Documentation**: Comprehensive documentation and examples to guide you through using the plugin's features.

Architecture:
wp-content/plugins/
└── wpmvc/
    ├── src/                            // Houses the core logic and components.
    │   ├── Api/                        // Managing plugin logic related APIs.
    │   │   └──  NoteResource.php
    │   │   └── ...
    │   ├── Controller/                 // Handling main plugin logic.
    │   │   └──  NoteController.php
    │   │   └── ...
    │   ├── Model/                      // Handling database operations and Data transfer.
    │   │   └── NoteModel.php   
    │   │   └── ...
    │   ├── View/                       // View classes for plugin visuals and templates.
    │   │   └── NoteView.php
    │   │   └── ...
    │   ├── Core/                       // Handling assets like Asset( CSS, JS, Img) etc.
    │   │   └── Asset.php     
    │   │   └── ...
    │   ├── Utils/                      // External classes like loggers.
    │   │   └── Logger.php      
    │   │   └── ...
    │   └── Bootstrap.php               // Main plugin class (Setup) to bring components together.
    │   
    ├── templates/                      // Templates directory
    │   ├── base/
    │   │   └── view.php
    │   │   └── edit.php
    │   ├── node/
    │       └── add.php
    │       └── edit.php
    │       └── list.php
    │       └── ...
    │   
    ├── tests/                          // Managing test cases
    │   └── TestCase.php
    │   ├── Model/
    │        └── ExampleModelTest.php
    │ 
    ├── assets/                         // Template entities like CSS, JS, Images etc.
    │   ├── css/
    │   │   └── style.css
    │   ├── js/
    │   │   └── script.js
    │   └── images/
    │       └── sample.png
    │    
    ├── languages/                      // Language translation folder for internationalization
    │   └── wpmvc.pot  
    │ 
    ├── logs/                           // Log folder capturing plugin errors and warnings
    │   └── error.log
    │
    ├── composer.json                   // Configuration for Composer dependencies.
    ├── README.md                       // Comprehensive documentation about the plugin.
    └── wpmvc.php                      // Primary plugin file for configures settings.

Code is like humor. When you have to explain it, it’s bad. – Cory House

== Installation ==

1. Upload the `wpmvc` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Visit the 'WP MVC' settings page to get started.

== Frequently Asked Questions ==

= How do I create a new custom post type? =

Creating a custom post type is easy with WP MVC Plugin:
1. Go to the 'WP MVC' settings page.
2. Click on the 'Custom Post Types' tab.
3. Click the 'Add New' button and fill in the required details.
4. Save your changes.

= How do I leverage MVC architecture in my plugin? =

WP MVC Plugin provides a robust framework for implementing the Model-View-Controller architecture. Refer to the extensive documentation for detailed usage instructions, code samples, and best practices.

== Screenshots ==

1. Screenshot 1: [Description of the screenshot]
2. Screenshot 2: [Description of the screenshot]

== Video Tutorial ==

Check out our video tutorial on how to use WP MVC Plugin:
[Link to Video Tutorial]

== Support ==

For plugin support, please visit the [WP MVC support forum](https://wordpress.org/support/plugin/wpmvc).

== Contact Us ==

Got questions? Contact us at support@vedyweb.com or visit our website [https://vedyweb.com/contact](https://vedyweb.com/contact).

== Follow Us ==

Stay up-to-date with the latest news and updates by following us on social media:
- [Twitter](https://twitter.com/vedyweb)
- [Facebook](https://facebook.com/vedyweb)
- [Instagram](https://instagram.com/vedyweb)

== Contribute ==

Contribute to the continued development of WP MVC Plugin on [GitHub](https://github.com/yourusername/wpmvc). Your contributions are welcome!

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
This is the first release of WP MVC Plugin, offering a powerful MVC framework for WordPress developers.

== Donate ==

If you find this plugin useful, consider supporting its development by making a donation:
[Donate Now](https://vedyweb.com/donate)

== License ==

WP MVC Plugin is released under the GNU General Public License v3 or later.