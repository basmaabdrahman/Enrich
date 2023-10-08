@extends('layouts.master')
@section('title')
Reviews
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Reviews</h4>
                </div>
                <div class="card-body">
                    <div class="card-footer">
                        <a href="{{url('reviews/create')}}"class="btn btn-fill btn-success"  >Add Review</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Student Name
                                </th>
                                <th>
                                    Review
                                </th>
                                <th>
                                    Star
                                </th>

                                <th>
                                    operations
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                               @foreach($reviews as $review)
                                <tr>
                                    <td>
                                        {{$review->client_name}}
                                    </td>
                                    <td>
                                        {{$review->review}}
                                    </td>
                                    <td>
                                        {{$review->star_number}}
                                    </td>

                                    <td>
                                        <div class="card-footer">
                                            <a href="{{url('reviews')}}/{{$review->id}}/edit" class="btn  btn-primary" >Update</a>
                                            <a href="{{url('review')}}/{{$review->id}}" class="btn  btn-danger" >Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
