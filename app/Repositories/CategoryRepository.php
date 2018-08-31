<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get all the available categories
     * @param null $status
     * @return Category[]
     */
    public function getCategories($status = null)
    {
        $query = $this->category;

        if (!is_null($status)) {
            $query = $query->where('status', (bool) $status);
        }

        return $query->get();
    }

    /**
     * Get a category by $categoryId
     * @param $categoryId
     * @return Category
     */
    public function getCategory($categoryId)
    {
        return $this->category->where('id', $categoryId)->first();
    }

    /**
     * Create a new category
     *
     * @param array $data
     * @return mixed
     */
    public function createCategory(array $data)
    {
        return $this->category->create($this->getModelDataFromRequest($data));
    }

    /**
     * Update Category
     *
     * @param $categoryId
     * @param array $data
     * @return mixed
     */
    public function updateCategory($categoryId, array $data)
    {
        return $this->category->where('id', $categoryId)->update($this->getModelDataFromRequest($data));
    }

    /**
     * Get the model data from the request
     *
     * @param array $data
     * @return array
     */
    private function getModelDataFromRequest(array $data)
    {
        $newData = [];

        if (array_key_exists('name', $data) && !empty($data['name'])) {
            $newData['name'] = $data['name'];
            $newData['slug'] = str_slug($data['name']);
        }

        // override slug if required
        if (array_key_exists('slug', $data) && !empty($data['slug'])) {
            $newData['slug'] = str_slug($data['slug']);
        }

        $newData['status'] = isset($data['status']) && (int) $data['status'] > 0 ? 1 : 0;

        return $newData;
    }
}