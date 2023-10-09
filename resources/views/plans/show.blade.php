@extends('main')
@section('title', 'Plans')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Plans</h3>

  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap table-bordered">
      <thead>
        <tr>
            <th>Part No</th>
            <th>Description</th>
            <th>Length (mm)</th>
            <th>Part Type</th>
            @foreach($codes as $code)
                <th> {{$code->code}}</th>
            @endforeach
        </tr>
      </thead>
      <tbody>
      @foreach($plan->parts as $part)
          <tr>
              <td>{{$part->number}}</td>
              <td>{{$part->description}}</td>
              <td>{{$part->length}}</td>
              <td>{{$part->type}}</td>
              @foreach($codes as $code)
                  <td>
                      {{\Illuminate\Support\Facades\DB::table('parts_codes')->where('part_id',$part->id)->where('code_id',$code->id)->first()?->quantity}}
                  </td>
              @endforeach
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
