@extends('Backend.master')
@section('content')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Add Product</h3>
            </div>
            <div class="card">
                <!-- <h5 class="card-header">Basic Form</h5> -->
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active show" id="tag-seo" data-toggle="tab" href="#seo" role="tab" aria-controls="home" aria-selected="false">SEO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tag-detail" data-toggle="tab" href="#detail" role="tab" aria-controls="profile" aria-selected="false">DETAIL</a>
                    </li>

                </ul>
                <form role="form" method="POST" action="{{route('Backend.Product.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="seo" role="tabpanel" aria-labelledby="tab-outline-one">
                            <div class="card-body">
                                <!-- <h3>SEO</h3> -->

                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input id="title" name="title" type="text" value="" class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control" name="keywords" id="keywords" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="tab-outline-one">
                            <div class="card-body">
                                <!-- <h3>DETAIL</h3> -->
                                <div class="box">
                                    <input type="file" name="images" id="images" class="inputfile inputfile-2" data-multiple-caption="{count} files selected">
                                    <label for="images"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image</span></label>
                                </div>
                                <div class="form-group">
                                    <label for="name_vi" class="col-form-label">Name</label>
                                    <input id="name_vi" name='name_vi' type="text" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="code" class="col-form-label">Code product</label>
                                    <input id="code" name='code' type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-form-label">Price</label>
                                    <input id="price" name='price' type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="col-form-label">Quantity</label>
                                    <input id="quantity" name='quantity' type="number" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="description_vi">Description</label>
                                    <textarea class="form-control" name="description_vi" id="description_vi" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_vi">Content</label>
                                    <textarea class="form-control" name="content_vi" id="content_vi" rows="3"></textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                    <input type="submit" class="btn btn-primary" name="save" value="Save">
                </form>
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            CKEDITOR.replace( 'description_vi', {
                filebrowserBrowseUrl: "{{ asset('ckfinder/ckfinder.html') }}",
                filebrowserImageBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Images') }}",
                filebrowserFlashBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Flash') }}",
                filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
                filebrowserFlashUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
            } );
            CKEDITOR.replace('content_vi');
        })  
    </script>
    @stop

