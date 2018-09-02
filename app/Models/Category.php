<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->getAttribute('slug');
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }
}
