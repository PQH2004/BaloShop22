@extends('front.layout.master')

@section('title', 'Blog')




@section('body')

<div class="container mx-auto">
    <div class="row">
       <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1"></div>
       <div class="col-lg-9 order-1 order-lg-2">
      <p class="text-xl font-bold">  {{$chitiet->title}}</p>
        @if ($chitiet->image != "Null")
        <img src="./front/img/blog/{{$chitiet->image}}" alt="">
        @else 
        <img src="./front/img/user/dfPost.jpg" alt="">
        @endif
       </div>
    </div>
</div>

@endsection