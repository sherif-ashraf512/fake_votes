@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reviews')

@section('content')
<div class="col">
  <div class="swiper-reviews-carousel overflow-hidden">
    <div class="swiper" id="swiper-reviews">

      <div class="swiper-wrapper">
        @foreach ($reviews as $review)
        <div class="swiper-slide mb-2">
          <div class="card h-100">
            <div class="card-body text-body d-flex flex-column justify-content-between h-100">
              <div class="mb-4">
                <h4>{{$review->product->title}}</h4>
              </div>
              <p>
                {{$review->description}}
              </p>
              <div class="text-warning mb-4">
                @for ($i = 0 ; $i < $review->stars; $i++)
                  <i class="ti ti-star-filled"></i>
                @endfor
              </div>
              <div class="d-flex align-items-center">
                <div class="avatar me-3 avatar-sm">
                  <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                </div>
                <div>
                  <h6 class="mb-0">{{$review->user->name}}</h6>
                </div>
                <div class="position-absolute" style="right: 10px">
                  <a class="btn btn-sml btn-primary" href="">Send to AI <i class="ti ti-grain ms-2 ti-14px"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{$reviews->links()}}
    </div>
  </div>
</div>

@endsection
