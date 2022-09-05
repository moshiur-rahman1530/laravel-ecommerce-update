@extends('admin.layouts.app')
@section('title','Sub Category')
@section('content')
<div id="SubCatMainDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">

      <div class="row">
        <div class="col-md-6"><h6 class="m-0 font-weight-bold text-primary float-left">Sub Category Lists</h6></div>
        <div class="col-md-6"> <button id="addNewSubCat" class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add New</button></div>
      </div>


      <table id="SubCatDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
        	  <th class="th-sm">ID</th>
            <th class="th-sm">Name</th>
        	  <th class="th-sm">Desc</th>
        	  <th class="th-sm">Image</th>
            <th class="th-sm">Status</th>
        	  <th class="th-sm">Edit</th>
        	  <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="SubCatTableBody">

        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="loaderSubCatDiv" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </div>
</div>
<div id="WrongSubCatDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong !</h3>
    </div>
  </div>
</div>

<!-- modal for delete course -->
<div class="modal fade" id="deleteSubCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
         <h5 class="modal-title" id="deleteModalSubCatId"> </h5>
       	<h5 class="modal-title">Are you sure to delete this category!!</h5>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
        <button  id="SubCatDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- modal for adding sub category -->
<div class="modal fade" id="addSubCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Sub Category</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
            <input id="SubCatNameId" type="text" id="" class="form-control mb-3" placeholder="Sub Cat Name">
            <input id="SubCatDesId" type="text" id="" class="form-control mb-3" placeholder="Sub Cat Description">
      		 	<input id="SubCatImage" type="text" id="" class="form-control mb-3" placeholder="Sub Cat image url">
            <select id="SubCatCatSelect" class="w-100 mb-3" style="height:36px" name="cat_id">
              <option value="">Select Category</option>
              @foreach($category as $cat)
              <option value="{{ $cat->id }}" >{{$cat->cat_name}}</option>
              @endforeach
            </select>

            <select id="subcatStatus" class="w-100 mb-3" style="height:36px" name="cat_id">
              <option value="">Select Status</option>
              <option value="1" >Active</option>
              <option value="0" >Inctive</option>
            </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="SubCatAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- modal for updae status -->
<div class="modal fade" id="CatStatusUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
         <h5 class="modal-title" id="CatStatusSubCatId"> </h5>
       	<h5 class="modal-title">Are you sure to delete this category!!</h5>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
        <button  id="CatStatusConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>



<!-- modal for update course -->
<div class="modal fade" id="UpdateSubCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Course</h5>
        <h5 id="UpdateSubCatId" class="d-none"> </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div id="UpdateSubCatLoader" class="container">
        <div class="row">
          <div class="col-md-12 text-center p-5">
            <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
          </div>
        </div>
      </div>

      <div id="WrongSubCatUpdate" class="container d-none">
        <div class="row">
          <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
          </div>
        </div>
      </div>


      <div class="modal-body d-none text-center" id="updateModalDNone">

       <div class="container">
         	<input id="UpdateSubCatNameId" type="text" id="" class="form-control mb-3" placeholder="SubCat Name">
      	 	<input id="UpdateSubCatDesId" type="text" id="" class="form-control mb-3" placeholder="SubCat Description">

          <select id="UpdateSubCatCatSelect" class="w-100 mb-3" style="height:36px" name="cat_id">
            <option value="">Select Category</option>
            @foreach($category as $cat)
            <option value="{{ $cat->id }}" >{{$cat->cat_name}}</option>
            @endforeach
          </select>

            <select id="updateSubcatStatus" class="w-100 mb-3" style="height:36px" name="cat_id">
              <option value="">Select Status</option>
              <option value="1" >Active</option>
              <option value="0" >Inctive</option>
            </select>

     			<input id="UpdateSubCatImgId" type="text" id="" class="form-control mb-3" placeholder="SubCat Image">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="SubCatUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
getAllSubCat();

