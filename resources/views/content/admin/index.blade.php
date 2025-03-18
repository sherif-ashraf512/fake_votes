@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')

@php
use Illuminate\Support\Facades\Session;

@endphp

@if (auth()->user()->type == 'user')
<div class="row">
  @if(Session::has('message'))
  <div class="col-12">
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
  </div>
  @endif

  @forelse ($Products as $item)
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="bg-label-primary rounded text-center mb-4 pt-4">
          <img class="img-fluid" src="{{ asset('assets/'.$item->image) }}" alt="Card girl image" width="140" />
        </div>
        <h5 class="mb-2">{{$item->title}}</h5>
        <p class="small">{!! $item->description !!}</p>
        <div class="row mb-4 g-3">
          <div class="col-6">
            <div class="d-flex">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-coin ti-28px"></i></span>
              </div>
              <div>
                <h6 class="mb-0 text-nowrap">{{$item->price}} EGP</h6>
                <small>Price</small>
              </div>
            </div>
          </div>
        </div>
        @if(!auth()->user()->orders->where('product_id', $item->id)->count())
          <a href="{{ url('product/'.$item->id .'/buy') }}" class="btn btn-primary w-100">Buy</a>
        @else
          <button class="btn btn-secondary w-100 mb-5" disabled>Already Purchased</button>
          @if(!$item->reviews->where('user_id', auth()->user()->id)->count())
            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#reviewModal{{$item->id}}">Write Review</a>
          @else
            <button class="btn btn-secondary w-100" disabled>Already Reviewed</button>
          @endif

          <!-- Review Modal -->
          <div class="modal fade" id="reviewModal{{$item->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Write a Review for {{$item->title}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('make-order-review', $item->id) }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Rating</label>
                      <select name="rating" class="form-select" required>
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Review</label>
                      <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <h2>There no products now</h2>
  </div>
  @endforelse
</div>
@endif

@if (auth()->user()->type == 'admin')
<div class="row g-6">
  <!-- Card Border Shadow -->
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-primary"><i class='ti ti-brand-databricks ti-28px'></i></span>
          </div>
          <h4 class="mb-0">{{$products}}</h4>
        </div>
        <p class="mb-1">Total products</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-success h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-success"><i class='ti ti-stack-forward ti-28px'></i></span>
          </div>
          <h4 class="mb-0">{{$orders}}</h4>
        </div>
        <p class="mb-1">Total orders</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-border-shadow-warning h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="avatar me-4">
            <span class="avatar-initial rounded bg-label-warning"><i class='ti ti-mood-edit ti-28px'></i></span>
          </div>
          <h4 class="mb-0">{{$reviews}}</h4>
        </div>
        <p class="mb-1">Total reviews</p>
      </div>
    </div>
  </div>
</div>
@endif

@endsection
