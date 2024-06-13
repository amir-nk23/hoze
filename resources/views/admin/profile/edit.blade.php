@extends('admin.layouts.master')






@section('content')



        @csrf

        <div class="app-content main-content">
            <div class="side-app">

                <div class="card card-body shadow col-md-6" style="margin-right: 55px">

                    <div style="text-align: center">

                        <h3>پروفایل</h3>

                    </div>

                    <form method="post" action="{{route('admin.profile.update',$user->id)}}" enctype="multipart/form-data">

                        @csrf
                        @method('patch')
                        <div class="col-md-12">

                            <label>نام :</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">

                        </div>

                        <div class="col-md-12">

                            <label>ایمیل :</label>
                            <input type="email" value="{{$user->email}}" name="email" class="form-control">

                            @error('email')

                            <p class="text-danger">{{$message}}</p>

                            @enderror

                        </div>


                        <div class="col-md-12">

                            <label>شماره تلفن :</label>
                            <input type="text" value="{{$user->mobile}}" name="mobile" class="form-control">

                            @error('mobile')

                            <p class="text-danger">{{$message}}</p>

                            @enderror

                        </div>


                        <div class="col-md-12">

                            <label>عکس پروفایل :</label>
                            <input type="file" name="image" class="form-control">

                        </div>


                        <div class="col-md-12 mt-5"  style="text-align: end">

                            <button type="submit" class="btn btn-warning">بروزرسانی</button>

                        </div>




                    </form>

                </div>



              </div><!-- end app-content-->
        </div>








@endsection

