@extends('Backend.master')
@section('content')
<div class="container-fluid  dashboard-content">
	@if($errors->has('listid'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert">×</button>
        {{$errors->first('listid')}}
    </div>
    @endif
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<form role="form" method="POST" action="{{route('Backend.Product.deleteAll')}}" enctype="multipart/form-data">
				{{csrf_field()}}
			<div class="card">
				<div class="page-header">
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="../admin" class="breadcrumb-link">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
				<div>
					<a class="btn btn-primary " href="product/add">
						<i class="far fa-plus-square"></i>&nbsp;ADD
					</a>
					<button type='submit' class="btn btn-secondary"><i class="far fa-window-close"></i>&nbsp;DEL</button>
					<div class="input-group inline-block text-min">
                        <input type="text" class="form-control" placeholder="Keywords">
                        <button type="button" class="btn btn-danger">Search!</button>
                    </div>
				</div>


				<div class="card">
					<h5 class="card-header"></h5>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead class="bg-light">
									<tr class="table-success border-0">
										<th class="border-0">#</th>
										<th class="border-0">Image</th>
										<th class="border-0">Product Name</th>
										<th class="border-0">Product Id</th>
										<th class="border-0">Quantity</th>
										<th class="border-0">Price</th>
										<th class="border-0">Publish</th>
										<th class="border-0">Method</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $v)
									<tr>
										<td>
											<label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name="listid[]" value="{{$v->id}}" class="custom-control-input"><span class="custom-control-label"></span>
                                            </label>
										</td>
										<td>
											<div class="m-r-10">
												<img src="../upload/product/{{$v->images}}" alt="user" class="rounded" width="45">
											</div>
										</td>
										<td>{{$v->name_vi}}</td>
										<td>{{$v->id}}</td>
										<td>{{$v->quantity}}</td>
										<td>${{$v->price}}</td>
										<td >
											<a data-table='table_product' data-stt='{{$v->status}}' data-id='{{$v->id}}' class="check_stt">
											@if($v->status == 1)
											<div class="change_stt{{$v->id}}">
												<span class="fas fa-check-circle badge-dot badge-primary"></span>
											</div>
											@else
											<div class="change_stt{{$v->id}}">
												<span class="fas fa-times-circle badge-dot badge-danger"></span>
											</div>
											@endif
											</a>
										</td>
										<td>
											<a class="btn btn-primary w-40-np" href="product/edit/{{$v->id}}">
												<i class="far fa-edit"></i>
											</a>
											<a class="btn btn-secondary w-40-np" href="product/del/{{$v->id}}">
												<i class="far fa-window-close"></i>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>

							</table>
							<div class="t-center">
								{{ $data->render("pagination::bootstrap-4")}}
							</div>
							
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		 $.ajaxSetup({
          	headers: {
              	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          	}
      	});
		$('.check_stt').click(function(){
			var id = $(this).data('id');
			$.ajax({
				url:"{{route('Backend.Product.ajax')}}",
				type:"POST",
				data:{id:id},
				success:function(data){
					$('.change_stt'+id).html(data);
				}
			});	
			// if(stt == 1){
			// 	$('.check_stt').html('<span class="badge-dot badge-primary"></span> Check');
			// }else{
			// 	$('.check_stt').html('<span class="badge-dot badge-primary"></span> Check');
			// }
		})
	})
</script>
@stop
