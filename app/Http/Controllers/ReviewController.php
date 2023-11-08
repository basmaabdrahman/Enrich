<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewDataTable;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{

    public function index(ReviewDataTable $dataTable)
    {
        return $dataTable->render('reviews.index');

    }
    public function getReview(ReviewDataTable $dataTable){
        return DataTables::of(Review::query())->make('true');
    }


    public function create()
    {
        return view('reviews.add-review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Review::create([
            'client_name'=>$request->name,
            'review'=>$request->review,
            'star_number'=>$request->star
        ]);
        return redirect('reviews');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $review=Review::find($id);
        return view('reviews.update-review',compact('review'));
    }


    public function update(Request $request, $id)
    {
        $review=Review::find($id);
        $review->update([
            'client_name'=>$request->name,
            'review'=>$request->review,
            'star_number'=>$request->star,
        ]);
        return redirect('/reviews');
    }


    public function destroy($id)
    {
        $review=Review::find($id);
        $review->delete();
        return redirect('/reviews');
    }
}
