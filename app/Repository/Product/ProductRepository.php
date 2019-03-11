<?php
/**
 * Created by PhpStorm.
 * User: fezan
 * Date: 3/9/2019
 * Time: 8:15 PM
 */

namespace App\Repository\Product;


interface ProductRepository
{
    public function getAll();

    public function getProduct($id);

    public function getProductsByCategoryId($id);

    public function getProductsByCategoryName($name);

    public function deleteProduct($id);

    public function updateProduct($id, array $data);

}