@extends('admin.app')

@section('content')

<table id="categories" class="display" style="width:100%">

<div align="right">
<button class="btn btn-success"><i class="bi bi-plus-square"></i><a href="{{url('add-categories/')}}">ADD</a></button>
</div>

        <thead align="center">
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>slug</th> 
                <th>img</th>
                <th>action</th>
            </tr>
        </thead>


  </table>

  <script type="text/javascript">
 
 $(document).ready(function () {
    $('#categories').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('show.categories')}}",
    });
}); 

function js_delete(categories_id)
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
                  
                  url: '{{url('delete-categories')}}/'+categories_id,
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
   