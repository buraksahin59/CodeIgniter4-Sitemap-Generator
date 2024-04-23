<?php

namespace App\Models;

use App\Entities\BlogEntity;
use \CodeIgniter\Model;

class BlogModel extends Model {

    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $returnType = BlogEntity::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'blog_id',
        'blog_title',
        'blog_slug',
        'blog_content',
        'deleted_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'blog_title' => 'required|string',
        'blog_slug' => 'required|string',
        'blog_content' => 'required|string',
    ];

}

