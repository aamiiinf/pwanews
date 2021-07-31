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
          <h1>کامنت ها</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
            <li class="breadcrumb-item active">کامنت ها</li>
          </ol>
        </div>
        <div class="col-12 pt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">کامنت ها</h3>
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
                        <th>خلاصه نظر</th>
                        <th>نویسنده</th>
                        <th>برای مطلب</th>
                        <th>تاریخ ثبت</th>
                        <th>وضعیت</th>
                        <th>مدیریت</th>
                    </tr>
                    <tbody>

                        @foreach ($comments as $comment)

                        @switch($comment->status)
                        @case(1)
                        @php
                        $url = route('admin.comments.status',$comment->id);
                        $status = '<a href="'.$url.'" class="badge badge-success">تایید شده</a>' @endphp
                        @break
                        @case(0)
                        @php
                        $url = route('admin.comments.status',$comment->id);
                        $status = '<a href="'.$url.'" class="badge badge-warning">تایید نشده</a>' @endphp
                        @break
                        @default
                        @endswitch
                        <tr>
                            <td>{!! mb_substr($comment->body,0,50) !!}</td>
                            <td>{{$comment->name}}</td>
                            <td>{{$comment->post->name}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>{!!$status!!}</td>
                            <td>
                                <a href="{{route('admin.comments.edit',$comment->id)}}"
                                    class="badge badge-success">ویرایش</a>
                                <a href="{{route('admin.comments.destroy',$comment->id)}}"
                                    onclick="return confirm('آیا آیتم مورد نظر حذف شود');"
                                    class="badge badge-warning"> حذف </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

      </div>
    </div>
  </section>
</div>
  
@endsection