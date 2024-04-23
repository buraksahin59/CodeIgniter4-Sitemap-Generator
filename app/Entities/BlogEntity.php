<?php

namespace App\Entities;

use \CodeIgniter\Entity;

class BlogEntity extends Entity {

    protected $blog_id;
    protected $blog_title;
    protected $blog_slug;
    protected $blog_content;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function __construct() {
    }

    /**
     * Get Parameters
     */
    public function getID() {
        return intval($this->attributes['blog_id']);
    }

    public function getBlogTitle() {
        return $this->attributes['blog_title'];
    }

    public function getBlogSlug() {
        return $this->attributes['blog_slug'];
    }

    public function getBlogContent() {
        return $this->attributes['blog_content'];
    }

    public function getLastMod() { // For Sitemap
        return date('Y-m-d', strtotime($this->attributes['updated_at']));
    }
    /**
     * Get Parameters End
     */

}
