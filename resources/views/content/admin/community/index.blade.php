@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Community')

@section('content')
<div class="col">
  <div class="swiper-reviews-carousel overflow-hidden">
    <div class="swiper" id="swiper-reviews">
      <div class="text-center">
        <small class="btn btn-primary mb-2 btn-sml" data-bs-toggle="modal" data-bs-target="#post">Write a Post <i class="ti fw-bold ti-pencil-share ms-1 ti-14px"></i></small>
      </div>
      <div class="swiper-wrapper">
        @foreach ($posts as $post)
        <div class="mb-4">
          <div class="swiper-slide mb-2">
            <div class="card h-100">
              <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                <div class="mb-4">
                  <small class="btn btn-warning btn-sml position-absolute" style="right: 10px" data-bs-toggle="modal" data-bs-target="#commentModal{{$post->id}}">Comment <i class="ti fw-bold ti-message-plus ms-1 ti-14px"></i></small>
                  <div class="d-flex align-items-center">
                    <div class="avatar me-3 avatar-sm">
                      <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div>
                      <h4 class="mb-0">{{$post->user->name}}</h4>
                    </div>
                  </div>
                </div>
                <p>
                  {{$post->description}}
                </p>
                <div class="d-flex align-items-center">
                  <div class="position-absolute" style="right: 10px">
                    <small><i class="ti ti-clock me-1 ti-14px"></i>{{$post->created_at->diffForHumans()}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if ($post->comments)
          <div class="row">
            @foreach ($post->comments as $comment)
            <div class="swiper-slide col-md-3 mb-2">
              <div class="card h-100">
                <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                  <div class="mb-4">
                    <div class="d-flex align-items-center">
                      <div class="avatar me-3 avatar-sm">
                        <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                      </div>
                      <div>
                        <h6 class="mb-0">{{$comment->user->name}}</h6>
                      </div>
                      <div class="position-absolute" style="right: 10px">
                        <small><i class="ti fw-bold ti-message ms-1 ti-14px"></i></small>
                      </div>
                    </div>
                  </div>
                  <p>
                    {{$comment->description}}
                  </p>
                  <div class="d-flex align-items-center">
                    <div class="position-absolute" style="right: 10px">
                      <small><i class="ti ti-clock me-1 ti-14px"></i>{{$comment->created_at->diffForHumans()}}</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
        </div>
        <div class="modal fade" id="commentModal{{$post->id}}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Write a Comment for {{$post->user->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('comment-add', $post->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">comment</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit Comment</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{$posts->links()}}
    </div>
  </div>
</div>

<div class="modal fade" id="post" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Write a Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('post-add') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Post</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit Post</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
