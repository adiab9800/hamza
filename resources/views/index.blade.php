@extends('main')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{\App\Models\Plan::count()}}</h3>
          <p>Parts plans</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        </a>
      </div>
    </div>
    <div class="col-lg-6 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{\App\Models\WeekPlan::count()}}
          </h3>
          <p>Week plans</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
