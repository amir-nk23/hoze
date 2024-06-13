@extends('admin.layouts.master')


                @section('content')


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ویرایش پیوند</h4>

                        </div>

                    </div>

                    <form method="post" id="slider" action="{{route('admin.link.update',$link->id)}}" enctype="multipart/form-data">

                        @csrf
                        @method('patch')

						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">تیتر</label>
													<input class="form-control" value="{{$link->title}}" name="title"  placeholder="Name">
												</div>
                                                @error('title')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
											</div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">توضیحات</label>
                                                    <input class="form-control" value="{{$link->summary}}" name="summary"  placeholder="summary">
                                                </div>
                                                @error('summary')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">عکس</label>
                                                    <input class="form-control" name="image"  type="file">
                                                </div>
                                                @error('image')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">وضعیت</label>
                                                <select name="status"  required class="form-control">

                                                        <option {{$link->status==1 ? 'selected':''}} value="1">فعال</option>
                                                        <option {{$link->status==0 ? 'selected':''}} value="0">غیرفعال</option>

                                                </select>
                                            </div>

                                            @error('status')

                                            <p class="text-danger">{{$message}}</p>

                                            @enderror
                                        </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" >لینک</label>
                                                    <input  value="{{$link->link}}" class="form-control" name="link" placeholder="link">
                                                </div>
                                                @error('link')

                                                <p class="text-danger">{{$message}}</p>

                                                @enderror
                                            </div>

                                        </div>

									<div class="card-footer text-left">
										 <a href="{{route('admin.slider.index')}}" class="btn btn-danger btn-lg">انصراف</a>
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
