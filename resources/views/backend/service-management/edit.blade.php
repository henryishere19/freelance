@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Edit {{$post_type}}</h1>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted"><a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{ trans('common.dashboard') }}</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-muted"><a href="{{ route('page.service.management', [$post_type]) }}" class="text-muted text-hover-primary">{{$post_type}}</a></li>
					
					<li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
					<li class="breadcrumb-item text-dark">{{ trans('common.edit') }}</li>
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<div id="kt_app_content_container" class="app-container container-xxl">
			<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" action="javascript:void(0);" onsubmit="saveData();">
				<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Image 1</h2></div>
						</div>
						<div class="card-body text-center pt-0">
							@if($data->image)
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset($data->image) }}');" data-kt-image-input="true">
							@else
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset('default/default-product.svg') }}');" data-kt-image-input="true">
							@endif
								<div class="image-input-wrapper w-150px h-150px"></div>
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
									<i class="bi bi-pencil-fill fs-7"></i>
									<input type="file" id="image" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="avatar_remove" />
								</label>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar"><i class="bi bi-x fs-2"></i></span>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar"><i class="bi bi-x fs-2"></i></span>
							</div>
							<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
						</div>
					</div>

					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Desktop Banner </h2></div>
						</div>
						<div class="card-body text-center pt-0">
							@if($data->banner_image)
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset($data->banner_image) }}');" data-kt-image-input="true">
							@else
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset('default/default-product.svg') }}');" data-kt-image-input="true">
							@endif
								<div class="image-input-wrapper w-150px h-150px"></div>
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
									<i class="bi bi-pencil-fill fs-7"></i>
									<input type="file" id="banner_image" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="avatar_remove" />
								</label>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar"><i class="bi bi-x fs-2"></i></span>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar"><i class="bi bi-x fs-2"></i></span>
							</div>
							<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
						</div>
					</div>


					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Image 2</h2></div>
						</div>
						<div class="card-body text-center pt-0">
							@if($data->mobile_banner)
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset($data->mobile_banner) }}');" data-kt-image-input="true">
							@else
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" style="background-image: url('{{ asset('default/default-product.svg') }}');" data-kt-image-input="true">
							@endif
								<div class="image-input-wrapper w-150px h-150px"></div>
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
									<i class="bi bi-pencil-fill fs-7"></i>
									<input type="file" id="mobile_banner" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="avatar_remove" />
								</label>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar"><i class="bi bi-x fs-2"></i></span>
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar"><i class="bi bi-x fs-2"></i></span>
							</div>
							<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
						</div>
					</div>

					
					<div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Status</h2></div>
						</div>
						<div class="card-body pt-0">
							<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="status">
								<option></option>
								<option value="active" @if($data->status == 'active') selected="selected" @endif>Active</option>
								<option value="draft" @if($data->status == 'draft') selected="selected" @endif>Draft</option>
								<option value="inactive" @if($data->status == 'inactive') selected="selected" @endif>Inactive</option>
							</select>
							<div class="text-muted fs-7">Set the product status.</div>
						</div>
					</div>
					
					<!-- <div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Product Details</h2></div>
						</div>
						<div class="card-body pt-0">
							<label class="form-label">Categories</label>
							<select class="form-select mb-2" id="categselect" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
								
							</select>
							<div class="text-muted fs-7 mb-7">Add product to a category.</div>
							<a href="{{ route('category.list', ['Blog']) }}" target="_blank" class="btn btn-light-primary btn-sm mb-10"><i class="bi bi-plus fs-3"></i> Create new category</a>
							
							<label class="form-label d-block">Tags</label>
							<input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value=""/>
							<div class="text-muted fs-7">Add tags to a product.</div>
						</div>
					</div> -->
					
					<!-- <div class="card card-flush py-4">
						<div class="card-header">
							<div class="card-title"><h2>Weekly Sales</h2></div>
						</div>
						<div class="card-body pt-0">
							<span class="text-muted">No data available. Sales data will begin capturing once product has been published.</span>
						</div>
					</div> -->
				</div>
				
				<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
					<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_content">Content</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_innovation">Innovation</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_migration">Migration</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_imapact">Imapact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_double_image">Double Innovation</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
						</li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>General</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="mb-10 fv-row">
											<label class="required form-label">{{$post_type}} Title</label>
											<input type="text" class="form-control mb-2" id="title" placeholder="Enter title" value="{{ $data->title }}"/>
											<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
										</div>
										<div>
											<label class="form-label">Slug</label>
											<input type="text"  class="form-control mb-2" id="slug" placeholder="Enter slug" value="{{ $data->slug }}"/>
											<div class="text-muted fs-7">Set a description for better visibility.</div>
										</div>
										<div>
											<label class="form-label">Content Description</label>
											<textarea id="maincontentdescription" class="min-h-200px mb-2">{{ $data->maincontentdescription }}</textarea>
											<div class="text-muted fs-7">Set a description for better visibility.</div>
										</div>
										<div>
											<label class="form-label">Content Title</label>
											<input type="text"  class="form-control mb-2" id="content_title_main" placeholder="Enter Home page title" value="{{ $data->content_title_main }}"/>
										</div>
										<div>
											<label class="form-label">Home Page Title</label>
											<input type="text"  class="form-control mb-2" id="content_title_home_main" placeholder="Enter Home page title" value="{{ $data->home_page_title }}"/>
										</div>
										<div>
											<label class="form-label">Content Priority</label>
											<input type="number"  class="form-control mb-2" id="priority" placeholder="priority" value="{{ $data->priority }}"/>
										</div>
										<div>
											<label class="form-label">Content Image</label>
											<input type="file" id="content_image" class="form-control">
											<img src="{{asset($data->content_image)}}" height="120px" width="150px">
										</div>
										<div>
											<label class="form-label">Description</label>
											<textarea id="description" class="min-h-200px mb-2">{{ $data->description }}</textarea>
											<div class="text-muted fs-7">Set a description for better visibility.</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_content" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<?php 
										$content = json_decode($data->content);
										if(!empty($content) && $content != "")
										{
											?>
											<div class="mb-10 fv-row">
												<label class="required form-label">{{$post_type}} Main Title</label>
												<input type="text" class="form-control mb-2 titlemaincontent" id="titlemaincontent" placeholder="Enter title" value="{{ $data->content_title }}"/>
												<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
											</div>
											@foreach($content as$key=>$val)
											<div class="useradd">
												<div class="card-header">
													<div class="card-title"><h2>Content</h2></div>
												</div>
												<div class="card-body pt-0">
												
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Content Title</label>
														<input type="text" class="form-control mb-2 titlecontent" id="titlecontent" placeholder="Enter title" value="{{ $val->title }}"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div>
														<label class="form-label">Description</label>
														<textarea id="descriptioncontent" class="form-control descriptioncontent">{{ $val->description }}</textarea>
														<div class="text-muted fs-7">Set a description for better visibility.</div>
													</div>
													<div>
														<label class="form-label">Image 1</label>
														<input type="file" class="form-control contentimg" id="contentimg">
														<img src="{{asset('accolades-img/')}}/{{$val->image}}" height="110px" width="150px">
													</div>
													<div>
														<label class="form-label">Image 2</label>
														<input type="file" class="form-control contentimg2" id="contentimg2">
														<img src="{{asset('accolades-img/')}}/{{$val->image2}}" height="110px" width="150px">
													</div>
												</div>
												<button type="button" class="btn btn-danger removeRow">Remove</button>
											</div>
											@endforeach
											<div  id="contentid_content">
											</div>
											<button id="addRow" type="button" class="btn btn-info">Add Row</button><br>
											<button id="submitcontent" onclick="submitContent()" type="button" class="btn btn-primary">Submit</button>
											<?php
										}
										else
										{
											?>
											<div class="card-header">
												<div class="card-title"><h2>Content</h2></div>
											</div>
											
											<div class="card-body pt-0">
												<div class="mb-10 fv-row">
													<label class="required form-label">{{$post_type}} Main Title</label>
													<input type="text" class="form-control mb-2 titlemaincontent" id="titlemaincontent" placeholder="Enter title" value="{{ $data->content_title }}"/>
													<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
												</div>
												
												<div>
													<label class="form-label">Description</label>
													<textarea id="descriptioncontent" class="form-control descriptioncontent">{{ $data->description }}</textarea>
													<div class="text-muted fs-7">Set a description for better visibility.</div>
												</div>
												<div class="mb-10 fv-row">
													<label class="required form-label">{{$post_type}} Content Title</label>
													<input type="text" class="form-control mb-2 titlecontent" id="titlecontent" placeholder="Enter title" value="{{ $data->title }}"/>
													<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
												</div>
												<div>
													<label class="form-label">Image 1</label>
													<input type="file" class="form-control contentimg" id="contentimg">
												</div>
												<div>
													<label class="form-label">Image 2</label>
													<input type="file" class="form-control contentimg2" id="contentimg2">
												</div>
												<div  id="contentid_content">
												</div>
												<button id="addRow" type="button" class="btn btn-info">Add Row</button><br>
												<button id="submitcontent" onclick="submitContent()" type="button" class="btn btn-primary">Submit</button>
											</div>
											<?php

										}
									 ?>
									
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_innovation" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<?php 
										$innovation = json_decode($data->innovation);
										if(!empty($innovation) && $innovation != "")
										{
											?>
											<div class="mb-10 fv-row">
												<label class="required form-label">{{$post_type}} Main Title</label>
												<input type="text" class="form-control mb-2 titlemaininnovation" id="titlemaininnovation" placeholder="Enter title" value="{{ $data->innovation_title }}"/>
												<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
											</div>
											@foreach($innovation as$key=>$val)
											<div class="useraddino">
												<div class="card-header">
													<div class="card-title"><h2>Innovation</h2></div>
												</div>
												<div class="card-body pt-0">
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Innovation Title</label>
														<input type="text" class="form-control mb-2 titleinnovation" id="titleinnovation" placeholder="Enter title" value="{{ $val->title }}"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div>
														<label class="form-label">Description</label>
														<textarea id="descriptioninnovation" class="form-control descriptioninnovation">{{ $val->description }}</textarea>
														<div class="text-muted fs-7">Set a description for better visibility.</div>
													</div>
													<div>
														<label class="form-label">Image</label>
														<input type="file" class="form-control innovatinoimg" id="innovatinoimg">
														<img src="{{asset('accolades-img/')}}/{{$val->image}}" height="110px" width="150px">
													</div>
													<div>
														<label class="form-label">Image 2</label>
														<input type="file" class="form-control innovatinoimg2" id="innovatinoimg2">
														<img src="{{asset('accolades-img/')}}/{{$val->image2}}" height="110px" width="150px">
													</div>
													<button type="button" class="btn btn-danger removeRowino">Remove</button>
												</div>
											</div>
											@endforeach
											<div  id="contentid_innovation">
											</div>
											<button id="addRowinnovation" type="button" class="btn btn-info">Add Row</button><br>
											<button id="submiinnovation" onclick="submitinnovation()" type="button" class="btn btn-primary">Submit</button>
											
									<?php
										}
										else{
											?>
											<div class="card-header">
													<div class="card-title"><h2>Innovation</h2></div>
												</div>
												<div class="card-body pt-0">
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Main Title</label>
														<input type="text" class="form-control mb-2 titlemaininnovation" id="titlemaininnovation" placeholder="Enter title" value="{{ $data->content_title }}"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Innovation Title</label>
														<input type="text" class="form-control mb-2 titleinnovation" id="titleinnovation" placeholder="Enter title"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div>
														<label class="form-label">Description</label>
														<textarea id="descriptioninnovation" class="form-control descriptioninnovation"></textarea>
														<div class="text-muted fs-7">Set a description for better visibility.</div>
													</div>
													<div>
														<label class="form-label">Image</label>
														<input type="file" class="form-control innovatinoimg" id="innovatinoimg">
													</div>
													<div>
														<label class="form-label">Image 2</label>
														<input type="file" class="form-control innovatinoimg2" id="innovatinoimg2">
													</div>
													<div  id="contentid_innovation">
											</div>
											<button id="addRowinnovation" type="button" class="btn btn-info">Add Row</button><br>
											<button id="submiinnovation" onclick="submitinnovation()" type="button" class="btn btn-primary">Submit</button>

												</div>
											<?php
										}
									 ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_double_image" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<?php 
										$double_value = json_decode($data->double_value);
										if(!empty($double_value) && $double_value != "")
										{
											?>
											<div class="mb-10 fv-row">
												<label class="required form-label">{{$post_type}} Main Title</label>
												<input type="text" class="form-control mb-2 titlemaininnovation" id="titlemaininnovation" placeholder="Enter title" value="{{ $data->innovation_title }}"/>
												<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
											</div>
											@foreach($double_value as$key=>$val)
											<div class="useraddino">
												<div class="card-header">
													<div class="card-title"><h2>Double Innovation</h2></div>
												</div>
												<div class="card-body pt-0">
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Innovation Title</label>
														<input type="text" class="form-control mb-2 titlemaininnovationdouble" id="titlemaininnovationdouble" placeholder="Enter title" value="{{ $val->title }}"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div>
														<label class="form-label">Description</label>
														<textarea id="descriptioninnovationdouble" class="form-control descriptioninnovationdouble">{{ $val->description }}</textarea>
														<div class="text-muted fs-7">Set a description for better visibility.</div>
													</div>
													<div>
														<label class="form-label">Image1</label>
														<input type="file" class="form-control innovatinoimgdouble1" id="innovatinoimgdouble1">
														<img src="{{asset('accolades-img/')}}/{{$val->image1}}" height="110px" width="150px">
													</div>
													<div>
														<label class="form-label">Image</label>
														<input type="file" class="form-control innovatinoimgdouble2" id="innovatinoimgdouble2">
														<img src="{{asset('accolades-img/')}}/{{$val->image2}}" height="110px" width="150px">
													</div>
													<button type="button" class="btn btn-danger removeRowino">Remove</button>
												</div>
											</div>
											@endforeach
											<div  id="contentid_innovation">
											</div>
											<button id="addRowinnovation" type="button" class="btn btn-info">Add Row</button><br>
											<button id="submiinnovation" onclick="submitinnovation()" type="button" class="btn btn-primary">Submit</button>
											
									<?php
										}
										else{
											?>
											<div class="card-header">
													<div class="card-title"><h2>Double Image</h2></div>
												</div>
												<div class="card-body pt-0">
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Main Title</label>
														<input type="text" class="form-control mb-2 titlemaininnovationdouble" id="titlemaininnovationdouble" placeholder="Enter title" value="{{ $data->content_title }}"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div class="mb-10 fv-row">
														<label class="required form-label">{{$post_type}} Innovation Title</label>
														<input type="text" class="form-control mb-2 titleinnovationdouble" id="titleinnovationdouble" placeholder="Enter title"/>
														<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
													</div>
													<div>
														<label class="form-label">Description</label>
														<textarea id="descriptioninnovationdouble" class="form-control descriptioninnovationdouble"></textarea>
														<div class="text-muted fs-7">Set a description for better visibility.</div>
													</div>
													<div>
														<label class="form-label">Image</label>
														<input type="file" class="form-control innovatinoimgdouble1" id="innovatinoimgdouble1">
													</div>
													<div>
														<label class="form-label">Image</label>
														<input type="file" class="form-control innovatinoimgdouble2" id="innovatinoimgdouble2">
													</div>
													<div  id="contentid_doubleinnovation">
											</div>
											<button id="addRowdoubleinnovation" type="button" class="btn btn-info">Add Row</button><br>
											<button id="submidoubleinnovation" onclick="submitdoubleinnovation()" type="button" class="btn btn-primary">Submit</button>

												</div>
											<?php
										}
									 ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_migration" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
								<?php 
									$migration = json_decode($data->migration);
									if(!empty($migration) && $migration != "")
									{
										?>
										<div class="mb-10 fv-row">
											<label class="required form-label">{{$post_type}} Main Title</label>
											<input type="text" class="form-control mb-2 titlemainmigration" id="titlemainmigration" placeholder="Enter title" value="{{ $data->title_migration }}"/>
											<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
										</div>
										@foreach($migration as$key=>$val)
										<div class="usercardmigra">
											<div class="card-header">
												<div class="card-title"><h2>Migration</h2></div>
											</div>
											<div class="card-body pt-0">
												<div class="mb-10 fv-row">
													<label class="required form-label">{{$post_type}} Migration Title</label>
													<input type="text" class="form-control mb-2 titlemigration" id="titlemigration" placeholder="Enter title" value="{{ $val->title }}"/>
													<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
												</div>
												<div>
													<label class="form-label">Description</label>
													<textarea id="descriptionmigration" class="form-control descriptionmigration">{{ $val->description }}</textarea>
													<div class="text-muted fs-7">Set a description for better visibility.</div>
												</div>
												<button type="button" class="btn btn-danger removeRowmigra">Remove</button>
											</div>
										</div>
										@endforeach
										<div  id="contentid_migration">
										</div>
										<button id="addRowmigration" type="button" class="btn btn-info">Add Row</button>
										<button id="submimigration" onclick="submitmigration()" type="button" class="btn btn-primary">Submit</button>

								<?php }else{?>
										<div class="card-header">
											<div class="card-title"><h2>Migration</h2></div>
										</div>
										<div class="card-body pt-0">
											<div class="mb-10 fv-row">
												<label class="required form-label">{{$post_type}} Main Title</label>
												<input type="text" class="form-control mb-2 titlemainmigration" id="titlemainmigration" placeholder="Enter title" value="{{ $data->title_migration }}"/>
												<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
											</div>
											<div class="mb-10 fv-row">
												<label class="required form-label">{{$post_type}} Migration Title</label>
												<input type="text" class="form-control mb-2 titlemigration" id="titlemigration" placeholder="Enter title" />
												<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
											</div>
											<div>
												<label class="form-label">Description</label>
												<textarea id="descriptionmigration" class="form-control descriptionmigration"></textarea>
												<div class="text-muted fs-7">Set a description for better visibility.</div>
											</div>
											<div  id="contentid_migration">
											</div>
											<button id="addRowmigration" type="button" class="btn btn-info">Add Row</button>
											<button id="submimigration" onclick="submitmigration()" type="button" class="btn btn-primary">Submit</button>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_imapact" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
											<div class="card-header">
												<div class="card-title"><h2>Impact</h2></div>
											</div>
											<div class="card-body pt-0">
												<div class="mb-10 fv-row">
													<label class="required form-label">{{$post_type}} Impact Title</label>
													<input type="text" class="form-control mb-2 imapacttitle" id="imapacttitle" placeholder="Enter title" value="{{ $data->imapact_title }}"/>
													<div class="text-muted fs-7">A {{$post_type}} name is required and recommended to be unique.</div>
												</div>
												<?php 
												$impact = json_decode($data->impact);
												if(!empty($impact) && $impact != "")
												{
												?>
													@foreach($impact as $imp)
														<div class="usercardimpact">
															<div>
																<label class="form-label">Description</label>
																<textarea id="descriptionimpact" class="form-control imapactdescription">{{ $imp->description }}</textarea>
																<div class="text-muted fs-7">Set a description for better visibility.</div>
															</div>
															<div>
																<label class="form-label">Image</label>
																<input type="file" class="form-control imapactimg" id="imapactimg">
																<img src="{{asset('accolades-img/')}}/{{$imp->image}}" height="110px" width="150px">
															</div>
															<div>
																<label class="form-label">Image</label>
																<input type="file" class="form-control imapactimg2" id="imapactimg2">
																<img src="{{asset('accolades-img/')}}/{{$imp->image2}}" height="110px" width="150px">
															</div>
															<button type="button" class="btn btn-danger removeRowimpact">Remove</button>
														</div>
														@endforeach
													
													<div  id="contentid_impact">
													</div>
													<button id="addRowmimpact" type="button" class="btn btn-info">Add Row</button><br>
													<button id="submtimpact" onclick="submitimpact()" type="button" class="btn btn-primary">Submit</button>

													<?php }else{
													?>
													<div>
														<label class="form-label">Description</label>
														<textarea id="descriptionimpact" class="form-control imapactdescription"></textarea>
														<div class="text-muted fs-7">Set a description for better visibility.</div>
													</div>
													<div>
														<label class="form-label">Image</label>
														<input type="file" class="form-control imapactimg" id="imapactimg">
													</div>
													<div>
														<label class="form-label">Image 2</label>
														<input type="file" class="form-control imapactimg2" id="imapactimg2">
													</div>
													<div  id="contentid_impact">
													</div>
													<button id="addRowmimpact" type="button" class="btn btn-info">Add Row</button><br>
													<button id="submtimpact" onclick="submitimpact()" type="button" class="btn btn-primary">Submit</button>

												<?php
											}?>
											</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
							<div class="d-flex flex-column gap-7 gap-lg-10">
								<div class="card card-flush py-4">
									<div class="card-header">
										<div class="card-title"><h2>Meta Options</h2></div>
									</div>
									<div class="card-body pt-0">
										<div class="mb-10">
											<label class="form-label">Meta Tag Title</label>
											<input type="text" class="form-control mb-2" value="{{$data->meta_title}}" id="meta_title" name="meta_title" placeholder="Meta tag name" />
											<div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
										</div>
										<div class="mb-10">
											<label class="form-label">Meta Main Title</label>
											<input type="text" class="form-control mb-2" value="{{$data->page_title}}" id="meta_main_title" name="meta_title" placeholder="Meta tag name" />
											<div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
										</div>
										<div class="mb-10">
											<label class="form-label">Meta Tag Description</label>
											<!-- <div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div> -->
											<textarea class="form-control" id="seo_description">{{$data->meta_description}}</textarea>
											<!-- <div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div> -->
										</div>
										<div>
											<label class="form-label">Meta Tag Keywords</label>
											<input id="kt_ecommerce_add_product_meta_keywords" value="{{$data->seo_keywords}}" name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
											<div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma
											<code>,</code>between each keyword.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ route('page.service.management',$post_type) }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
						<button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
							<span class="indicator-label">Publish Changes</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection


