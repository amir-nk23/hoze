@extends('admin.layouts.master')


                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ثبت پیوند</h4>

                        </div>

                    </div>

                    <form method="post" id="required_form" action="{{route('admin.link.store')}}" enctype="multipart/form-data">

                        @csrf

						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" value="{{old('title')}}" required name="title" placeholder="Name">
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" name="summary" value="{{old('summary')}}"  required placeholder="summary">
                                                </div>
                                                @error('summary')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">عکس</label>
                                                    <input class="form-control" name="image" required type="file">
                                                </div>
                                                @error('image')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">وضعیت</label>
                                                <select name="status"  required class="form-control">

                                                        <option value="1">فعال</option>
                                                        <option value="0">غیرفعال</option>

                                                </select>
                                            </div>

                                            @error('category_id')

                                            <p class="text-danger">{{$message}}</p>

                                            @enderror
                                        </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">لینک</label>
                                                    <input class="form-control" value="{{old('link')}}" required name="link" placeholder="link">
                                                </div>
                                                @error('link')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>

                                        </div>

									<div class="card-footer text-left">
										 <a href="{{route('admin.slider.index')}}" class="btn btn-danger btn-lg">انصراف</a>
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
