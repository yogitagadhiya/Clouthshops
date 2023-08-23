  

 <!-- Extends template page -->
@extends('admin.app')

@section('content')
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <h1 class="contact_text">products</h1>
         </div>
      </div>

     

      @if(session('message'))
         <div class="alert alert-success">{{session('message')}}</div>  
      @endif

      <div class="contact_section_2 layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 padding_0">
                  <div class="mail_section">
                     
                     <form action="{{url('update-products/'.$products->product_id)}}" enctype="multipart/form-data" method="post">
                     @csrf 

                     <div>                 
                     <div class="email_text">
                        <div class="form-group">
                          <label>Name</label>
                           <input type="text" class="email-bt" value="{{$products->product_name}}" placeholder="Name" name="pname">
                           <span class="text-danger">
                             
                           </span>
                        </div>

                        <div class="form-group">
                          <label>Price</label>
                           <input type="text" class="email-bt" value="{{$products->price}}" placeholder="price" name="price">
                           <span class="text-danger">
                              
                           </span>
                        </div>
                      <div class="email_text">
                        <div class="form-group">
                          <label>Slug</label>
                           <input type="text" class="email-bt" value="{{$products->product_slug}}" placeholder="slug" name="pslug">
                           <span class="text-danger">
                             
                           </span>
                        </div>

                        <tr>
	              <div class="form-group">
                           <input type="file" class="email-bt"  placeholder="image" name="pimage">
                           <img src="{{asset($products->product_img)}}" wight="70px" height="70x" alt="pimage">
                        
                           <span class="text-danger">
                              
                           </span>
                  </div>
<div>
</div>


</div>
                        <div class="send_btn">
                           <div type="text"  class="main_bt"><button name="image" type="submit">UPDATE</button></div>
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
               
            </div>
         </div>
      </div>

<script type="text/javascript">
         

function product_delete(product_id)
{ 

      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
      .then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                  
                  url: '{{url('delete-childproduct')}}/'+product_id,
                  method: 'get',
                  headers: {
                       'X-CSRF-TOKEN': $('[name="_token"]').val()
                  },
                  
                  success: function (response){
                     if(response.status == 200){
                        Swal.fire({
                          title: 'Success!',
                          html:  response.message ,
                          icon: 'success'
                        })
                        location.reload();
                     }else{
                        Swal.fire({
                          title: 'Error!',
                          html:  response.message ,
                          icon: 'error'
                        })
                     }
                  },
                });
        }

     });
}



</script>

 
     
@endsection  

