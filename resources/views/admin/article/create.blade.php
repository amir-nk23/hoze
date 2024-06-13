@extends('admin.layouts.master')



                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ثبت مقاله</h4>

                        </div>

                    </div>

                    <form method="post" id="required_form" action="{{route('admin.article.store')}}" enctype="multipart/form-data">

                        @csrf

						<!-- Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" name="title" required placeholder="Name">
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" name="summary" required placeholder="summary">
                                                </div>
                                                @error('summary')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">دسته بندی</label>
                                                    <select name="category_id" required  class="form-control">
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
                                                    <label class="form-label">عکس</label>
                                                    <input class="form-control" required name="image" type="file">
                                                </div>
                                                @error('image')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">وضعیت</label>
                                                <select name="status" required  class="form-control">

                                                        <option value="1">فعال</option>
                                                        <option value="0">غیرفعال</option>

                                                </select>
                                            </div>

                                            @error('status')

                                            <p class="text-danger">{{$message}}</p>

                                            @enderror
                                        </div>

                                        </div>

                                        <div>

                                            <textarea class="form-control" required name="body" id="editor_body" cols="20px" rows="15"></textarea>

                                        </div>
                                        @error('body')

                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
									<div class=" m-5 text-left">
										 <a href="{{route('admin.article.index')}}" class="btn btn-danger btn-lg">انصراف</a>
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
