<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryRepository;
use App\Repository\Product\ProductRepository;
use App\Repository\Review\ReviewRepository;

class PageController extends Controller
{
    protected $pageViewPath;
    protected $pageExtension;
    /**
     * @var ProductRepository
     */
    private $product;

    /**
     * @var ReviewRepository
     */
    private $review;
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(ProductRepository $product,
                                ReviewRepository $review,
                                CategoryRepository $category)
    {
        $this->pageViewPath = base_path().'\resources\views\site\\';
        $this->pageExtension  = '.blade.php';
        $this->product = $product;
        $this->review = $review;
        $this->category = $category;
    }

    public function index($page='index', $data = null)
    {
        if (file_exists($this->pageViewPath.$page.$this->pageExtension)) {
            $pageData = $this->loadPageData($page, $data);
            return view('site.'.$page, compact('pageData'));
        } else {
            abort(404, 'The requested page ('. $page .') not found.');
        }
    }

    public function loadPageData($page, $data = null)
    {
        $pageData = [];
        $pageData['categories'] = $this->category->getAll();
        if ($page == 'index')
        {
            $pageData['items'] = $this->product->getAll();
            foreach ($pageData['items'] as $item) {
                $pageData['rating'][$item->id] = $this->review->getAvgRating($item->id);
            }
            $pageData['url'] = $page;
        }elseif ($page == 'product-detail'){
            $pageData['item'] = $this->product->getProduct($data);
            $pageData['rating'] = $this->review->getAvgRating($data);
            $pageData['reviews'] = $this->review->getAllProductReviews($data);
            $pageData['url'] = $page;
        }elseif ($page == 'category'){
            $pageData['category'] = $this->category->getCategoryByName($data);
            $pageData['items'] = $this->product->getProductsByCategoryName($data);
            foreach ($pageData['items'] as $item) {
                $pageData['rating'][$item->id] = $this->review->getAvgRating($item->id);
            }
            $pageData['url'] = $page;
        }

        return $pageData;
    }
}
