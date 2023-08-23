 @extends('user.app')

@section('content')

@php
  $wish_p = [];
  if(!empty(session('user_data'))) {
    session('user_data')->p_ids;
    $wish_p = session('user_data')->p_ids;
  } 

@endphp

<style type="text/css">
    .mImage{
        height: 200px;
    object-fit: contain;
    margin: 0;
    width: 100%;
    background: #e8e8e8;
    border-radius: 7px;
    }

    .yellow-font{
      color: red;
    }
</style>

<!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2> Our Products</h2>
                        <span>Awesome, clean &amp; creative HTML5 Template</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


   <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">

            <form action="javascript:void(0)" enctype="multipart/form-data" method="post">
                     @csrf 
            

            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
         <div class="container">
            <div class="row">
                @foreach($parent_products as $product)
                <div class="col-md-4 col-sm-12"> 
                    <div class="item">
                        <div class="thumb">
                            <img class="mImage" src="{{asset($product->product_img)}}" alt="">
                        </div>
                        <div class="down-content">
                            <h4>{{$product->product_name}}</h4>
                            <span>{{$product->price}}</span>
                        </div>
                    </div> 
                </div>
                @endforeach
            </div>
        </div>
    </form>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

<script type="text/javascript">

</script>


@endsection