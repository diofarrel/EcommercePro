<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $products->id) }}" class="option1">
                                Product Details
                            </a>
                            <!-- <a href="" class="option2">
                                Buy Now
                            </a> -->
                            
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{ $products->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>{{ $products->title }}</h5>
                    </div>
                    <div class="detail-box">
                        <p>{{ $products->description }}</p>
                    </div>
                    <div class="detail-box">
                        @if($products->discount_price != null)
                            <h6>IDR. {{ $products->discount_price }}</h6>
                            <h6 style="text-decoration: line-through; font-weight: 300; color:#002c3e;">IDR. {{ $products->price }}</h6>
                        @else
                            <h6>IDR. {{ $products->price }}</h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <span style="padding: 25px;">
            {!!$product->links()!!}
        </span>
        <!-- <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div> -->
    </div>
</section>