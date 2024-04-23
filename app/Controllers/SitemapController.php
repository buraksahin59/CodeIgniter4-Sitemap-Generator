<?php

namespace App\Controllers;
use App\Models\SitemapModel;
use App\Models\BlogModel;

/**
 * Example use of the CodeIgniter Sitemap Generator Model
 * 
 * @author Gerard Nijboer <me@gerardnijboer.com>
 * @author Burak Şahin <iletisim@buraksah.in>
 * @version 1.0
 * @access public
 *
 */
class SitemapController extends BaseController {

    protected $sitemapModel;
    protected $blogModel;

    public function __construct() {
		// We load the `filesystem` helper to be able to use the `write_file()` function
        helper('filesystem');

		$this->sitemapModel = new SitemapModel();
		$this->blogModel = new BlogModel();

        // Generate Sitemaps
        $this->index();
        $this->general();
        $this->blog();
	}

	
	/**
	 * Generate a sitemap index file
	 * More information about sitemap indexes: http://www.sitemaps.org/protocol.html#index
	 */
	public function index() {
		// Clean the Sitemap
		$this->sitemapModel->clear();

		// Add links to Sitemap
		$this->sitemapModel->add(base_url('sitemap-general.xml'), date('Y-m-d', time()));
		$this->sitemapModel->add(base_url('sitemap-blog.xml'), date('Y-m-d', time()));

        write_file( FCPATH . 'sitemap.xml', $this->sitemapModel->output('sitemapindex'), 'w');
	}
	
	/**
	 * Generate a sitemap both based on static urls and an array of urls
	 */
	public function general() {
		// Clean the Sitemap
		$this->sitemapModel->clear();

		// Add links to Sitemap
		$this->sitemapModel->add(base_url(), NULL, 'monthly', 1);
		$this->sitemapModel->add(base_url('contact'), NULL, 'monthly', 0.9);

		foreach ($this->articles as $article) {
			$this->sitemapModel->add($article['loc'], $article['lastmod'], $article['changefreq'], $article['priority']);
		}

		write_file( FCPATH . 'sitemap-general.xml', $this->sitemapModel->output(), 'w');
	}

	/**
	 * Generate a sitemap only on an array of urls
	 */
	public function blog() {
		// Clean the Sitemap
		$this->sitemapModel->clear();

		// Add links to Sitemap
		$blogs = $this->blogModel->findAll();
		foreach ($blogs as $blog) {
			$this->sitemapModel->add(base_url("blog/{$blog->getBlogSlug()}"), $blog->getLastMod(), 'monthly', 0.5);
		}

        write_file( FCPATH . 'sitemap-blog.xml', $this->sitemapModel->output(), 'w');

	}
	
}