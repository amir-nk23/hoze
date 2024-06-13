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
{{--                            @foreach($users as $user)--}}
{{--                                <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                            @endforeach--}}
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
										<h4 class="card-title col-10">مقاله</h4>
                                        <div>

                                            <a class="btn btn-primary mr-3" href="{{route('admin.article.create')}}">ثبت مقاله جدید</a>

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

                                                @foreach($articles as $article)

                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$article->users->name}}</td>
                                                        <td>{{$article->title}}</td>
                                                        <td>{{$article->subtitle}}</td>
                                                        <td>{{$article->summary}}</td>
                                                        <td><a href="#"><img width="120px" src="{{asset('storage/'.$article->image)}}" alt=""></a></td>
                                                        <td>{{verta($article->published_at)->format('Y-m-d')}}</td>
                                                        <td>{{$article->views_count}}</td>
                                                        <td>
                                                            @if($article->status==0)

                                                                <p class="badge badge-danger">غیرفعال</p>

                                                        @endif
                                                                @if($article->status==1)

                                                                    <p class="badge badge-success">فعال</p>

                                                                @endif

                                                        </td>
                                                        <td>{{$article->categories->title}}</td>

                                                        <td>

                                                            <a class="btn btn-info btn-icon btn-sm feather feather-eye p-3" data-toggle="modal" data-target="#exampleModalLong" href="">
                                                                <i class="" data-toggle="tooltip" data-original-title="Edit"></i>
                                                            </a>

                                                            <a class="btn btn-warning btn-icon btn-sm feather feather-edit p-3" href="{{route('admin.article.edit',$article->id)}}">
                                                                <i class="" data-toggle="tooltip" data-original-title="Edit"></i>
                                                            </a>




                                                            <a class="btn btn-danger btn-icon btn-sm feather feather-trash-2 p-3" data-confirm-delete="true" href="{{route('admin.article.destroy',$article->id)}}" ></a>

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
                                                                    {!! strip_tags($article->body) !!}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


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





		<!-- Back to top -->
		<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>




@endsection




