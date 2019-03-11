@extends('layouts.site.main')
@section('title','Ecommerce Store')

@section('left-sidebar')
    @parent
@endsection

@section('banner-slider')

@endsection

@section('content')
    <div class="col-lg-12">
        @if($pageData['item'])
        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            <div class="card-body">
                <h3 class="card-title">{{ ucfirst($pageData['item']->name) }}</h3>
                <h4>PKR&nbsp;{{ $pageData['item']->price }}</h4>
                <p class="card-text">{{ $pageData['item']->detail }}</p>
                <span class="text-warning">
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $pageData['rating'])
                            &#9733;
                        @else
                            &#9734;
                        @endif
                    @endfor
                </span>
                &nbsp; &nbsp;<small>{{ $pageData['rating'] }} stars</small>
            </div>
        </div>
        <!-- /.card -->
        @endif
        @if($pageData['reviews'])
        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Product Reviews
            </div>
            <div class="card-body">
                @foreach($pageData['reviews'] as $review)
                <p> {{ $review->review }} </p>
                <small class="text-muted">Posted by <strong>{{ $review->user->name }}</strong> on {{ $review->created_at->format('m/d/Y') }}</small>
                <hr>
                @endforeach
                <a href="#" class="float-left d-inline btn btn-success">Leave a Review</a>
                <div class="d-inline float-right">
                    {{ $pageData['reviews']->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
        @endif

    </div>
    <!-- /.col-lg-9 -->
@endsection