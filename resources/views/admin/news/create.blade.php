@extends('admin.layouts.master')


                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ثبت خبر</h4>

                        </div>

                    </div>

                    <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">

                        @csrf

                        <div class=" col-sm-12" style="text-align: left">

                            <div>
                                <label>ویژه</label>
                                <input type="radio" name="featured" value="1" class="ml-4">

                            </div>


                        </div>


						<!-- Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" value="{{old('title')}}" name="title" placeholder="Name">
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">موضوع</label>
													<input class="form-control" value="{{old('subtitle')}}" name="subtitle" placeholder="subtitle">
												</div>
                                                @error('subtitle')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" value="{{old('summary')}}" name="summary" placeholder="summary">
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
                                                        <input class="form-control fc-datepicker" autocomplete="false" value="{{old('published_at')}}" name="published_at"  id="published_at" type="text" >
                                                        <input name="published_date"  id="published_date" type="hidden"  >

                                                        @error('published_at')

                                                        <p class="text-danger">{{$message}}</p>

                                                        @enderror

                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">دسته بندی</label>
                                                    <select name="category_id"  value="{{old('category_id')}}" class="form-control">
                                                        @if(count($categories)==0)

                                                            <option style="color: red;" disabled value="">هنوز هیج دسته بندی خبری ثبت نشده است</option>

                                                        @endif

                                                        @foreach($categories as $category)

                                                            <option value="{{$category->id}}">{{$category->title}}</option>

                                                        @endforeach


                                                    </select>
                                                </div>

                                                @error('category_id')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">تگ</label>
                                                    <select class="form-control js-example-tokenizer"  name="tag[]" multiple="multiple" dir="ltr" >


                                                        @foreach($tags as $tag)

                                                            <option>{{$tag->title}}</option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


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
                                                <select name="status"   class="form-control">

                                                        <option value="1">فعال</option>
                                                        <option value="0">غیرفعال</option>

                                                </select>
                                            </div>

                                            @error('category_id')

                                            <p class="text-danger">{{$message}}</p>

                                            @enderror
                                        </div>

                                        </div>

                                        <div>

                                            <textarea class="form-control" name="body" id="editor_body" cols="20px" rows="15">{{old('body')}}</textarea>

                                        </div>
                                        @error('body')

                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
									<div class="card-footer text-left">
										 <a href="{{route('admin.news.index')}}" class="btn btn-danger btn-lg">انصراف</a>
										<button class="btn btn-success btn-lg" type="submit">ثبت</button>
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
