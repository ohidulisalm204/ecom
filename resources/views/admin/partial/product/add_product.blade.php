@extends('ext.layouts.admin_layout')

@section('dashboard')

@include('admin.partial.admin_navbar')

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
        @include('admin.partial.sidebar_left')
        <!-- end: Main Menu -->
            <div id="content" class="span10">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{URL::to('dashboard')}}">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Product</a>
                    </li>
                    <li>
                        <i class="icon-edit"></i>
                        <a href="#">Add Product</a>
                    </li>
                </ul>

                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div style="height: 35px; " class="box-header" data-original-title>
                            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2><br/>
                            <p style="text-align:center; padding-right:300px;"class="alert-success">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message',NULL);
                                }
                                else {
                                    echo "";
                                }
                                ?></p>
                        </div>
                        <div class="box-content">
                            <form class="form-horizontal" action="{{ route('save_product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Product Name</label>
                                        <div class="controls">
                                            <input type="text" class="" name="product_name" required=""> <!-- input-xlarge datepicker -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="selectError3">Select Category</label>
                                        <div class="controls">
                                            <select id="selectError3" name="category_id">
                                                <option>Select Category</option>
                                                <?php $active_category = DB::table('category_tbls')->where('publication_status',1)->get();
                                                    foreach($active_category as $view_category){ ?>
                                                <option value="{{$view_category->id}}">{{$view_category->category_name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="selectError3">Select Brands</label>
                                        <div class="controls">
                                            <select id="selectError3" name="manufacture_id">
                                                <option>Select Brands</option>
                                                <?php $active_brands=DB::table('manufactures')->where('publication_status',1)->get();
                                                    foreach($active_brands as $view_brands){ ?>
                                                    <option value="{{$view_brands->manufacture_id}}">{{$view_brands->manufacture_name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group hidden-phone">
                                        <label class="control-label" for="textarea2">Product Description</label>
                                        <div class="controls">
                                            <textarea class="" style="height:200px; width:400px;"  style="height:200px; width:400px;" name="product_description" rows="5" required="" ></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Product Price</label>
                                        <div class="controls">
                                            <input type="text" class="" name="product_price" required=""> <!-- input-xlarge datepicker -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">Product Image</label>
                                        <div class="controls">
                                            <input type="file" class="input-file uniform_on" id="fileInput" name="product_image" required> <!-- input-xlarge datepicker -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Product Size</label>
                                        <div class="controls">
                                            <input type="text" class="" name="product_size" required> <!-- input-xlarge datepicker -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Product Color</label>
                                        <div class="controls">
                                            <input type="text" class="" name="product_color" required> <!-- input-xlarge datepicker -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Product Stock</label>
                                        <div class="controls">
                                            <input type="text" class="" name="stock" required> <!-- input-xlarge datepicker -->
                                        </div>
                                    </div>
                                    <div class="control-group hidden-phone">
                                        <label class="control-label" for="textarea2">Product Status</label>
                                        <div class="controls">
                                            <input type="checkbox" name="product_status" value="1" >
                                        </div>
                                    </div>
                                    <div class="control-group hidden-phone">
                                        <label class="control-label" for="textarea2">Slider Status</label>
                                        <div class="controls">
                                            <input type="checkbox" name="slider_status" value="1" >
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                          <button type="reset" class="btn">Reset</button>
                                          <a href="{{URL::to('product')}}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->
            </div>

        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

@endsection
