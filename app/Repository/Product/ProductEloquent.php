<?php
/**
 * Created by PhpStorm.
 * User: fezan
 * Date: 3/9/2019
 * Time: 8:19 PM
 */

namespace App\Repository\Product;

use App\Model\Product;

class ProductEloquent implements ProductRepository
{
    /**
     * @var Product
     */
    private $model;


    /**
     * ProductEloquent constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Get all products
     */
    public function getAll()
    {
        $products = $this->model->paginate(6);
        return $products;
    }

    /**
     * @param $id
     * @return mixed
     * Get specific product
     */
    public function getProduct($id)
    {
        $product = $this->model->findOrFail($id);
        return $product;
    }

    /**
     * @param $id
     * @return bool
     * Delete specific product
     */
    public function deleteProduct($id)
    {
        $product = $this->model->findOrFail($id);
        $product->delete();
        return true;
    }

    /**
     * @param $id
     * @param array $data
     * Update specific product
     * @return bool
     */
    public function updateProduct($id, array $data)
    {
        $this->model->where('id', $id)
            ->update($data);
        return true;
    }

    public function getProductsByCategoryId($id)
    {
        $products = $this->model->where('category_id', $id)
            ->paginate(6);
        return $products;
    }

    public function getProductsByCategoryName($name)
    {
        $products = $this->model->all()->reject(function($item) use ($name){
            return $item->category->name != $name;
        })
        ->map(function($item){
            return $item;
        });

        return $products;
    }
}