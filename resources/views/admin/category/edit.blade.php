@extends('admin.layouts.master')


@section('content')

    <div class="page-header d-xl-flex d-block">

        <div class="page-leftheader">

            <h4 class="page-title">ویرایش دسته بندی</h4>

        </div>

    </div>

    <form method="post" action="{{route('admin.category.update',$category->id)}}">

        @csrf
        @method('patch')

        <div class="app-content main-content">
            <div class="side-app">

                <!-- Row -->
                <div class="row offset-2">
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">عنوان دسته</label>
                                            <input class="form-control" name="title" value="{{$category->title}}" placeholder="{{$category->title}}">

                                            @error('title')

                                            <p class="text-danger">{{$message}}</p>

                                            @enderror


                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">دسته بندی :</label>
                                        <select  name="type"  class="form-control custom-select select2">

                                            <option value="article" {{$category->type == 'article' ? 'selected' : ''}}>مقاله</option>
                                            <option value="news" {{$category->type == 'news' ? 'selected' : ''}} >اخبار</option>

                                        </select>
                                        @error('type')

                                        <p class="text-danger">{{$message}}</p>

                                        @enderror

                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">وضعیت :</label>
                                            <select name="status"  class="form-control custom-select select2"  data-placeholder="انتخاب وضعیت">
                                                <option label="Select Department"></option>
                                                <option value="1" {{$category->status == 1 ? 'selected' : ''}}>فعال</option>
                                                <option value="0" {{$category->status == 0 ? 'selected' : ''}}>غیرفعال</option>

                                            </select>

                                            @error('status')

                                            <p class="text-danger">{{$message}}</p>

                                            @enderror

                                        </div>

                                    </div>
                                    <div class="card-footer text-left">

                                        <a class="btn btn-danger btn-lg" href="{{route('admin.category.index')}}" > انصراف </a>
                                        <button type="submit" class="btn btn-warning btn-lg" > به روزرسانی </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row-->

                    </div><!-- end app-content-->
                </div>
            </div>
        </div>


    </form>

@endsection


