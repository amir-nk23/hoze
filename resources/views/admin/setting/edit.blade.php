@extends('admin.layouts.master')



                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ویرایش تنظیمات</h4>

                        </div>

                    </div>


                    <form method="post" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">

                        @csrf
                        @method('patch')
						<!-- Row -->
						<div class="row" style=" ">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">

                                            @foreach($generals as $general)


                                                @if($general->type == 'text')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{$general->label}}</label>
                                                            <input class="form-control" value="{{$general->value}}" name="{{$general->name}}">
                                                        </div>
                                                    </div>
                                               @endif


                                                   @if($general->type=='img')

                                                        <div class="col-6 d-flex row">
                                                            <div class="form-group">
                                                                <label class="form-label">{{$general->label}}</label>
                                                                <input class="form-control" type="file" value="{{$general->value}}" name="{{$general->name}}">
                                                            </div>

                                                            <div class="col-6 mb-3 mr-3">

                                                                @if($general->value)

                                                                    <figure class="" style="text-align: left">

                                                                        <a  class="mb-2 feather feather-x btn btn-danger ajax-link" data-value="{{ $general->value }}"></a>
                                                                        <img  src="{{asset('storage/'.$general->value)}}" alt="">

                                                                    </figure>

                                                                @endif
                                                            </div>

                                                        </div>


                                                    @endif



                                                    @if($general->type=='textarea')

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">{{$general->label}}</label>
                                                                <textarea class="form-control" cols="10" rows="10" name="{{$general->name}}">{{$general->value}}</textarea>
                                                            </div>
                                                        </div>


                                                    @endif

                                            @endforeach



								</div>
                                        <div class="text-left mt-5">
                                            <a href="{{route('admin.setting.index')}}" class="btn btn-danger btn-lg">انصراف</a>
                                            <button class="btn btn-warning btn-lg" type="submit">به روزرسانی</button>
                                        </div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div><!-- end app-content-->
			</div>



                    </form>
                @endsection
