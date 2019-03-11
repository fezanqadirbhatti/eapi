<?php
/**
 * Created by PhpStorm.
 * User: fezan
 * Date: 3/10/2019
 * Time: 5:16 PM
 */

namespace App\Repository\Category;


interface CategoryRepository
{
    public function getAll();

    public function getCategoryById($id);

    public function getCategoryByName($name);

    public function updateCategoryById($id, array $data);

    public function deleteCategoryById($id, array $data);
}