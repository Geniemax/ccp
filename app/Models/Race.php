<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'races';

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    /**
     * @return string
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
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return (bool) $this->getAttribute('status');
    }
}
