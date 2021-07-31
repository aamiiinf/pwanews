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
              <h1>ویرایش دسته بندی ها</h1>
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
                <li class="breadcrumb-item active">ویرایش دسته بندی ها</li>
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
                <h3 class="card-title">ویرایش دسته بندی ها</h3>

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
                <div class="card card-info">
                  <!-- form start -->
                  <form class="form-horizontal" action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">عنوان</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="inputEmail3" value="{{ $category->name }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">نام مستعار</label>
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="slug" id="inputPassword3" value="{{ $category->slug }}">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">ویرایش دسته بندی</button>
                      <a href="{{ route('admin.categories') }}" class="btn btn-default float-left">انصراف</a>
                    </div>
                    <!-- /.card-footer -->
                  </form>
                </div>
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