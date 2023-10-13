@extends('main')
@section('title', 'Week Plans')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">result</h3>
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
        @foreach($parts as $part)
            <tr>
                <td>{{$part->number}}</td>
                <td>{{$part->Sat_shift_1}}</td>
                <td>{{$part->Sat_shift_2}}</td>
                <td>{{$part->Sat_shift_3}}</td>

                <td>{{$part->Sun_shift_1}}</td>
                <td>{{$part->Sun_shift_2}}</td>
                <td>{{$part->Sun_shift_3}}</td>

                <td>{{$part->Mon_shift_1}}</td>
                <td>{{$part->Mon_shift_2}}</td>
                <td>{{$part->Mon_shift_3}}</td>

                <td>{{$part->Tue_shift_1}}</td>
                <td>{{$part->Tue_shift_2}}</td>
                <td>{{$part->Tue_shift_3}}</td>

                <td>{{$part->Wed_shift_1}}</td>
                <td>{{$part->Wed_shift_2}}</td>
                <td>{{$part->Wed_shift_3}}</td>

                <td>{{$part->Thu_shift_1}}</td>
                <td>{{$part->Thu_shift_2}}</td>
                <td>{{$part->Thu_shift_3}}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
