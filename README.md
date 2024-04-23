# CodeIgniter 4 Sitemap Generator Model

Generate a sitemap or sitemap index file for your web application with the CodeIgniter 4 PHP framework.
This CodeIgniter 4 model quickly enables you to generate a valid SEO-friendly sitemap file for you web application and/or website. An XML sitemap file helps crawlers of search engines to easily navigate and browse through your website and understand the structure of the different urls.

## What are sitemaps?
Sitemaps are an easy way for webmasters to inform search engines about pages on their sites that are available for crawling. In its simplest form, a Sitemap is an XML file that lists URLs for a site along with additional metadata about each URL (when it was last updated, how often it usually changes, and how important it is, relative to other URLs in the site) so that search engines can more intelligently crawl the site.

Web crawlers usually discover pages from links within the site and from other sites. Sitemaps supplement this data to allow crawlers that support Sitemaps to pick up all URLs in the Sitemap and learn about those URLs using the associated metadata. Using the Sitemap protocol does not guarantee that web pages are included in search engines, but provides hints for web crawlers to do a better job of crawling your site.

[Read more about the Sitemap protocol on sitemaps.org](http://www.sitemaps.org/protocol.html).

## Installation
Copy the files in the **app** folder into your CodeIgniter 4 app folder. This includes the **Models/SitemapModel.php and Controllers/SitemapController.php** files and examples **Controllers/BlogController.php, Entities/BlogEntity.php and Models/BlogModel.php** files. Follow the instructions below on how to use the model in your own controller.

## Usage

The model is designed to be called and controlled by a CodeIgniter 4 controller. The model create and save an actual XML-file to be saved on the disk. It generates a valid XML-file upon each action such as create, edit and delete from the controller.

### Load the model and controller
- Add the `SitemapModel.php` to your Models folder and `SitemapController.php` to your Controllers folder.
- Edit the `SitemapController.php` according to your own system. There is 2 examples in `SitemapController.php`; 
- - Static Example `general()`:  You can add static link such as in the function.
- - Dynamic Example `blog()`: You need a Model or DB query for the dynamic system. I have added an example for Model systems.

### Generate sitemap files automatically
Check the `BlogController.php` file to generate sitemap files automatically. 
There are 3 action type in `BlogController.php`;
- Add Blog
- Edit Blog
- Delete Blog

If there is no error during action (insert, update, delete), Add the code given below after insert, save, delete actions.

```HTML+PHP
// Generate Sitemap
$this->sitemapController;
```

Check the lines [41](https://github.com/buraksahin59/CodeIgniter4-Sitemap-Generator/blob/efbeb14dc91eb4915ce6e50871315be339602b8f/App/Controllers/BlogController.php#L41), [72](https://github.com/buraksahin59/CodeIgniter4-Sitemap-Generator/blob/efbeb14dc91eb4915ce6e50871315be339602b8f/app/Controllers/BlogController.php#L72), [97](https://github.com/buraksahin59/CodeIgniter4-Sitemap-Generator/blob/efbeb14dc91eb4915ce6e50871315be339602b8f/App/Controllers/BlogController.php#L97).

----

Thanks to [Gerard Nijboer](https://github.com/alphabase/CodeIgniter-Sitemap-Generator) to create in the CodeIgniter 3 code structure.
