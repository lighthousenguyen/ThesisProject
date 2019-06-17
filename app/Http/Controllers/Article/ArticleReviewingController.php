<?php

namespace App\Http\Controllers\Article;



use App\Http\Controllers\Controller;
use App\Http\Middleware\ReviewingArticle;
use VMN\Article\MedicinalPlant;
use VMN\ArticleReviewService\ArticleReviewService;
use VMN\ArticleReviewService\Review;

/**
 * Class ArticleReviewingController
 * @package App\Http\Controllers\Article
 */
class ArticleReviewingController extends Controller
{
    /**
     * @var ArticleReviewService
     */
    protected $reviewingService;

    /**
     * ArticleReviewingController constructor.
     * @param ArticleReviewService $reviewService
     */
    public function __construct(ArticleReviewService $reviewService)
    {
        $this->reviewingService = $reviewService;
        $this->middleware(ReviewingArticle::class);
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviewPlants(Review $review)
    {
        $this->reviewingService->reviewPlants($review);
    }

    public function reviewRemedy(Review $review)
    {
        $this->reviewingService->reviewRemedy($review);
    }

    public function ratingPlant(Review $review)
    {
        $this->reviewingService->ratingPlant($review);
        return response([
            'status' => 'OK',
            'message' => 'Cảm ơn bạn đã gửi đánh giá'
        ]);
    }

    public function ratingRemedy(Review $review)
    {
        $this->reviewingService->ratingRemedy($review);
        return response([
            'status' => 'OK',
            'message' => 'Cảm ơn bạn đã gửi đánh giá'
        ]);
    }
}