<?php
  use App\Models\Product;
?>
@extends('admin.layouts.app')
@section('title','Banner')
@section('content')
<div id="BannerMainDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">

    <div class="row">
      <div class="col-md-6"><h6 class="m-0 font-weight-bold text-primary float-left">Banners Lists</h6></div>
      <div class="col-md-6"> <button id="addNewBanner" class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add New</button></div>
    </div>

     
      <table id="BannerDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
        	  <th class="th-sm">ID</th>
            <th class="th-sm">Title</th>
        	  <th class="th-sm">Desc</th>
        	  <!-- <th class="th-sm">Total Product</th> -->
            <th class="th-sm">Image</th>
            <th class="th-sm">Status</th>
        	  <th class="th-sm">Edit</th>
        	  <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="BannerTableBody">

        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="loaderBannerDiv" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </div>
</div>
<div id="WrongBannerDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong !</h3>
    </div>
  </div>
</div>

<!-- modal for delete banner -->
<div class="modal fade" id="deleteBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
         <h5 class="modal-title" id="deleteModalBannerId"> </h5>
       	<h5 class="modal-title">Are you sure to delete this Banner!!</h5>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
        <button  id="BannerDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>



<!-- modal for update Banners -->
<div class="modal fade" id="UpdateBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Banner</h5>
        <h5 id="UpdateBannerId" class="d-none"> </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div id="UpdateBannerLoader" class="container">
        <div class="row">
          <div class="col-md-12 text-center p-5">
            <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
          </div>
        </div>
      </div>

      <div id="WrongBannerUpdate" class="container d-none">
        <div class="row">
          <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
          </div>
        </div>
      </div>


      <div class="modal-body d-none text-center" id="updateBannerModalDNone">

       <div class="container">
         	<input id="UpdateBannerNameId" type="text" id="" class="form-control mb-3" placeholder="Banner Name">
      	 	<input id="UpdateBannerDesId" type="text" id="" class="form-control mb-3" placeholder="Banner Description">
     			<input id="UpdateBannerImgId" type="text" id="" class="form-control mb-3" placeholder="Banner Image">
           <select id="updateBannerStatus" class="w-100 mb-3" style="height:36px" name="cat_id">
              <option value="">Select Status</option>
              <option value="1" >Active</option>
              <option value="0" >Inctive</option>
            </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="BannerUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>


<!-- modal for adding Banner -->
<div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Banner</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
            <input id="BannerNameId" type="text" id="" class="form-control mb-3" placeholder="Banner Name">
            <input id="BannerDesId" type="text" id="" class="form-control mb-3" placeholder="Banner Description">
            <!-- <textarea name="BannerDesId" id="BannerDesId" cols="30" class="form-control mb-3" rows="10" placeholder="Banner Description"></textarea> -->
      		 	<input id="BannerImage" type="text" id="" class="form-control mb-3" placeholder="Banner image url">
                <select name="status" id="bannerStatus" class="bannerStatus form-control">
                    <option>Status Select</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="BannerAddConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- modal for updae status -->
<div class="modal fade" id="BannerStatusUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
         <h5 class="modal-title" id="BannerStatusBannerId"> </h5>
       	<h5 class="modal-title">Are you sure to change banner status!!</h5>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
        <button  id="BannerStatusConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
getAllBanner();

function getAllBanner(){
  axios.get('/allbanners').then(function(response){

     if (response.status == 200) {
         $('#BannerMainDiv').removeClass('d-none');
         $('#loaderBannerDiv').addClass('d-none');

         $('#BannerDataTable').DataTable().destroy();
         $('#BannerTableBody').empty();

           var jsonData = response.data;
            $.each(jsonData, function(i, item){
              // var catPro = $('.catUnderProduct').html();
              // console.log(catPro);
                if (jsonData[i].status==1) {
                var status= 'Active';
                var finalStatus = "<a class='bannerStatusBtns btn btn-sm btn-success' data-id=" + jsonData[i].id + ">"+ status +"</a>"
                }else{
                  var status= 'Inactive';
                   var finalStatus = "<a class='bannerStatusBtns btn btn-sm btn-danger' data-id=" + jsonData[i].id + ">"+ status +"</a> "
                }
             $('<tr>').html(
                 "<td>"+jsonData[i].id+"</td>"+
                 "<td>"+jsonData[i].title+"</td>"+
                 "<td>"+jsonData[i].description+"</td>"+
                 // "<td class='catproduct'></td>"+
                  "<td><img class='table-img' src=" + jsonData[i].photo + "></td>"+
                   "<td>"+ finalStatus +"</td>" +
                    // "<td><a class='bannerStatusBtns' data-id='" + jsonData[i].id + "'><i class='fas fa-edit'></i></a></td>" +

                   // "<td><input type='button' value='"+status+"' class='bannerStatusBtns btn btn-sm btn-info' data-id='"+jsonData[i].id+"' ></td>" +


                 "<td><a  class='BannerEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                 // "<td><a  class='BannerDeleteBtn'  data-id=" + jsonData[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
                 "<td><a class='BannerDeleteBtn' data-id='" + jsonData[i].id + "'><i class='fas fa-trash-alt'></i></a></td>"
              ).appendTo('#BannerTableBody');
            });
             // show edit modal
             $('.BannerEditBtn').click(function(){
                $('#UpdateBannerModal').modal('show');
                var id = $(this).data('id');
                $('#UpdateBannerId').html(id);
                updateBannerDetails(id);
            });

            $('.BannerDeleteBtn').click(function(){
                $('#deleteBannerModal').modal('show');
                var id = $(this).data('id');
                $('#deleteModalBannerId').html(id);
            });

            $('.bannerStatusBtns').click(function(){
                $('#BannerStatusUpdate').modal('show');
                var id = $(this).data('id');
                $('#BannerStatusBannerId').html(id);
            });


       $('#BannerDataTable').DataTable({"order":false});
       $('.dataTables_length').addClass('bs-select');

     }else{
       $('#loaderBannerDiv').addClass('d-none');
        $('#WrongUpdate').removeClass('d-none');
     }

  }).catch(function(error){

    $('#loaderBannerDiv').addClass('d-none');
    $('#WrongBannerDiv').removeClass('d-none');
  });
}

