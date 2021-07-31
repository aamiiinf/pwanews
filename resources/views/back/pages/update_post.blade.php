@extends('back.layout.app')

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ویرایش پست</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش پست</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="{{ route('admin.update.post', $post->id) }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                ویرایش عنوان
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm"
                        data-widget="collapse"
                        data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-sm"
                        data-widget="remove"
                        data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="mb-3">
                <textarea class="form-control" name="name" style="width: 100%">{{ $post->name }}</textarea>
              </div>
            </div>
          </div>

          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                 ویرایش تصویر شاخص
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm"
                        data-widget="collapse"
                        data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-sm"
                        data-widget="remove"
                        data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info text-white">
                      <i class="fa fa-picture-o"></i> انتخاب
                    </a>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" name="filepath">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
              </div>
            </div>
          </div>
          <!-- /.card -->
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                نام مستعار
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <div class="form-group">
                  <input type="text" name="slug" class="form-control" placeholder="وارد کردن اطلاعات ..." value="{{ $post->slug }}">
                </div>
              </div>
            </div>
          </div>

          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                ویرایش محتوا
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea id="comment" name="discrption">{{ $post->description }}</textarea>
                <script>
                    CKEDITOR.replace('comment', {
                    language: 'fa',
                    filebrowserUploadMethod : 'form',
                    filebrowserImageBrowseUrl: '{{asset('/laravel-filemanager?type=Images')}}',
                    filebrowserImageUploadUrl: '{{asset('/laravel-filemanager/upload?type=Images&_token=')}}',
                    filebrowserBrowseUrl: '{{asset('/laravel-filemanager?type=Files')}}',
                    filebrowserUploadUrl: '{{asset('/laravel-filemanager/upload?type=Files&_token=')}}'
                })
                </script>
              </div>
            </div>
          </div>

          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                انتخاب دسته بندی
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <select class="form-control chosen-select" multiple name="categories[]">
                  @foreach ($categories as $cat_id => $cat_name)
                  <option value="{{$cat_id}}" <?php if (in_array($cat_id, $post->categories->pluck('id')->toArray())) {
                    echo 'selected';
                  } ?>>{{$cat_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                انتخاب برچسب
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <select class="form-control chosen-select" multiple name="tags[]">
                  @foreach ($tags as $tags_id => $tags_title)
                  <option value="{{$tags_id}}" <?php if (in_array($tags_id, $post->tags->pluck('id')->toArray())) {
                    echo 'selected';
                  } ?>>{{$tags_title}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                وضعیت
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <select class="form-control" name="status">
                  <option value="1" <?php if($post->status==1) echo 'selected';?>>منتشر شده</option>
                  <option value="0" <?php if($post->status==0) echo 'selected';?>>منتشر نشده</option>
                </select>
              </div>
            </div>
          </div>

          <div class="card card-outline card-info">
            <div class="card-header">
              <h6 class="mt-3">
                <label>ویراستار : {{ Auth::user()->name }}</label>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              </h6>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-block btn-success btn-lg">ویرایش</button>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
