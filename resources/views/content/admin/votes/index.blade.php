@extends('layouts/layoutMaster')

@section('title', 'vote List')


@section('content')
<div class="text-center">
  <button type="button" class="btn mb-2 btn-primary" data-bs-toggle="modal" data-bs-target="#addVoteModal"><i class="ti ti-plus"></i> Add Vote</button>
</div>
@if ($errors->any())
  <div class="alert m-1 alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<!-- votes List Table -->
<div class="col">
  <div class="swiper-reviews-carousel overflow-hidden">
    <div class="swiper" id="swiper-reviews">

      <div class="swiper-wrapper">
        @forelse ($votes as $vote)
        @php
        $totalVotes = $vote->opt1_count + $vote->opt2_count + $vote->opt3_count + $vote->opt4_count;
        @endphp
        <div class="swiper-slide mb-2">
          <div class="card mb-3 h-100">
            <div class="card-body text-body d-flex flex-column justify-content-between h-100">
              <div class="mb-4 d-flex">
                <h4>{{$vote->title}}</h4>
                <div class="position-absolute" style="right: 10px">
                  <div class="d-inline-block text-nowrap">
                    <a href="{{ route('vote-edit', $vote->id) }}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light">
                        <i class="ti ti-edit ti-md"></i>
                    </a>
                    <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical ti-md"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end m-0">
                        <form action="{{ route('vote-destroy', $vote->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this vote?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="dropdown-item text-danger">Delete</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
              @if ($vote->option1)
              <div class="d-flex mb-2 align-items-center">
                <div class="text-body me-3" style="width: 100px">{{$vote->option1}}</div>
                <div div="" class="progress w-100" style="height: 8px;">
                  <div class="progress-bar" role="progressbar" style="width:@if($vote->opt1_count != 0){{$vote->opt1_count / $totalVotes * 100}}%@else 0% @endif;" aria-valuenow="{{$vote->opt1_count}}" aria-valuemin="0" aria-valuemax="{{$totalVotes}}">
                  </div>
                </div>
                <div class="text-body ms-3">{{$vote->opt1_count}}</div>
              </div>
              @endif
              @if ($vote->option2)
              <div class="d-flex mb-2 align-items-center">
                <div class="text-body me-3" style="width: 100px">{{$vote->option2}}</div>
                <div div="" class="progress w-100" style="height: 8px;">
                  <div class="progress-bar" role="progressbar" style="width:@if($vote->opt2_count != 0){{$vote->opt2_count / $totalVotes * 100}}%@else 0% @endif;" aria-valuenow="{{$vote->opt2_count}}" aria-valuemin="0" aria-valuemax="{{$totalVotes}}">
                  </div>
                </div>
                <div class="text-body ms-3">{{$vote->opt2_count}}</div>
              </div>
              @endif
              @if ($vote->option3)
              <div class="d-flex mb-2 align-items-center">
                <div class="text-body me-3" style="width: 100px">{{$vote->option3}}</div>
                <div div="" class="progress w-100" style="height: 8px;">
                  <div class="progress-bar" role="progressbar" style="width:@if($vote->opt3_count != 0){{$vote->opt3_count / $totalVotes * 100}}%@else 0% @endif;" aria-valuenow="{{$vote->opt3_count}}" aria-valuemin="0" aria-valuemax="{{$totalVotes}}">
                  </div>
                </div>
                <div class="text-body ms-3">{{$vote->opt3_count}}</div>
              </div>
              @endif
              @if ($vote->option4)
              <div class="d-flex mb-2 align-items-center">
                <div class="text-body me-3" style="width: 100px">{{$vote->option4}}</div>
                <div div="" class="progress w-100" style="height: 8px;">
                  <div class="progress-bar" role="progressbar" style="width:@if($vote->opt4_count != 0){{$vote->opt4_count / $totalVotes * 100}}%@else 0% @endif;" aria-valuenow="{{$vote->opt4_count}}" aria-valuemin="0" aria-valuemax="{{$totalVotes}}">
                  </div>
                </div>
                <div class="text-body ms-3">{{$vote->opt4_count}}</div>
              </div>
              @endif
            </div>
            <div class="card-footer">
              <div class="text-center row">
                <div class="col-md-6">
                  <bold>Start Date</bold><small><i class="ti ti-clock me-1 ti-14px"></i>{{$vote->start}}</small>
                </div>
                <div class="col-md-6">
                  <bold>End Date</bold><small><i class="ti ti-clock me-1 ti-14px"></i>{{$vote->end}}</small>
                </div>
              </div>
            </div>
        </div>
        @empty
        <div class="col-12">
          <h2>There no votes now</h2>
        </div>
        @endforelse
      </div>
      {{$votes->links()}}
    </div>
  </div>
</div>

<div class="modal fade" id="addVoteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Write a Vote</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('vote-store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
          </div>
          <div class="mb-3">
            <label for="option1" class="form-label">Option 1</label>
            <input id="option1" type="text" class="form-control" name="option1" required>
          </div>
          <div class="mb-3">
            <label for="option2"  class="form-label">Option 2</label>
            <input id="option2" type="text" class="form-control" name="option2" required>
          </div>
          <div class="mb-3">
            <label for="option3" class="form-label">Option 3</label>
            <input id="option3" type="text" class="form-control" name="option3">
          </div>
          <div class="mb-3">
            <label for="option4" class="form-label">Option 4</label>
            <input id="option4" type="text" class="form-control" name="option4">
          </div>
          <div class="mb-3">
            <label for="start" class="form-label">start</label>
            <input id="start" type="datetime-local" class="form-control" name="start" required>
          </div>
          <div class="mb-3">
            <label for="end" class="form-label">end</label>
            <input id="end" type="datetime-local" class="form-control" name="end" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit Vote</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
