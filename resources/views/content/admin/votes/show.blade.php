@extends('layouts/layoutMaster')

@section('title', 'Show Vote')


@section('content')


@if (!auth()->user()->identify_image)
  @if ($errors->any())
    <div class="alert m-1 alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Identify Confirmation Before Voting</h5>
        </div>
        <div class="card-body">
          <form action="{{route('user-identify-confirmation')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label class="form-label" for="identify_image">Identify Image</label>
                  <input type="file" class="form-control" id="identify_image" name="identify_image" required>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label class="form-label" for="image">Personal Image</label>
                  <input type="file" class="form-control" id="image" name="image" required>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@else
  <!-- Vote -->

  <div class="row mb-3">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Vote</h5>
        </div>
        <div class="card-body">
          <form action="{{route('user-vote', $vote->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col mb-2">
                @if ($vote->option1)
                  <input type="radio" value="1" name="option" id="option1">
                  <label for="option1">{{$vote->option1}}</label>
                @endif
              </div>

              <div class="col mb-2">
                @if ($vote->option2)
                  <input type="radio" value="2" name="option" id="option2">
                  <label for="option2">{{$vote->option2}}</label>
                @endif
              </div>

              <div class="col mb-2">
                @if ($vote->option3)
                  <input type="radio" value="3" name="option" id="option3">
                  <label for="option3">{{$vote->option3}}</label>
                @endif
              </div>

              <div class="col mb-2">
                @if ($vote->option4)
                  <input type="radio" value="4" name="option" id="option4">
                  <label for="option4">{{$vote->option4}}</label>
                @endif
              </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @php
  $totalVotes = $vote->opt1_count + $vote->opt2_count + $vote->opt3_count + $vote->opt4_count;
  @endphp

  <div class="swiper-slide mb-2">
    <div class="card mb-3 h-100">
      <div class="card-body text-body d-flex flex-column justify-content-between h-100">
        <div class="mb-4 d-flex">
          <h4>{{$vote->title}}</h4>
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
@endif

@endsection
