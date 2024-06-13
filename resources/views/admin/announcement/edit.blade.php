@extends('admin.layouts.master')


                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ویرایش اطلاعیه</h4>

                        </div>

                    </div>

                    <form method="post" action="{{route('admin.announcement.update',$annoncement->id )}}" enctype="multipart/form-data">

                        @csrf
                        @method('patch')
						<!-- Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" value="{{$annoncement->title}}" name="title" placeholder="Name">
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" value="{{$annoncement->summary}}" name="summary" placeholder="summary">
                                                </div>
                                                @error('summary')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">تاریخ انتشار</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="feather feather-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control fc-datepicker" value="{{$annoncement->published_at}}" autocomplete="off" name="published_at"  id="published_at" type="text" >
                                                        <input name="published_date"   id="published_date" type="hidden"  >

                                                        @error('published_at')

                                                        <p class="text-danger">{{$message}}</p>

                                                        @enderror

                                                    </div>

                                                </div>
                                            </div>



                                            <div class="col-md-6 row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">عکس</label>
                                                        <input class="form-control" name="image" type="file">
                                                    </div>
                                                    @error('image')

                                                    <p class="text-danger">{{$message}}</p>

                                                    @enderror
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">وضعیت</label>
                                                        <select class="form-control" name="status">
                                                            <option {{$annoncement->status==1 ? 'selected':''}} value="1">فعال</option>
                                                            <option {{$annoncement->status==0 ? 'selected':''}} value="0">غیرفعال</option>
                                                        </select>
                                                    </div>
                                                    @error('status')

                                                    <p class="text-danger">{{$message}}</p>

                                                    @enderror
                                                </div>

                                            </div>

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label class="form-label">دسته بندی</label>--}}
{{--                                                    <select name="category_id"  class="form-control">--}}
{{--                                                        @foreach($categories as $category)--}}

{{--                                                            <option value="{{$category->id}}">{{$category->title}}</option>--}}

{{--                                                        @endforeach--}}


{{--                                                    </select>--}}
{{--                                                </div>--}}

                                                @error('category_id')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>


{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label class="form-label">تگ</label>--}}
{{--                                                    <select class="form-control js-example-tokenizer"  name="tag[]" multiple="multiple" dir="ltr" >--}}


{{--                                                        @foreach($tags as $tag)--}}

{{--                                                            <option>{{$tag->title}}</option>--}}

{{--                                                        @endforeach--}}

{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}




                                        </div>

                                        <div>

                                            <textarea class="form-control"  name="body" cols="20px" rows="15">{{$annoncement->body}}</textarea>

                                        </div>
                                        @error('body')

                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
									<div class="card-footer text-left">
										 <a href="{{route('admin.announcement.index')}}" class="btn btn-danger btn-lg">انصراف</a>
										<button class="btn btn-warning btn-lg" type="submit">به روزرسانی</button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div><!-- end app-content-->
			</div>




		</div>
                    </form>
                @endsection
