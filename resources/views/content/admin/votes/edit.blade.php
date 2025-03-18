@extends('layouts/layoutMaster')

@section('title', 'Edit Vote')


@section('content')

@if ($errors->any())
  <div class="alert m-1 alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<!-- votes edit -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Edit Vote</h5>
      </div>
      <div class="card-body">
        <form action="{{route('vote-update', $vote->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" value="{{old('title', $vote->title)}}" name="title" placeholder="Title" aria-label="Title" aria-describedby="title" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="option1">Option 1</label>
                <input type="text" class="form-control" id="option1" value="{{old('option1', $vote->option1)}}" name="option1" placeholder="Option 1" aria-label="Option 1" aria-describedby="option1" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="option2">Option 2</label>
                <input type="text" class="form-control" id="option2" value="{{old('option2', $vote->option2)}}" name="option2" placeholder="Option 2" aria-label="Option 2" aria-describedby="option2" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="option3">Option 3</label>
                <input type="text" class="form-control" id="option3" value="{{old('option3', $vote->option3)}}" name="option3" placeholder="Option 3" aria-label="Option 3" aria-describedby="option3">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="option4">Option 4</label>
                <input type="text" class="form-control" id="option4" value="{{old('option4', $vote->option4)}}" name="option4" placeholder="Option 4" aria-label="Option 4" aria-describedby="option4">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="start">Start</label>
                <input type="datetime-local" class="form-control" id="start" value="{{old('start', $vote->start)}}" name="start" placeholder="Start" aria-label="Start" aria-describedby="start" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="end">End</label>
                <input type="datetime-local" class="form-control" id="end" value="{{old('end', $vote->end)}}" name="end" placeholder="End" aria-label="End" aria-describedby="end" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
