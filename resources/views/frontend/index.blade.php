@extends('layouts.front')

@section('title')
    Wellcome to E Shop
@endsection


@section('content')
    @include('layouts.include.slider')

    {{-- Featured Products --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h4>Featured Products</h4>
                <div class="owl-carousel featured-prod-carousel owl-theme ">
                    @foreach ($featured_product as $prod)
                        <div class="item">
                            <a href="{{ url('category/'.$prod->slug)}}" >
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">{{ $prod->selling_price }}</span>
                                        <span class="float-end">{{ $prod->original_price }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- Trending Products --}}
    <div class="py-5">
        <div class="container">
            <div class="row ">
                <h4>Trending Products</h4>
                <div class="owl-carousel trending-prod-carousel owl-theme ">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{ url('category/'.$tcategory->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$tcategory->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $tcategory->name }}</h5>
                                        <span class="float-start">{{ $tcategory->name }}</span>
                                        <span class="float-end">{{ $tcategory->description }}</span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.trending-prod-carousel').owlCarousel({
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
