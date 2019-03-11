@extends('layouts.site.main')
@section('title','Ecommerce Store')

@section('banner-slider')
    @parent
@endsection

@section('content')
    @foreach($pageData['items'] as $item)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="{{ url('/product-detail/'.$item->id) }}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ url('/product-detail/'.$item->id) }}">{{ ucfirst($item->name ) }}</a>
                </h4>
                <h5>PKR&nbsp;{{ $item->price }}</h5>
                <p class="card-text">{{ $item->detail  }}</p>
            </div>
            <div class="card-footer">
                <span class="text-warning">
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $pageData['rating'][$item->id])
                            &#9733;
                        @else
                            &#9734;
                        @endif
                    @endfor
                </span>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('paginate')
        {{ $pageData['items']->links() }}
@endsection