function getAllSubCat(){
  axios.get('/allsubcategory').then(function(response){

     if (response.status == 200) {
         $('#SubCatMainDiv').removeClass('d-none');
         $('#loaderSubCatDiv').addClass('d-none');

         $('#SubCatDataTable').DataTable().destroy();
         $('#SubCatTableBody').empty();

           var jsonData = response.data;
            $.each(jsonData, function(i, item){
                if (jsonData[i].status==1) {
                var status= 'Active';
                var finalStatus = "<a class='catStatusBtns btn btn-sm btn-success' data-id=" + jsonData[i].id + ">"+ status +"</a>"
                }else{
                  var status= 'Inactive';
                   var finalStatus = "<a class='catStatusBtns btn btn-sm btn-danger' data-id=" + jsonData[i].id + ">"+ status +"</a> "
                }
             $('<tr>').html(
                 "<td>"+jsonData[i].id+"</td>"+
                 "<td>"+jsonData[i].name+"</td>"+
                 "<td>"+jsonData[i].description+"</td>"+
                  "<td><img class='table-img' src=" + jsonData[i].img + "></td>"+
                   "<td>"+ finalStatus +"</td>" +
                    // "<td><a class='catStatusBtns' data-id='" + jsonData[i].id + "'><i class='fas fa-edit'></i></a></td>" +

                   // "<td><input type='button' value='"+status+"' class='catStatusBtns btn btn-sm btn-info' data-id='"+jsonData[i].id+"' ></td>" +


                 "<td><a  class='subcategoryEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                 // "<td><a  class='categoryDeleteBtn'  data-id=" + jsonData[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
                 "<td><a class='subcategoryDeleteBtn' data-id='" + jsonData[i].id + "'><i class='fas fa-trash-alt'></i></a></td>"
              ).appendTo('#SubCatTableBody');
            });
              // show edit modal
            $('.subcategoryEditBtn').click(function(){
                $('#UpdateSubCatModal').modal('show');
                var id = $(this).data('id');
                $('#UpdateSubCatId').html(id);
                updateSubCatDetails(id);
            });

              // show delete modal
            $('.subcategoryDeleteBtn').click(function(){
                $('#deleteSubCatModal').modal('show');
                var id = $(this).data('id');
                $('#deleteModalSubCatId').html(id);
            });

            // show edit update status modal
            // $('.catStatusBtns').click(function(){
            //     $('#CatStatusUpdate').modal('show');
            //     var id = $(this).data('id');
            //     $('#CatStatusSubCatId').html(id);
            // });
            $('.catStatusBtns').click(function(){
                // $('#CatStatusUpdate').modal('show');
                var id = $(this).data('id');
                // $('#CatStatusSubCatId').html(id);
                cnangeSubCatStatus(id);
            });


       $('#SubCatDataTable').DataTable({"order":false});
       $('.dataTables_length').addClass('bs-select');

     }else{
       $('#loaderSubCatDiv').addClass('d-none');
        $('#WrongUpdate').removeClass('d-none');
     }

  }).catch(function(error){

    $('#loaderSubCatDiv').addClass('d-none');
    $('#WrongSubCatDiv').removeClass('d-none');
  });
}

// detais show in update exampleModalLabel
function updateSubCatDetails(id){
  axios.post('/subCatDetails',{
    id:id
  }).then(function(response){
        if(response.status==200 && response.data){
            $('#updateModalDNone').removeClass('d-none');
            $('#UpdateSubCatLoader').addClass('d-none');
            var jsonData = response.data;
            $('#UpdateSubCatNameId').val(jsonData[0].name);
            $('#UpdateSubCatDesId').val(jsonData[0].description);
            $('#UpdateSubCatCatSelect').val(jsonData[0].cat_id);
            $('#updateSubcatStatus').val(jsonData[0].status);
            $('#UpdateSubCatImgId').val(jsonData[0].img);
        } else{
          $('#UpdateSubCatLoader').addClass('d-none');
          $('#WrongSubCatUpdate').removeClass('d-none');
        }
  }).catch(function(error){
    $('#UpdateSubCatLoader').addClass('d-none');
    $('#WrongSubCatUpdate').removeClass('d-none');
  })
}

// update SubCat

