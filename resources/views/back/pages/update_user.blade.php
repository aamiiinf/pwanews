@extends('back.layout.app')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ویرایش کاربر') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.update.profile', $user->id) }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('نقش') }}</label>

                                        <div class="col-md-6">
                                            <select name="roles" class="custom-select">
                                                <option value="1"<?php if ($user->role == 1) echo 'selected'; if ($user->role == 1) echo 'disabled'; ?>>مالک</option>
                                                <option value="2" <?php if ($user->role == 2) echo 'selected'; if ($user->role == 1) echo 'disabled'; ?>>کاربر</option>
                                                <option value="3" <?php if ($user->role == 3) echo 'selected'; if ($user->role == 1) echo 'disabled'; ?>>نویسنده</option>
                                                <option value="4" <?php if ($user->role == 4) echo 'selected'; if ($user->role == 1) echo 'disabled'; ?>>مدیر</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('تلفن') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary" onclick="return confirm('آیا از ویرایش کاربر مورد نظر اطمینان دارید؟');">
                                                {{ __('ویرایش') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@endsection
