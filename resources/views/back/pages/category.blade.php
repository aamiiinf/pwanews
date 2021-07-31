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
              <h1>دسته بندی ها</h1>
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
                <li class="breadcrumb-item active">دسته بندی ها</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <div class="row">
          <div class="p-2">
            <a class="btn btn-success" href="{{ route('admin.create.category') }}">افزودن دسته بندی</a>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">دسته بندی ها</h3>
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
                      <th>عنوان</th>
                      <th>نام مستعار</th>
                      <th>تاریخ ایجاد</th>
                      <th>تاریخ ویرایش</th>
                      <th>مدیریت</th>
                    </tr>
                  @foreach ($categories as $category )
                    <tr>
                      <th>{{ $x++ }}</th>
                      <th>{{ $category->name }}</th>
                      <th>{{ $category->slug }}</th>
                      <th>{{ $category->created_at }}</th>
                      <th>{{ $category->updated_at }}</th>
                      <th>
                        <a href="{{ route('admin.edit.category', $category->id) }}" class="badge badge-success">ویرایش</a>
                        <a href="{{ route('admin.delete.category', $category->id) }}" class="badge bg-danger" 
                          onclick="return confirm('آیا آیتم مورد نظر حذف شود');">حذف</a>
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