@extends('back.layout.app')

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ویرایش نظر</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش نظر</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


        <div class="row p-2">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('comments.update', $comment->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">نام</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{$comment->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">ایمیل</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{$comment->email}}">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">محتوای نظر</label>
                                <textarea type="text" class="form-control @error('body') is-invalid @enderror"
                                    name="body">{{$comment->body}}</textarea>
                                @error('body')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">وضعیت</label>
                                <select class="form-control" name="status">
                                    <option value="0">منتشر نشده</option>
                                    <option value="1" <?php if($comment->status==1) echo 'selected';?>>منتشر شده
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title"></label>
                                <button type="submit" class="btn btn-success">ذخیره</button>
                                <a href="{{route('admin.comments')}}" class="btn btn-warning"> انصراف </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
