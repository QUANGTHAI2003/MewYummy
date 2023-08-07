@extends('layouts.admin')

@section('content')
  <div class="row dashboard">
    <livewire:admin.dashboard.statistic-card-component />
    <livewire:admin.dashboard.statistic-chart-component />
  </div>
@endsection
