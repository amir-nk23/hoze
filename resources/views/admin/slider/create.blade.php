@extends('admin.layouts.master')


                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ثبت اسلایدر</h4>

                        </div>

                    </div>

                    <form method="post" id="required_form" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">

                        @csrf

						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" name="title" placeholder="Name" required>
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" name="summary" placeholder="summary" required>
                                                </div>
                                                @error('summary')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">عکس</label>
                                                    <input class="form-control" name="image" type="file" required>
                                                </div>
                                                @error('image')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">وضعیت</label>
                                                <select name="status"  class="form-control" required>

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
                                                    <input class="form-control" name="link" placeholder="link" required>
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
