@extends('back.layout.app')

@section('title')
داشبورد
@endsection

@section('main')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>مدیریت کاربران</h1>
              @if (session('success'))
              <div style="opacity:0.7;" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('success')}}
              </div>
              @endif
              @if (session('warning'))
              <div style="opacity:0.7;" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('warning')}}
              </div>
              @endif
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                <li class="breadcrumb-item active">مدیریت کاربران</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول کاربران</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>شماره</th>
                      <th>کاربر</th>
                      <th>ایمیل</th>
                      <th>تاریخ</th>
                      <th>نقش</th>
                      <th>وضعیت</th>
                      <th>مدیریت</th>
                    </tr>
                  @foreach ($users as $user)
                  @switch($user->role)
                    @case(1)
                      @php $role = 'مالک' @endphp
                    @break
                    @case(2)
                      @php $role = 'کاربر' @endphp
                    @break
                    @case(3)
                      @php $role = 'نویسنده' @endphp
                    @break
                    @case(4)
                      @php $role = 'مدیر' @endphp
                    @break
                  @endswitch
                  @switch($user->status)
                  @case(1)             
                    @php
                    $url = route('admin.user.status',$user->id);
                    $status = '<a href="'.$url.'" class="badge bg-success btn-sm">فعال</a>' 
                    @endphp
                  @break
                  @case(0)
                    @php 
                    $url = route('admin.user.status',$user->id);
                    $status = '<a href="'.$url.'" class="badge bg-danger btn-sm">غیرفعال</a>' 
                    @endphp
                  @break
                @endswitch
                    <tr>
                      <th>{{ $x++ }}</th>
                      <th>{{ $user->name }}</th>
                      <th>{{ $user->email }}</th>
                      <th>{{ $user->created_at }}</th>
                      <th>{{ $role }}</th>
                      <th>
                        @if ($user->role == 1)

                        @else
                        {!! $status !!}
                        @endif
                      </th>
                      <th>
                        <a href="{{ route('admin.edit.user', $user->id) }}" class="badge bg-primary btn-sm">{{ __('ویرایش') }}</a>
                      
                        @if ($user->role == 1)

                        @else
                          <a href="{{ 
                            route('admin.delete.users', $user->id) }}" 
                            class="badge bg-danger" 
                            onclick="return confirm('آیا آیتم مورد نظر حذف شود');">
                            {{ __('حذف') }}
                          </a>
                        @endif
                      </th>
                    </tr>  
                  @endforeach

                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
    </div>
@endsection