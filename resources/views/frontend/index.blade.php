@extends('layouts.front')

@section('title')
    Wellcome to E Shop
@endsection


@section('content')
    @include('layouts.include.slider')

    {{-- Featured Product --}}
    <div class="container">
        <div class="row m-5">
            <h4>Featured Products</h4>
            <div class="owl-carousel featured-prod-carousel owl-theme ">
                @foreach ($featured_product as $prod)
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="">
                            <div class="card-body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price }}</span>
                                <span class="float-end">{{ $prod->original_price }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-prod-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dot: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
