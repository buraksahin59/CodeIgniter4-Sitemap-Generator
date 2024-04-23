<?php

namespace App\Controllers;
use App\Entities\BlogEntity;
use App\Models\BlogModel;

class BlogController extends BaseController {

    protected $sitemapController;
    protected $blogEntity;
    protected $blogModel;

    public function __construct() {
        $this->sitemapController = new SitemapController();
        $this->blogEntity = new BlogEntity();
        $this->blogModel = new BlogModel();
    }

    // Add Blog
    public function addBlog() {
        if ( $this->request->getMethod() === 'post' ) {

            // Variables
            $blog_title = $this->request->getPost('blog_title');
            $blog_content = $this->request->getPost('blog_content');

            // Set datas by Entity
            $this->blogEntity->setBlogTitle($blog_title);
            $this->blogEntity->setBlogContent($blog_content);

            // Insert
            $this->blogModel->insert($this->blogEntity);

            if ( $this->blogModel->errors() ) {

                return json_encode( array('result' => false, 'message' => array_values($this->blogModel->errors())) );

            } else {

                // Generate Sitemap
                $this->sitemapController;

                return json_encode( array('result' => true, 'message' => lang('API.BlogController.addBlog.success')) );
            }
        }
	}

    // Edit Blog
    public function editBlog($hash) {
        if ( $this->request->getMethod() === 'post' ) {

            // Variables
            $blog_id = $this->request->getPost('blog_id');
            $blog_title = $this->request->getPost('blog_title');
            $blog_content = $this->request->getPost('blog_content');

            // Update datas
            $blog = $this->blogModel->find($blog_id);
            $blog->setBlogTitle($blog_title);
            $blog->setBlogContent($blog_content);

            // Save
            $this->blogModel->save($blog);

            if ( $this->blogModel->errors() ) {

                return json_encode( array('result' => false, 'message' => array_values($this->blogModel->errors())) );

            } else {

                // Generate Sitemap
                $this->sitemapController;

                return json_encode( array('result' => true, 'message' => lang('API.BlogController.editBlog.success')) );
            }

        }
	}

    // Delete Blog
    public function deleteBlog() {
        if ( $this->request->getMethod() === 'post' ) {

            $blog_id = $this->request->getPost('blog_id');

            $blog = $this->blogModel->find($blog_id);
            $blog->delete();
            $this->blogModel->save($blog);

            if ( $this->blogModel->errors() ) {

                return json_encode( array('result' => false, 'message' => array_values($this->blogModel->errors())) );

            } else {

                // Generate Sitemap
                $this->sitemapController;

                return json_encode( array('result' => true, 'message' => lang('API.BlogController.deleteBlog.success')) );
            }
        }
	}

}
