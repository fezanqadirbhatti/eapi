<?php
/**
 * Created by PhpStorm.
 * User: fezan
 * Date: 3/10/2019
 * Time: 5:15 PM
 */

namespace App\Repository\Category;

use App\Model\Category;

class CategoryEloquent implements CategoryRepository
{
    /**
     * @var Category
     */
    private $model;

    /**
     * CategoryEloquent constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Get all categories
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     * Get category by their id
     */
    public function getCategoryById($id)
    {
        return $this->model->where('id', $id)
            ->get();
    }

    /**
     * @param $name
     * @return mixed
     * Get category by their name
     */
    public function getCategoryByName($name)
    {
        return $this->model->where('name', $name)
            ->get();
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     * Update category by their name
     */
    public function updateCategoryById($id, array $data)
    {
        $category = $this->model->findOrFail($id);
        $category->update($data);
        return true;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     * Delete category by their id
     */
    public function deleteCategoryById($id, array $data)
    {
        $category = $this->model->findOrFail($id);
        $category->delete();
        return $category;
    }
}