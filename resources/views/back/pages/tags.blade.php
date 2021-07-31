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
              <h1>برچسب ها</h1>
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
                <li class="breadcrumb-item active">برچسب ها</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <div class="row">
          <div class="p-2">
            <a class="btn btn-success" href="{{ route('admin.create.tag') }}">ایجاد برچسب جدید</a>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">برچسب ها</h3>
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
                      <th>نامک</th>
                      <th>توضیحات</th>
                      <th>وضعیت</th>
                      <th>مدیریت</th>
                    </tr>
                  @foreach ($tags as $tag)

                    @if ($tag->status == 0)
                      @php
                        $url_tag = route('admin.tags.status', $tag->id);
                        $status = '<a href="'.$url_tag.'" class="badge bg-danger">غیرفعال</a>' 
                      @endphp 
                    @endif
                    @if ($tag->status == 1)
                      @php
                        $url_tag = route('admin.tags.status', $tag->id);
                        $status = '<a href="'.$url_tag.'" class="badge bg-success">فعال</a>' 
                      @endphp 
                    @endif

                    <tr>
                      <th>{{ $x++ }}</th>
                      <th>{{ $tag->title }}</th>
                      <th>{{ $tag->name }}</th>
                      <th>{!! substr($tag->dic, 0,25) . "..."  !!}</th>
                      <th>{!! $status !!}</th>
                      <th>
                        <a href="{{ route('admin.edit.tag', $tag->id) }}" class="badge badge-success">ویرایش</a>
                        <a href="{{ route('admin.delete.tag', $tag->id) }}" class="badge bg-danger" 
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