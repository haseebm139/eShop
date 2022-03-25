@extends('layouts.front')

@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"> Collection / {{ $products->category->name }} / {{ $products->name }}</h6>
        </div>
    </div>

    <div class="container product_data">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/' . $products->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size: 16px;"
                                    class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : <s>Rs {{ $products->selling_price }}</s></label>
                        <p class="mt-3">
                            {{ !!$products->small_discribtion }}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success"> In Stock</label>
                        @else
                            <label class="badge bg-success"> Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <input type="hidden" class="prod_id" value="{{ $products->id }}" name="prod_id">
                            <div class="col-md-3">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class=" input-group-text decrement-btn">-</span>
                                    <input type="text" name="quantity " value="1" class="form-control qty_input" />
                                    <span class="input-group-text increment-btn">+</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br>
                                <button type="button" class="btn btn-primary me-3 float-start addToWishlist">Add to Wishlist
                                    <i class="fa fa-heart"></i> </button>
                                <button type="button" class="btn btn-success me-3 float-start addToCartBtn">Add to Cart <i
                                        class="fa fa-cart"></i></button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                // alert();
                var inc_val = $('.qty_input').val();
                var value = parseInt(inc_val, 10);
                value = isNaN(value) ? 0 : value;
                if (value <= 10) {
                    value++
                    $('.qty_input').val(value)
                }
            });
            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var inc_val = $('.qty_input').val();
                var value = parseInt(inc_val, 10);
                value = isNaN(value) ? 0 : value;
                if (value >= 1) {
                    value--
                    $('.qty_input').val(value)
                }
            });

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty_input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/add_to_cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty
                    },
                    success: function(response) {
                        swal(response.status);
                    }
                });
                // alert(prod_id);
                // alert(prod_qty);


            });
        });
    </script>
@endsection
