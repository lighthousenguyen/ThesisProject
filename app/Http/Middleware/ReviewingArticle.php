<?php

namespace App\Http\Middleware;

use VMN\ArticleReviewService\Review;
use Illuminate\Http\Request;

class ReviewingArticle
{
    public function handle(Request $request, \Closure $next)
    {
        $review = $this->buildReviewObject($request);
        app()->bind(Review::class, function () use ($review) {
            return $review;
        });

        return $next($request);
    }

    public function buildReviewObject($request)
    {
        $review = new Review();
        $review->setComment($request->get('commentContent'));
        $review->setRating($request->get('ratingPoint'));
        $review->setReviewed($request->get('Id'));
        $review->setReviewer(\Session::get('credential')['attributes']['name']);
        return $review;
    }
}