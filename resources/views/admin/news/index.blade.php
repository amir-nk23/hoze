@extends('admin.layouts.master')


@section('content')


    <div class="col-md-12">


        <form method="post" action="{{route('admin.news.search')}}">

            @csrf
            <div class="row">


                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">نویسنده</label>
                        <select class="form-control" name="user_id">
                            <option value="all">همه</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">تیتر</label>
                        <input name="title" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">از تاریخ</label>
                        <input name="start_date" autocomplete="off" class="form-control fc-datepicker" id="start_date">
                        <input name="s_date"   id="s_date" type="hidden"  >
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">تا تاریخ</label>
                        <input name="start_date" autocomplete="off" class="form-control fc-datepicker" id="end_date">
                        <input name="e_date"   id="e_date" type="hidden"  >
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">وضعیت</label>
                        <select class="form-control" name="status">

                            <option value="all">همه</option>
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>


                        </select>
                        <input name="e_date"   id="e_date" type="hidden"  >
                    </div>
                </div>


{{--                <div class="col-md-2">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="form-label">وضعیت</label>--}}
{{--                        <select class="form-control" name="staus">--}}

{{--                                <option value="all">همه</option>--}}
{{--                                <option value="1">فعال</option>--}}
{{--                                <option value="0">غیرفعال</option>--}}

{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}


                    <div class="col-md-2">

                        <button class="btn btn-info mt-5 p-2 px-4">فیلتر</button>

                    </div>



            </div>



        </form>

    </div>

						<!-- Row -->
						<div class="row mt-5">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header  border-0">
										<h4 class="card-title col-10">اخبار</h4>
                                        <div>

                                            <a class="btn btn-primary mr-3" href="{{route('admin.news.create')}}">ثبت خبر جدید</a>

                                        </div>
									</div>




                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table  table-vcenter text-nowrap table-bordered border-bottom text-center" id="hr-table">
												<thead>
													<tr>
														<th class="border-bottom-0 w-5">ردیف</th>
                                                        <th class="border-bottom-0">نویسنده</th>
														<th class="border-bottom-0">تیتر</th>
														<th class="border-bottom-0">عنوان</th>
														<th class="border-bottom-0">توضیخات</th>
														<th class="border-bottom-0">عکس</th>
														<th class="border-bottom-0">تاریخ انتشار</th>
														<th class="border-bottom-0">تعداد بازدید</th>
														<th class="border-bottom-0">وضعیت</th>
														<th class="border-bottom-0">دسته بندی</th>
													</tr>
												</thead>
												<tbody>

                                                @foreach($news as $news)

                                                    <tr>

                                                        <td class="{{$news->featured==1 ? 'bg-danger':''}}">{{$loop->index+1}}</td>

                                                        <td>{{$news->users->name}}</td>
                                                        <td>{{$news->title}}</td>
                                                        <td>{{$news->subtitle}}</td>
                                                        <td>{{$news->summary}}</td>
                                                        <td><a href="#"><img width="120px" src="{{asset('storage/'.$news->image)}}" alt=""></a></td>
                                                        <td>{{verta($news->published_at)->format('Y-m-d')}}</td>
                                                        <td>{{$news->views_count}}</td>
                                                        <td>
                                                            @if($news->status==0)

                                                                <p class="badge badge-danger">غیرفعال</p>

                                                        @endif
                                                                @if($news->status==1)

                                                                    <p class="badge badge-success">فعال</p>

                                                                @endif

                                                        </td>
                                                        <td>{{$news->categories->title}}</td>

                                                        <td>


                                                            <a class="btn btn-info btn-icon btn-sm feather feather-eye p-3" data-toggle="modal" data-target="#exampleModalLong" href="{{route('admin.news.edit',$news->id)}}">
                                                                <i class="" data-toggle="tooltip" data-original-title="Edit"></i>
                                                            </a>

                                                            <a class="btn btn-warning btn-icon btn-sm feather feather-edit p-3" href="{{route('admin.news.edit',$news->id)}}">
                                                                <i class="" data-toggle="tooltip" data-original-title="Edit"></i>
                                                            </a>




                                                            <a class="btn btn-danger btn-icon btn-sm feather feather-trash-2 p-3" data-confirm-delete="true" href="{{route('admin.news.destroy',$news->id)}}" ></a>

                                                        </td>
                                                    </tr>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {!! strip_tags($news->body) !!}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

    {{--                                                    @if($news==[])--}}
    {{--                                                        <h4 class="alert alert-danger">اطلاعات مورد نظر یافت نشد</h4>--}}


    {{--                                                    @endif--}}

                                                        @endforeach



												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row-->

					</div><!-- end app-content-->
				</div>

			</div>





			<!--Add Department Modal -->
			<div class="modal fade"  id="adddepartmentmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Department</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Add Department</label>
								<input type="text" class="form-control" placeholder="Department" value="">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Submit</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Add Department Modal  -->

			<!--Edit Department Modal -->
			<div class="modal fade"  id="editdepartmentmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Department</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Edit Department</label>
								<input type="text" class="form-control" placeholder="Department" value="">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Save</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Edit Department Modal  -->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>




@endsection




