@extends('main')
@section('title', 'Plans')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Plans</h3>
    <div class="card-tools">
      <a class="btn btn-info" href="{{route('plans.create')}}">create</a>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
            <th>ID</th>
            <th>status</th>
            <th>created at</th>
            <th>view</th>
            <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($plans as $plan)
          <tr>
            <td>{{$plan->id}}</td>
            <td>
              @if ($loop->first)
                <span class="btn btn-success">active</span>
              @endif
            </td>
            <td>{{$plan->created_at}}</td>
              <td>
                  <a class="btn btn-success" href="{{route('plans.show',$plan->id)}}">view</a>
              </td>
            <td>
                <form action="{{route('plans.destroy',$plan)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
