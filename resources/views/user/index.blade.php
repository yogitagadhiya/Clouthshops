 @extends('user.app')

@section('content')


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

<div align="right">
  <form action="{{url('/')}}" method="get">
  <label>
    Search:
    <input type="search" name="search" placeholder="" aria-controls="categories">
  </label>
</form>                    
</div>
    <section class="section" id="men">
        <div class="container">
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

            <form action="javascript:void(0)" enctype="multipart/form-data" method="post">
                     @csrf 
            

            <div class="row">
                @foreach($products as $product)
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
        </form>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->


   <script type="text/javascript">

   </script>


@endsection
 