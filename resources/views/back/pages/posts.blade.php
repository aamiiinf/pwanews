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
            <div class="col-sm-6 my-4">
              <div>
                <a class="btn btn-success" href="{{ route('admin.create.post') }}">افزودن نوشته</a>
              </div>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                <li class="breadcrumb-item active">نوشته ها</li>
              </ol>
            </div>
            <div class="col-12">

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
              
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">نوشته ها</h3>
  
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
                        <th>دسته بندی</th>
                        <th>برچسب ها</th>
                        <th>نویسنده</th>
                        <th>تاریخ</th>
                        <th>تعداد بازدید</th>
                        <th>وضعیت</th>
                        <th>مدیریت</th>
                        <th>توضیحات</th>
                      </tr>
                      @foreach ($posts as $post)

                      @switch($post->status)
                      @case(1)             
                        @php
                        $url = route('admin.posts.status',$post->id);
                        $status = '<a href="'.$url.'" class="badge badge-success">منتشر شده</a>' 
                        @endphp
                      @break
                      @case(0)
                        @php 
                        $url = route('admin.posts.status',$post->id);
                        $status = '<a href="'.$url.'" class="badge bg-danger">منتشر نشده</a>' 
                        @endphp
                      @break
                    @endswitch

                      <tr>
                        <td>{{ $x++ }}</td>
                        <td>{!! $post->name !!}</td>
                        <td>
                          @foreach ($post->categories()->pluck('name') as $cate)
                            <span class="badge badge-warning">{{ $cate }}</span>
                          @endforeach
                        </td>
                        <td>
                          @foreach ($post->tags()->pluck('title') as $tag)
                            <span class="badge badge-info">{{ $tag }}</span>
                          @endforeach
                        </td>
                        <td>
                          {{ $post->user->name }}
                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                          <img src="{{ asset('img/eye-48.png') }}" width="15" height="15">
                          {{ $post->hit }}
                        </td>
                        <td>{!! $status !!}</td>
                        <td>
                          <a href="{{ route('admin.edit.post', $post->id) }}" class="badge badge-success">ویرایش</a>
                          <form class="form_delete" method="POST" action="{{ route('admin.delete.post', $post->id) }}"
                            onclick="return confirm('آیا آیتم مورد نظر حذف شود');">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn button_delete" value="حذف">
                          </form>
                        </td>
                        <td>{!! substr($post->description, 0,25) . "..."  !!}</td>
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
        </div><!-- /.container-fluid -->
      </section>
    </div>
@endsection