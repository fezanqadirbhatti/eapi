<?php
/**
 * Created by PhpStorm.
 * User: fezan
 * Date: 3/9/2019
 * Time: 8:45 PM
 */

namespace App\Repository\Review;


interface ReviewRepository
{
    public function getAll();

    public function getAllProductReviews($id);

    public function getReview($id);

    public function updateReview($id, array $data);

    public function deleteReview($id);

    public function getAvgRating($id);
}