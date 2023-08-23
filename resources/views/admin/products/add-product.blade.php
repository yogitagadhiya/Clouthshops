

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
               <div class="col-md-6 padding_0">
                  <div class="mail_section">
                     
                     <form action="javascript:void(0)" enctype="multipart/form-data" method="post">
                     @csrf  
                     
                     <div class="form-group">
                           <label>category</label>
                           <select wire:model.defer="c_id" name="c_id" id="c_id" required class="form-control">
                           <option value="">--select category--</option>
                           @foreach($categories as $categorie)
                            <option value="{{$categorie->categories_id}}">{{$categorie->categories_name}}</option>
                            @endforeach
                            </select>
                      </div>
                     <div class="email_text">
                        <div class="form-group">
                           <input type="text" class="email-bt" id="pname"  placeholder="Name" name="pname" required>
                           <span class="text-danger">
                              @error('name')
                                 {{$message}}
                              @enderror
                           </span>
                        </div>
                        <div class="form-group">
                           <input type="text" class="email-bt" id="price" placeholder="price" name="price" required>
                           <span class="text-danger">
                              @error('description')
                                 {{$message}}
                              @enderror
                           </span>
                        </div>
                        <tr>
	              <div class="form-group">
                           <input type="file" class="email-bt" id="pimage" placeholder="img" name="pimage" required>
                           <span class="text-danger">
                              @error('email')
                                 {{$message}}
                              @enderror
                           </span>
                        </div>
                        <!--  --><div class="send_btn">
                           <div type="text"  class="main_bt"><button id="submit" name="image" type="submit" >SEND</button></div>
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
               
            </div>
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   <script type="text/javascript">
         $('body').on('click','#submit',function(){

            var postForm = new FormData();
            postForm.append("pid", $('#pid').val());
            postForm.append("c_id", $('#c_id').val());
            postForm.append("pname", $('#pname').val());
            postForm.append("price", $('#price').val());
            postForm.append("pslug", $('#pslug').val());
            postForm.append("pimage", $('#pimage')[0].files[0]);

           // if (title==""){
           //  toastr.error('please enter title');
           //  return false;
           // }

            $.ajax({
                  url: 'save-add-products',
                  method: 'post',
                  headers: {
                       'X-CSRF-TOKEN': $('[name="_token"]').val()
                  },
                  // success
                  // type:'post',
                  data: postForm,
                  processData: false,
                  contentType: false ,
                  cache: false ,
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
                  error: function (response){
                     Swal.fire({
                       title: 'Error!',
                       html:  response.message || 'Opps! somthing went wrong!' ,
                       icon: 'error'
                     })
                  },

               });
          });

   </script>



     
@endsection