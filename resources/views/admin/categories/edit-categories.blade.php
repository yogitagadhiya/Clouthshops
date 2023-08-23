

 <!-- Extends template page -->
@extends('admin.app')

@section('content')
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <h1 class="contact_text">Categories</h1>
         </div>
      </div>

     

      @if(session('message'))
         <div class="alert alert-success">{{session('message')}}</div>  
      @endif

      <div class="contact_section_2 layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 padding_0">
                  <div class="mail_section">
                     
                     <form action="{{url('update-categories/'.$categories->categories_id)}}" enctype="multipart/form-data" method="post">
                     @csrf  
                     
                     <div class="email_text">
                        <div class="form-group">
                           <input type="text" class="email-bt" value="{{$categories->categories_name}}" placeholder="Name" name="name">
                           <span class="text-danger">
                             
                           </span>
                        </div>

                        <div class="email_text">
                        <div class="form-group">
                           <input type="text" class="email-bt" value="{{$categories->categories_slug}}" placeholder="slug" name="slug">
                           <span class="text-danger">
                             
                           </span>
                        </div>

                        <tr>
	              <div class="form-group">
                           <input type="file" class="email-bt"  placeholder="image" name="image">
                           <img src="{{asset($categories->categories_img)}}" wight="70px" height="70x" alt="image">
                           <button onclick="img_delete('{{$categories->categories_id}}')" class="btn btn-danger" type="button"><i class="bi bi-x-circle-fill"></i> </button>
                        
                           <span class="text-danger">
                              
                           </span>
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
         
function img_delete(categories_id)
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
                  
                  url: '{{url('delete-image')}}/'+categories_id,
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