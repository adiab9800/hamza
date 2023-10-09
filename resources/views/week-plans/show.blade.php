@extends('main')
@section('title', 'Week Plans')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Week Plans</h3>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
            <th rowspan="2">code</th>
            <th colspan="3">SAT</th>
            <th colspan="3">SUN</th>
            <th colspan="3">MON</th>
            <th colspan="3">TUE</th>
            <th colspan="3">WED</th>
            <th colspan="3">THU</th>
        </tr>
        <tr>
            <th>Shift-1</th>
            <th>Shift-2</th>
            <th>Shift-3</th>

            <th>Shift-1</th>
            <th>Shift-2</th>
            <th>Shift-3</th>

            <th>Shift-1</th>
            <th>Shift-2</th>
            <th>Shift-3</th>

            <th>Shift-1</th>
            <th>Shift-2</th>
            <th>Shift-3</th>

            <th>Shift-1</th>
            <th>Shift-2</th>
            <th>Shift-3</th>

            <th>Shift-1</th>
            <th>Shift-2</th>
            <th>Shift-3</th>
        </tr>
      </thead>
      <tbody>
        @foreach($weekCodes as $codeId => $weekCode)
            <tr>
                <td>{{\App\Models\Code::find($codeId)->code}}</td>
                <td>{{$weekCode->where('day','Sat')->where('shift','Shift-1')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Sat')->where('shift','Shift-2')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Sat')->where('shift','Shift-3')->first()?->quantity}}</td>

                <td>{{$weekCode->where('day','Sun')->where('shift','Shift-1')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Sun')->where('shift','Shift-2')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Sun')->where('shift','Shift-3')->first()?->quantity}}</td>

                <td>{{$weekCode->where('day','Mon')->where('shift','Shift-1')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Mon')->where('shift','Shift-2')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Mon')->where('shift','Shift-3')->first()?->quantity}}</td>

                <td>{{$weekCode->where('day','Tue')->where('shift','Shift-1')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Tue')->where('shift','Shift-2')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Tue')->where('shift','Shift-3')->first()?->quantity}}</td>

                <td>{{$weekCode->where('day','Wed')->where('shift','Shift-1')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Wed')->where('shift','Shift-2')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Wed')->where('shift','Shift-3')->first()?->quantity}}</td>

                <td>{{$weekCode->where('day','Thu')->where('shift','Shift-1')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Thu')->where('shift','Shift-2')->first()?->quantity}}</td>
                <td>{{$weekCode->where('day','Thu')->where('shift','Shift-3')->first()?->quantity}}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
