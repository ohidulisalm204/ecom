<h2 class="title text-center">Features Items</h2>
<?php
    foreach($publish_product as $view_product) {
    ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products" style="height:430px;" >
                <div class="productinfo text-center">
                    <img src="{{URL::to('/img/'.$view_product->product_image)}}" alt="" />
                    <h2>{{strtoupper($view_product->product_name)}}</h2><br>
                    <h5>{{strtoupper($view_product->manufacture_name)}}</h5>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <img src="{{URL::to('/img/'.$view_product->product_image)}}" style="height:280px;" alt="" />
                        <h2 style="padding-top:10px;">{{strtoupper($view_product->product_name)}}</h2>
                        <p><a href="{{Route('show_category',[$view_product->id])}}">{{$view_product->category_name}}</a></p>
                        <h2>Price: {{$view_product->product_price}} Tk</h2>
                        <form action="{{Route('add_to_cart',[$view_product->id])}}" method="post">
                            @csrf
                            <input name="quantity" type="hidden" value="1" /><br>
                            <input name="customer_id" type="hidden" value="{{Session::get('customer_id')}}" /><br>
                            <button type="submit" class=" btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </form>
                    </div>
                </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified" style="background-color:gray;">
                <li><a href="{{route('show_manufacture',[$view_product->manufacture_id])}}"><i class="fa "></i>{{$view_product->manufacture_name}}</a></li>
                <li><a href="{{route('view_product',[$view_product->id])}}"><i class="fa "></i>VIEW PRODUCT</a></li>
            </ul>
        </div>
    </div>
</div>
<?php }?>