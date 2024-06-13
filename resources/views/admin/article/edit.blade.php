@extends('admin.layouts.master')


                @section('content')

                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ویرایش مقاله</h4>

                        </div>

                    </div>
                    <form method="post" action="{{route('admin.article.update',$article->id)}}" enctype="multipart/form-data">

                        @csrf
                        @method('patch');
						<!-- Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" value="{{$article->title}}" name="title" placeholder="{{$article->title}}">
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" value="{{$article->subtitle}}" name="summary" placeholder="{{$article->subtitle}}">
                                                </div>
                                                @error('summary')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">دسته بندی</label>
                                                    <select name="category_id"  class="form-control">

                                                        @foreach($categories as $category)

                                                            <option value="{{$category->id}}" {{$category->id==$article->category_id ? 'selected':''}}>{{$category->title}}</option>

                                                        @endforeach


                                                    </select>
                                                </div>

                                                @error('category_id')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
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
                                                    <select name="status"  class="form-control">

                                                        <option {{$article->status==1 ? 'selected':''}} value="1">فعال</option>
                                                        <option {{$article->status==0 ? 'selected':''}} value="0">غیرفعال</option>

                                                    </select>
                                                </div>

                                                @error('status')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>

                                        </div>

                                        <div>

                                            <textarea class="form-control" name="body"  id="editor_body" cols="20px" rows="15">{{$article->body}}</textarea>

                                        </div>
                                        @error('body')

                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
									<div class="text-left">
										 <a href="{{route('admin.article.index')}}" class="btn btn-danger btn-lg">انصراف</a>
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
