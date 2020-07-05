<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ReviewCollection(Review::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->fill($request->all());
        $review->beginning_text = mb_substr($request['body'], 0, 80);
        $review->user_id = 1;
        $review->save();
        return new ReviewResource($review);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $review->fill($request->all());
        if ($request['body']) {
            $review->beginning_text = mb_substr($request['body'], 0, 80);
        }
        $review->save();
        return new ReviewResource($review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response('削除しました', 200);
    }
}
