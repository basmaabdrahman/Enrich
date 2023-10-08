<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews=Review::all();
        return view('reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
