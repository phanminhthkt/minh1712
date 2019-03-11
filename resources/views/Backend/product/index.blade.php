@extends('Backend.master')
@section('content')
<div class="container-fluid  dashboard-content">
	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Tables</h2>
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
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<form role="form" method="POST" action="{{route('Backend.Product.deleteAll')}}" enctype="multipart/form-data">
				{{csrf_field()}}
			<div class="card">
				<div>
					<a class="btn btn-primary " href="product/add">
						<i class="far fa-plus-square"></i>&nbsp;ADD
					</a>
					<button type='submit' class="btn btn-secondary"><i class="far fa-window-close"></i>&nbsp;DEL</button>
				</div>
				<h5 class="card-header">List product</h5>
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
										<th class="border-0">Status</th>
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
										<td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
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
									<tr>
										<td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
@stop