// show edit data in update banner form

function updateBannerDetails(id){
  axios.post('/bannersDetails',{
    id:id
  }).then(function(response){
        if(response.status==200 && response.data){
            $('#updateBannerModalDNone').removeClass('d-none');
            $('#UpdateBannerLoader').addClass('d-none');
            var jsonData = response.data;
            $('#UpdateBannerNameId').val(jsonData[0].title);
            $('#UpdateBannerDesId').val(jsonData[0].description);
            $('#UpdateBannerImgId').val(jsonData[0].photo);
            $('#updateBannerStatus').val(jsonData[0].status);
        } else{
          $('#UpdateBannerLoader').addClass('d-none');
          $('#WrongBannerUpdate').removeClass('d-none');
        }
  }).catch(function(error){
    $('#UpdateBannerLoader').addClass('d-none');
    $('#WrongBannerUpdate').removeClass('d-none');
  })
}


// update Banner

$('#BannerUpdateConfirmBtn').click(function(){
  var id = $('#UpdateBannerId').html();
  var name =  $('#UpdateBannerNameId').val();
  var description =  $('#UpdateBannerDesId').val();
  var img =  $('#UpdateBannerImgId').val();
  var status =  $('#updateBannerStatus').val();
   $('#BannerUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/updateBanner',{
    id:id,
    name:name,
    description:description,
    img:img,
    status:status,
  }).then(function(response){
          $('#BannerUpdateConfirmBtn').html("Save");
            if(response.status==200){
              if (response.data == 1) {
                $('#UpdateBannerModal').modal('hide');
                toastr.success('Update Barnd Success');
              getAllBanner();
            } else {
                $('#UpdateBannerModal').modal('hide');
                toastr.error('Update Barnd Fail');
              getAllBanner();
            }
          }
          else{
            $('#UpdateBannerModal').modal('hide');
             toastr.error('Something Went Wrong !');
          }
  }).catch(function(error){
    $('#UpdateBannerModal').modal('hide');
     toastr.error('Something Went Wrong !');
  })
})

// status update
$('#BannerStatusConfirmBtn').click(function(){
  var id = $('#BannerStatusBannerId').html();
  $('#BannerStatusConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/bannersStatus',{
    id:id
  }).then(function(response){
    $('#BannerStatusConfirmBtn').html('Yes');
    if (response.status==200) {
      if (response.data==1) {
        $('#BannerStatusUpdate').modal('hide');
        toastr.success('Banner delete successfully!!');
        getAllBanner();
      } else {
        $('#BannerStatusUpdate').modal('hide');
        toastr.error('Banner delete fail!!');
        getAllBanner();
      }
    } else {
      $('#BannerStatusUpdate').modal('hide');
      toastr.error('Something Went Worng!!');
    }
  }).catch(function(error){
    $('#BannerStatusUpdate').modal('hide');
    toastr.error(error);
  })
})

// delete BannerDeleteBtn

$('#BannerDeleteConfirmBtn').click(function(){
  var id = $('#deleteModalBannerId').html();
  $('#BannerDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/bannersDelete',{
    id:id
  }).then(function(response){
    $('#BannerDeleteConfirmBtn').html('Yes');
    if (response.status==200) {
      if (response.data==1) {
        $('#deleteBannerModal').modal('hide');
        toastr.success('Banner delete successfully!!');
        getAllBanner();
      } else {
        $('#deleteBannerModal').modal('hide');
        toastr.error('Banner delete fail!!');
        getAllBanner();
      }
    } else {
      $('#deleteBannerModal').modal('hide');
      toastr.error('Something Went Worng!!');
    }

  }).catch(function(error){
    $('#deleteBannerModal').modal('hide');
    toastr.error('Something Went Worng!!');
  })
})

// add new Banner
$('#addNewBanner').click(function(){
  $('#addBannerModal').modal('show');
})

$('#BannerAddConfirmBtn').click(function(){
  var bannerName =$('#BannerNameId').val();
  var bannerDes =$('#BannerDesId').val();
  var bannerImg =$('#BannerImage').val();
  var status =$('#bannerStatus').val();
  addBanner(bannerName, bannerDes, bannerImg,status);
})
function addBanner(bannerName, bannerDes, bannerImg,status){
  $('#BannerAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.post('/banners', {
    bannerName: bannerName,
    bannerDes: bannerDes,
    bannerImg: bannerImg,
    status: status,
  }).then(function(response){
      $('#BannerAddConfirmBtn').html("Save");
      if(response.status==200){
              if (response.data == 1) {
                $('#addBannerModal').modal('hide');
                toastr.success('Add Success');
                getAllBanner();
            } else {
                $('#addBannerModal').modal('hide');
                toastr.error('Add Fail');
                getAllBanner();
            }
          }
  }).catch(function(error){
    $('#addBannerModal').modal('hide');
    toastr.error('Something Went Wromg');
  });
}


</script>
@endsection