$('#SubCatUpdateConfirmBtn').click(function(){
  var id = $('#UpdateSubCatId').html();
  var name =  $('#UpdateSubCatNameId').val();
  var description =  $('#UpdateSubCatDesId').val();
  var cat =  $('#UpdateSubCatCatSelect').val();
  var img =  $('#UpdateSubCatImgId').val();
  var status =  $('#updateSubcatStatus').val();
   $('#SubCatUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/updateSubCat',{
    id:id,
    name:name,
    description:description,
    catId:cat,
    img:img,
    status:status
  }).then(function(response){
          $('#SubCatUpdateConfirmBtn').html("Save");
            if(response.status==200){
              if (response.data == 1) {
                $('#UpdateSubCatModal').modal('hide');
                toastr.success('Update Sub Category Success');
              getAllSubCat();
            } else {
                $('#UpdateSubCatModal').modal('hide');
                toastr.error('Update Sub Category Fail');
              getAllSubCat();
            }
          }
          else{
            $('#UpdateSubCatModal').modal('hide');
             toastr.error('Something Went Wrong !');
          }
  }).catch(function(error){
    $('#UpdateSubCatModal').modal('hide');
     toastr.error('Something Went Wrong !');
  })
})

// status update
function cnangeSubCatStatus(id){
  axios.post('/subcategoryStatus',{
    id:id
  }).then(function(response){
    if (response.status==200) {
      if (response.data==1) {
        toastr.success('SubCat Status Change!!');
        getAllSubCat();
      } else {
        toastr.error('SubCat Status Change fail!!');
        getAllSubCat();
      }
    } else {
      toastr.error('Something Went Worng!!');
    }
  }).catch(function(error){
    toastr.error(error);
  })
}

$('#CatStatusConfirmBtn').click(function(){
  var id = $('#CatStatusSubCatId').html();
  $('#CatStatusConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/subcategoryStatus',{
    id:id
  }).then(function(response){
    $('#CatStatusConfirmBtn').html('Yes');
    if (response.status==200) {
      if (response.data==1) {
        $('#CatStatusUpdate').modal('hide');
        toastr.success('SubCat delete successfully!!');
        getAllSubCat();
      } else {
        $('#CatStatusUpdate').modal('hide');
        toastr.error('SubCat delete fail!!');
        getAllSubCat();
      }
    } else {
      $('#CatStatusUpdate').modal('hide');
      toastr.error('Something Went Worng!!');
    }
  }).catch(function(error){
    $('#CatStatusUpdate').modal('hide');
    toastr.error(error);
  })
})

// delete categoryDeleteBtn

$('#SubCatDeleteConfirmBtn').click(function(){
  var id = $('#deleteModalSubCatId').html();
  $('#SubCatDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/subcategoryDelete',{
    id:id
  }).then(function(response){
    $('#SubCatDeleteConfirmBtn').html('Yes');
    if (response.status==200) {
      if (response.data==1) {
        $('#deleteSubCatModal').modal('hide');
        toastr.success('SubCat delete successfully!!');
        getAllSubCat();
      } else {
        $('#deleteSubCatModal').modal('hide');
        toastr.error('SubCat delete fail!!');
        getAllSubCat();
      }
    } else {
      $('#deleteSubCatModal').modal('hide');
      toastr.error('Something Went Worng!!');
    }

  }).catch(function(error){
    $('#deleteSubCatModal').modal('hide');
    toastr.error('Something Went Worng!!');
  })
})

// add new category
$('#addNewSubCat').click(function(){
  $('#addSubCatModal').modal('show');
})

$('#SubCatAddConfirmBtn').click(function(){
  var SubCatName =$('#SubCatNameId').val();
  var SubCatDes =$('#SubCatDesId').val();
  var SubCatImg =$('#SubCatImage').val();
  var SubCatCatID =$('#SubCatCatSelect').val();
  var status =$('#subcatStatus').val();
  addSubCat(SubCatName, SubCatDes, SubCatCatID, SubCatImg,status);
})
function addSubCat(SubCatName, SubCatDes, SubCatCatID, SubCatImg,status){
  $('#SubCatAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/subcategory', {
    name: SubCatName,
    description: SubCatDes,
    cat_id: SubCatCatID,
    img: SubCatImg,
    status: status,
  }).then(function(response){
      $('#SubCatAddConfirmBtn').html("Save");
      if(response.status==200){
              if (response.data == 1) {
                $('#addSubCatModal').modal('hide');
                toastr.success('Add Success');
                getAllSubCat();
            } else {
                $('#addSubCatModal').modal('hide');
                toastr.error('Add Fail');
                getAllSubCat();
            }
          }
  }).catch(function(error){
    $('#addSubCatModal').modal('hide');
    toastr.error('Something Went Wromg');
  });
}


</script>
@endsection
