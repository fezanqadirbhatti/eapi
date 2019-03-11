<?php
/**
 * Created by PhpStorm.
 * User: fezan
 * Date: 3/9/2019
 * Time: 8:47 PM
 */

namespace App\Repository\Review;


use App\Model\Review;

class ReviewEloquent implements ReviewRepository
{
    /**
     * @var Review
     */
    private $review;

    /**
     * ReviewEloquent constructor.
     * @param Review $review
     */
    public function __construct(Review $review)
    {

        $this->review = $review;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Get all product reviews
     */
    public function getAll()
    {
        return $this->review->all();
    }

    /**
     * @param $id
     * @return mixed
     * Get specific review details
     */
    public function getReview($id)
    {
        return $this->review->findOrFail($id);
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     * Update product review
     */
    public function updateReview($id, array $data)
    {
        $review = $this->review->where('id', $id)
            ->update($data);
        return true;
    }

    /**
     * @param $id
     * @return bool
     * Delete product review
     */
    public function deleteReview($id)
    {
        $review = $this->review->findOrFail($id);
        $review->delete();
        return true;
    }

    public function getAvgRating($id)
    {
        $avgRating = $this->review->where('product_id', $id)
            ->avg('star_rating');
        return round($avgRating);
    }

    public function getAllProductReviews($id)
    {
        $reviews = $this->review->where('product_id',$id)
            ->paginate(3);
        return $reviews;
    }
}