@section('js')
<script src="https://cdn.tiny.cloud/1/344q5fi5mjmf6trdrw5naubzza7s17jt9k57e6s09dlpbl1u/tinymce/5/tinymce.min.js"></script>
<script>
	$(document).ready(function(e) {
		
		// Get Product Categories
		get_product_categories();
		
		$("#image").change(function() {
			readURL(this);
		});
		
		// For Discount
		

		// Product type on change
		
	});
	
	// Image View
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				jQuery('#image-src').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
// 	$("#title").keyup(function() {
//   var Text = $(this).val();
//   Text = Text.toLowerCase();
//   Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
//   $("#slug").val(Text);        
// });


	function submitContent()
	{
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('type', 'content');
		data.append('titlemaincontent', $('.titlemaincontent').val());
		$('.titlecontent').each(function(i,v){
			var dataa = $(v).val();
			// arra.push(dataa);
			data.append('titlecontent[]',dataa);
		})
		$('.descriptioncontent').each(function(i,v){
			var datadesc = $(v).val();
			// arrdesc.push(datadesc);
			data.append('descriptioncontent[]', datadesc);
		})
		$('.contentimg').each(function(i,v){
			if(jQuery(this)[0].files[0] != "undefined")
			{
				data.append('dataimg[]', jQuery(this)[0].files[0]);
			}
			
			// dataimg.push(jQuery(this)[0].files[0] );
		})
		$('.contentimg2').each(function(i,v){
			if(jQuery(this)[0].files[0] != "undefined")
			{
				data.append('dataimgsecond[]', jQuery(this)[0].files[0]);
			}
			
			// dataimg.push(jQuery(this)[0].files[0] );
		})
		
		
		var response = adminAjax('{{route("ajax.service.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	function submitinnovation(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('type', 'innovation');
		data.append('titlemaininnovation', $('.titlemaininnovation').val());

		$('.titleinnovation').each(function(i,v){
			var datatitle = $(v).val();
			// datainotitle.push(datatitle);
			data.append('titleinnovation[]', datatitle);

		})
		$('.descriptioninnovation').each(function(i,v){
			var datainodesc = $(v).val();
			// datainodescarr.push(datainodesc);
			data.append('descriptioninnovation[]',datainodesc);

		})
		$('.innovatinoimg').each(function(i,v){
			data.append('innovatinoimg[]', jQuery(this)[0].files[0]);
		})
		$('.innovatinoimg2').each(function(i,v){
			data.append('innovatinoimgsecond[]', jQuery(this)[0].files[0]);
		})
		var response = adminAjax('{{route("ajax.service.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}

	function submitdoubleinnovation(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('type', 'doubletitle');
		data.append('doubletitle', $('.titlemaininnovationdouble').val());
		$('.descriptioninnovationdouble').each(function(i,v){
			var datainodescss = $(v).val();
			// migrationarr.push(datainodescss );
			data.append('descriptioninnovationdouble[]', datainodescss);
		})
		$('.titleinnovationdouble').each(function(i,v){
			var datainodescsstitle = $(v).val();
			// migrationtitlearr.push(datainodescsstitle);
			data.append('titleinnovationdouble[]', datainodescsstitle);
		});
		$('.innovatinoimgdouble1').each(function(i,v){
			data.append('innovatinoimgdouble1[]', jQuery(this)[0].files[0]);
		})
		$('.innovatinoimgdouble2').each(function(i,v){
			data.append('innovatinoimgdouble2[]', jQuery(this)[0].files[0]);
		})
		var response = adminAjax('{{route("ajax.service.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	function submitmigration(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('type', 'migration');
		data.append('titlemainmigration', $('.titlemainmigration').val());

		$('.descriptionmigration').each(function(i,v){
			var datainodescss = $(v).val();
			// migrationarr.push(datainodescss );
			data.append('descriptionmigration[]', datainodescss);
		})
		$('.titlemigration').each(function(i,v){
			var datainodescsstitle = $(v).val();
			// migrationtitlearr.push(datainodescsstitle);
			data.append('titlemigration[]', datainodescsstitle);
		});
		var response = adminAjax('{{route("ajax.service.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}

	function submitimpact(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('type', 'impact');
		data.append('imapacttitle', $('.imapacttitle').val());
		$('.imapactdescription').each(function(i,v){
			var imapactdescription = $(v).val();
			// imapactdescprition.push(imapactdescription);
			data.append('imapactdescription[]', imapactdescription);
		})
		$('.imapactimg').each(function(i,v){
			data.append('imapactimg[]', jQuery(this)[0].files[0]);
		})
		$('.imapactimg2').each(function(i,v){
			data.append('imapactimgsecond[]', jQuery(this)[0].files[0]);
		})
		var response = adminAjax('{{route("ajax.service.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}

  	// CREATE
  	function saveData(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('title', $('#title').val());
		data.append('type', "general");
		data.append('slug', $('#slug').val());
		data.append('content_title_main', $('#content_title_main').val());
		data.append('post_type', "blog");
		data.append('category', $("#categselect").val());
		data.append('description', tinyMCE.get('description').getContent());
		data.append('image', jQuery('#image')[0].files[0]);
		data.append('priority',  $('#priority').val());
		data.append('home_page_title',  $('#content_title_home_main').val());
		data.append('banner_image', jQuery('#banner_image')[0].files[0]);
		data.append('mobile_banner', jQuery('#mobile_banner')[0].files[0]);
		data.append('content_image', jQuery('#content_image')[0].files[0]);
		data.append('status', $('#status').val());
		data.append('seo_title', $('#meta_title').val());
		data.append('meta_main_title', $('#meta_main_title').val());
		data.append('seo_keywords', $('#kt_ecommerce_add_product_meta_keywords').val());
		data.append('seo_description', $('#seo_description').val());
		var arra = [];
		var arrdesc = [];
		var dataimg =[];
		var datainotitle = [];
		var datainodescarr= [];
		var innovatinarr = [];
		var migrationarr = [];
		var migrationtitlearr = [];
		var imapactdescprition = [];
		var imapactimg = [];
		// $('.titlecontent').each(function(i,v){
		// 	var dataa = $(v).val();
		// 	// arra.push(dataa);
		// 	data.append('titlecontent[]',dataa);
		// })
		// $('.descriptioncontent').each(function(i,v){
		// 	var datadesc = $(v).val();
		// 	// arrdesc.push(datadesc);
		// 	data.append('descriptioncontent[]', datadesc);
		// })
		// $('.contentimg').each(function(i,v){
		// 	if(jQuery(this)[0].files[0] != "undefined")
		// 	{
		// 		data.append('dataimg[]', jQuery(this)[0].files[0]);
		// 	}
			
		// 	// dataimg.push(jQuery(this)[0].files[0] );
		// })
		
		
		// $('.imapactdescription').each(function(i,v){
		// 	var imapactdescription = $(v).val();
		// 	// imapactdescprition.push(imapactdescription);
		// 	data.append('imapactdescription[]', imapactdescription);
		// })
		// $('.imapactimg').each(function(i,v){
		// 	data.append('imapactimg[]', jQuery(this)[0].files[0]);
		// })
		
		
		data.append('contentimg', dataimg);
		data.append('innovatinoimg', innovatinarr);
		data.append('maincontentdescription',tinyMCE.get('maincontentdescription').getContent());
		data.append('imapactimg', imapactimg);
		// data.append('imapacttitle', $('.imapacttitle').val());
		
		
		// console.log(datainotitle)
		console.log(migrationarr)
		// console.log(dataimg)
		// console.log(arrdesc)
		// 	console.log(arra)
			// return false;
		var response = adminAjax('{{route("ajax.service.store")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			// setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
  	}

	// Save Category
	function saveCategory(item_id = null, action = ''){
		var data = new FormData();
		data.append('item_id', item_id);
		data.append('action', action);
		data.append('product_id', '{{$data->id}}');
		var response = adminAjax('{{route("ajax.product.save.category")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			//setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Save Attribute
	function saveAttribute(item_id = null){
		var data = new FormData();
		data.append('item_id', item_id);
		data.append('product_id', '{{$data->id}}');
		var response = adminAjax('{{route("ajax.product.save.attribute")}}', data);
		if(response.status == '200'){
			//swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			//setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Save Variations
	function saveVariation(variation_id = ''){
		
		var price = $("#var-"+ variation_id +" input[name=price]").val();
		var sale_price = $("#var-"+ variation_id +" input[name=sale_price]").val();
		
		if(sale_price >= price){
			alert('Saling price < Price'); return false;
		}
		
		var data = new FormData();
		data.append('product_id', '{{$data->id}}');
		data.append('variation_id', variation_id);
		data.append('price', price);
		data.append('sale_price', sale_price);
		var response = adminAjax('{{route("ajax.product.save.variation")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			//setTimeout(function(){ location.reload(); }, 2000)
			
		}else if(response.status == '422'){
			$('.validation-div').text('');
			$.each(response.error, function( index, value ) {
				$('#val-'+index).text(value);
			});
			
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
	
	// Get Product Categories
	function get_product_categories(){
		var data = new FormData();
		data.append('product_id', '{{$data->id}}');
		data.append('modeule', 'Blog');
		var response = adminAjax('{{route("ajax.post.category.list")}}', data);
		if(response.status == '200'){
			if(response.data.length > 0){
				var myarray = "[{{$data->category}}]";
				console.log(myarray);
				parsedTest = JSON.parse(myarray);
				console.log(parsedTest);
				$.each(response.data, function( index, value ) {
					if(jQuery.inArray(value.id, parsedTest) != -1) {
						$("#categselect").append('<option value=' + value.id + ' selected>' + value.title + '</option>');
					} else {
						$("#categselect").append('<option value=' + value.id + '>' + value.title + '</option>');
					}

					
				})
			}
		}
	}
	
	// Save File
	function saveFile(){
		var data = new FormData();
		data.append('item_id', '{{$data->id}}');
		data.append('file', file);
		var response = adminAjax('{{route("ajax.product.save.gallery")}}', data);
		if(response.status == '200'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
			if(response.data.media){
				$('#gallery-list').append('<div class="gallery-img me-3 mt-5"><img src="'+ response.data.media +'" class="" alt=""></div>');
			}
		}else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
</script>

<!-- FOR EDITOR ONLY -->
<script type="text/javascript">
	tinymce.init({
		selector: '#description',
		plugins: 'code table image paste',
		toolbar: 'undo redo | table image alignleft aligncenter alignright alignjustify code',
		toolbar_drawer: 'floating',
		tinycomments_mode: 'embedded',
		height : '580',
		oninit : 'setPlainText',
		images_upload_handler: function (blobInfo, success, failure) {
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'adminApis/save_media');
			xhr.onload = function() {
				var json;
				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}
			
				json = JSON.parse(xhr.responseText);
			
				if (!json || typeof json.details != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}
				//success('https://www.codefencers.com/media/' + json.details);
			};
			formData = new FormData();
			formData.append('media', blobInfo.blob(), blobInfo.filename());
			xhr.send(formData);
		},
	});
	// tinymce.init({
	// 	selector: '#descriptioncontent',
	// 	plugins: 'code table image paste',
	// 	toolbar: 'undo redo | table image alignleft aligncenter alignright alignjustify code',
	// 	toolbar_drawer: 'floating',
	// 	tinycomments_mode: 'embedded',
	// 	height : '580',
	// 	oninit : 'setPlainText',
	// 	images_upload_handler: function (blobInfo, success, failure) {
	// 		var xhr, formData;
	// 		xhr = new XMLHttpRequest();
	// 		xhr.withCredentials = false;
	// 		xhr.open('POST', 'adminApis/save_media');
	// 		xhr.onload = function() {
	// 			var json;
	// 			if (xhr.status != 200) {
	// 				failure('HTTP Error: ' + xhr.status);
	// 				return;
	// 			}
			
	// 			json = JSON.parse(xhr.responseText);
			
	// 			if (!json || typeof json.details != 'string') {
	// 				failure('Invalid JSON: ' + xhr.responseText);
	// 				return;
	// 			}
	// 			//success('https://www.codefencers.com/media/' + json.details);
	// 		};
	// 		formData = new FormData();
	// 		formData.append('media', blobInfo.blob(), blobInfo.filename());
	// 		xhr.send(formData);
	// 	},
	// });
	
// add row
$("#addRow").click(function() {
  var html = '';
  //added classes..
  html += '<div class="useradd">';
  html += '<div class="card-header">';
  html += '<div class="card-title"><h2>Content</h2></div>';
  html += '</div>';
  html += '<div class="card-body pt-0">';
  html += '<div class="mb-10 fv-row">';
  html += '<label class="required form-label"> Content Title</label>';
  html += '<input type="text" class="form-control mb-2 titlecontent" id="titlecontent" placeholder="Enter title" value=""/>';
  html += '<div class="text-muted fs-7">A name is required and recommended to be unique.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Description</label>';
  html += '<textarea id="descriptioncontent" class="form-control descriptioncontent"></textarea>';
  html += '<div class="text-muted fs-7">Set a description for better visibility.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image</label>';
  html += '<input type="file" class="form-control contentimg" id="contentimg">';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image 2</label>';
  html += '<input type="file" class="form-control contentimg2" id="contentimg2">';
  html += '<button type="button" class="btn btn-danger removeRow">Remove</button>';
  html += '</div>';
  
  html += '</div>';
  html += '</div>';
  html += '</div>';
  $('#contentid_content').append(html);
});

//use class here as well
$(document).on('click', '.removeRow', function() {
  $(this).closest('.useradd').remove();
});
// add row
$("#addRowinnovation").click(function() {
  var html = '';
  //added classes..
  html += '<div class="useraddino">';
  html += '<div class="card-header">';
  html += '<div class="card-title"><h2>Innovation</h2></div>';
  html += '</div>';
  html += '<div class="card-body pt-0">';
  html += '<div class="mb-10 fv-row">';
  html += '<label class="required form-label"> Innovation Title</label>';
  html += '<input type="text" class="form-control mb-2 titleinnovation" id="titleinnovation" placeholder="Enter title" />';
  html += '<div class="text-muted fs-7">A  name is required and recommended to be unique.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Description</label>';
  html += '<textarea id="descriptioninnovation" class="form-control descriptioninnovation"></textarea>';
  html += '<div class="text-muted fs-7">Set a description for better visibility.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image</label>';
  html += '<input type="file" class="form-control innovatinoimg" id="innovatinoimg">';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image 2</label>';
  html += '<input type="file" class="form-control innovatinoimg2" id="innovatinoimg2">';
  html += '<button type="button" class="btn btn-danger removeRowino">Remove</button>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  $('#contentid_innovation').append(html);
});

$("#addRowdoubleinnovation").click(function() {
  var html = '';
  //added classes..
  html += '<div class="card-header">';
  html += '<div class="card-title"><h2>Double Image</h2></div>';
  html += '</div>';
  html += '<div class="card-body pt-0">';
//   html += '<div class="mb-10 fv-row">';
//   html += '<label class="required form-label"> Main Title</label>';
//   html += '<input type="text" class="form-control mb-2 titlemaininnovation" id="titlemaininnovation" placeholder="Enter title"/>';
//   html += '<div class="text-muted fs-7">A name is required and recommended to be unique.</div>';
//   html += '</div>';
  html += '<div class="mb-10 fv-row">';
  html += '<label class="required form-label"> Innovation Title</label>';
  html += '<input type="text" class="form-control mb-2 titleinnovationdouble" id="titleinnovationdouble" placeholder="Enter title"/>';
  html += '<div class="text-muted fs-7">A name is required and recommended to be unique.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Description</label>';
  html += '<textarea id="descriptioninnovationdouble" class="form-control descriptioninnovationdouble"></textarea>';
  html += '<div class="text-muted fs-7">Set a description for better visibility.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image</label>';
  html += '<input type="file" class="form-control innovatinoimgdouble1" id="innovatinoimgdouble1">';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image-2</label>';
  html += '<input type="file" class="form-control innovatinoimgdouble2" id="innovatinoimgdouble2">';
  html += '</div>';
  html += '<button type="button" class="btn btn-danger removeRowino">Remove</button>';
  html += '</div>';
  $('#contentid_doubleinnovation').append(html);
});

//use class here as well
$(document).on('click', '.removeRowino', function() {
  $(this).closest('.useraddino').remove();
});
$("#addRowmigration").click(function() {
	
  var html = '';
  //added classes..
  html += '<div class="usercardmigra">';
  html += '<div class="card card-flush py-4">';
  html += '<div class="card-header">';
  html += '<div class="card-title"><h2>Migration</h2></div>';
  html += '</div>';
  html += '<div class="card-body pt-0">';
  html += '<div class="mb-10 fv-row">';
  html += '<label class="required form-label"> Migration Title</label>';
  html += '<input type="text" class="form-control mb-2 titlemigration" id="titlemigration" placeholder="Enter title" value=""/>';
  html += '<div class="text-muted fs-7">A name is required and recommended to be unique.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Description</label>';
  html += '<textarea id="descriptionmigration" class="form-control descriptionmigration"></textarea>';
  html += '<div class="text-muted fs-7">Set a description for better visibility.</div>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<button type="button" class="btn btn-danger removeRowmigra">Remove</button>';
  html += '</div>';
  $('#contentid_migration').append(html);
});

//use class here as well
$(document).on('click', '.removeRowmigra', function() {
  $(this).closest('.usercardmigra').remove();
});
$("#addRowmimpact").click(function() {
  var html = '';
  //added classes..
  html += '<div class="usercardimpact">';
  html += '<div>';
  html += '<label class="form-label">Description</label>';
  html += '<textarea id="imapactdescription" class="form-control imapactdescription"></textarea>';
  html += '<div class="text-muted fs-7">Set a description for better visibility.</div>';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image</label>';
  html += '<input type="file" class="form-control imapactimg" id="imapactimg">';
  html += '</div>';
  html += '<div>';
  html += '<label class="form-label">Image 2</label>';
  html += '<input type="file" class="form-control imapactimg2" id="imapactimg2">';
  html += '</div>';	
  html += '<button type="button" class="btn btn-danger removeRowimpact">Remove</button>';
  html += '</div>';
  $('#contentid_impact').append(html);
});

//use class here as well
$(document).on('click', '.removeRowimpact', function() {
  $(this).closest('.usercardimpact').remove();
});
tinymce.init({
		selector: '#maincontentdescription',
		plugins: 'code table image paste',
		toolbar: 'undo redo | table image alignleft aligncenter alignright alignjustify code',
		toolbar_drawer: 'floating',
		tinycomments_mode: 'embedded',
		height : '580',
		oninit : 'setPlainText',
		images_upload_handler: function (blobInfo, success, failure) {
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'adminApis/save_media');
			xhr.onload = function() {
				var json;
				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}
			
				json = JSON.parse(xhr.responseText);
			
				if (!json || typeof json.details != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}
				//success('https://www.codefencers.com/media/' + json.details);
			};
			formData = new FormData();
			formData.append('media', blobInfo.blob(), blobInfo.filename());
			xhr.send(formData);
		},
	});

</script>
@endsection