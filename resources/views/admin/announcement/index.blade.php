@extends('admin.layouts.master')


@section('content')


						<!-- Row -->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header  border-0">
										<h4 class="card-title col-10">اطلاعیه</h4>
                                        <div>

                                            <a class="btn btn-primary mr-3" href="{{route('admin.announcement.create')}}">ثبت اطلاعیه جدید</a>

                                        </div>
									</div>




                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table  table-vcenter text-nowrap table-bordered border-bottom text-center" id="hr-table">
												<thead>
													<tr>
														<th class="border-bottom-0 w-5">ردیف</th>
														<th class="border-bottom-0">عنوان</th>
														<th class="border-bottom-0">توضیحات</th>
														<th class="border-bottom-0">متن</th>
														<th class="border-bottom-0">عکس</th>
														<th class="border-bottom-0">تاریخ انتشار</th>
														<th class="border-bottom-0">نویسنده</th>
														<th class="border-bottom-0">تعداد بازدید</th>
														<th class="border-bottom-0">وضعیت</th>
														<th class="border-bottom-0">عملیات</th>
													</tr>
												</thead>
												<tbody>
                                                @foreach($announcements as $announcement)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$announcement->title}}</td>
                                                        <td>{{$announcement->summary}}</td>
                                                        <td>{{\Illuminate\Support\Str::limit($announcement->body,100,$end='...')}}</td>
                                                        <td><a href="#"><img width="120px" src="{{asset('storage/'.$announcement->image)}}" alt=""></a></td>
                                                        <td>{{\Hekmatinasser\Verta\Verta::instance($announcement->published_at)->format('Y-m-d')}}</td>
                                                        <td>{{$announcement->users->name}}</td>
                                                        <td>{{$announcement->views_count}}</td>
                                                        <td>
                                                         @if($announcement->status ==0)
                                                            <span class="btn btn-danger">غیرفعال</span>
                                                             @endif
                                                             @if($announcement->status ==1)
                                                                 <span class="btn btn-success">فعال</span>
                                                              @endif
                                                         </td>
                                                        <td>
                                                            <a class="btn btn-warning btn-icon btn-sm feather feather-edit p-3" href="{{route('admin.announcement.edit',$announcement->id)}}">
                                                                <i class="" data-toggle="tooltip" data-original-title="Edit"></i>
                                                            </a>


                                                                <a class="btn btn-danger btn-icon btn-sm feather feather-trash-2 p-3    " data-confirm-delete="true" href="{{route('admin.announcement.destroy',$announcement->id)}}" ></a>



                                                        </td>
                                                    </tr>

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
