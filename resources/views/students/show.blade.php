@extends('layouts.master')
@section('content')
    <img srcset="{{$student->getFirstMedia('students')->getUrl()}}">
@endsection
