@extends('back.layout.app')

@section('title')
داشبورد
@endsection

@section('main')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>تقویم</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
            <li class="breadcrumb-item active">تقویم</li>
          </ol>
        </div>
        
      </div>
    </div>
  </section>
</div>
  
@endsection