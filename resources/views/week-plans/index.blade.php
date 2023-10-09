@extends('main')
@section('title', 'Week Plans')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Week Plans</h3>
    <div class="card-tools">
      <a class="btn btn-info" href="{{route('week-plans.create')}}">create</a>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>created at</th>
          <th>view</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($weekPlans as $weekPlan)
          <tr>
            <td>{{$weekPlan->id}}</td>
            <td>{{$weekPlan->created_at}}</td>
              <td>
                  <a class="btn btn-success" href="{{route('week-plans.show',$weekPlan->id)}}">view</a>
              </td>
            <td>
                <form action="{{route('week-plans.destroy',$weekPlan)}}" method="POST">
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
