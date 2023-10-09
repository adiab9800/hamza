@extends('main')
@section('title', 'Plans')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Create Plan</h3>
  </div>

    <span class="alert">
        ** please add a valid format for example
        <a style="color: #0c84ff" href="{{asset('parts.xlsx')}}">click here</a>
    </span>
  <form method="post" action="{{route('plans.store')}}" enctype="multipart/form-data">
      @csrf
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div class="form-group">
        <label for="exampleInputFile">plan file (.xlsx,xls)</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="plan">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection
