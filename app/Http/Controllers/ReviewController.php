<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function index()
    {
        $reviews=Review::all();
        return view('reviews.index',compact('reviews'));
    }

    
    public function create()
    {
        return view('reviews.add-review');
    }

    
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
