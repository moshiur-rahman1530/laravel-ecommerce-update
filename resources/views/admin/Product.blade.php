@extends('admin.layouts.app')
@section('title','Category')
@section('content')
<div id="ProductMainDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">

    <div class="row">
      <div class="col-md-6"><h6 class="m-0 font-weight-bold text-primary float-left">Product Lists</h6></div>
      <div class="col-md-6"> <button id="addNewProduct" class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add New</button></div>
    </div>

      <div class="table-responsive" style="overflow-x:auto;">
        <table id="ProductDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
          	  <th class="th-sm" width="2%">ID</th>
              <th class="th-sm">Name</th>
          	  <th class="th-sm">Desc</th>
              <th class="th-sm">Category</th>
              <th class="th-sm">Sub Cat</th>
              <th class="th-sm">Brand</th>
              <!-- <th class="th-sm">Size</th> -->
              <!-- <th class="th-sm">Color</th> -->
              <th class="th-sm">Unit</th>
              <!-- <th class="th-sm">Price</th>
              <th class="th-sm">Discount</th> -->
              <!-- <th class="th-sm">Quantity</th> -->
          	  <th class="th-sm">Image</th>
          	  <th class="th-sm">Status</th>
          	  <th class="th-sm">Add Attributes</th>
          	  <th class="th-sm">Edit</th>
          	  <th class="th-sm">Delete</th>
            </tr>
          </thead>
          <tbody id="ProductTableBody">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div id="loaderProductDiv" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </div>
</div>
<div id="WrongProductDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong !</h3>
    </div>
  </div>
</div>

<!-- modal for delete course -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
         <h5 class="modal-title" id="deleteModalProductId"> </h5>
       	<h5 class="modal-title">Are you sure to delete this product!!</h5>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
        <button  id="ProductDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- modal for add product attribute -->
<div class="modal fade" id="AttrProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
         <!-- <h5 class="modal-title" id="AttrProductModalId"> </h5> -->
       	<h5 class="modal-title">Add Product Attribute</h5>

         <div class="form-group">
              <form name="add_attr" id="add_attr">
              <!-- <h5 class="modal-title" id="AttrProductModalId"> </h5> -->
              <input type="hidden" name="AttrProductModalId" id="AttrProductModalId">
                <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
                </div>

                <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td width="13%">
                              <!-- color -->
                              <select id="ColorAttrSelect" class="w-100 form-control" name="color[]">
                                <option selected>Color</option>
                                @foreach($color as $col)
                                <option value="{{ $col->id }}" >{{$col->name}}</option>
                                @endforeach
                              </select>
                              <!-- colorend -->
                            </td>
                            <td width="13%">
                              <!-- size -->
                              <select id="SizeAttrSelect" class="form-control w-100" name="size[]">
                                <option selected>Size</option>
                                @foreach($sizes as $size)
                                <option value="{{ $size->id }}" >{{$size->name}}</option>
                                @endforeach
                              </select>
                              <!-- sizeend -->
                            </td>

                            <td width="13%"><input type="text" id="AttrQuantity" name="quantity[]" placeholder="Product Quantity" class="form-control name_list" /></td>

                            <td width="13%"><input type="text" id="AttrPrice" name="price[]" placeholder="Product Price" class="form-control name_list" /></td>

                            <td width="13%"><input type="text" id="AttrDiscount" name="discount[]" placeholder="Discount Price" class="form-control name_list" /></td>
                              <td width="12%">
                                <select id="AttributeStatus" class="w-100 mb-3" style="height:36px" name="attrStatus[]">
                                  <option value="">Select Status</option>
                                  <option value="1" >Active</option>
                                  <option value="0" >Inctive</option>
                                </select>
                              </td>
                            <!-- <td><input type="text" name="name[]" placeholder="Enter Color Value" class="form-control name_list" /></td> -->
                            <td width="10%"><button type="button" name="add" id="add" class="btn btn-sm btn-success">Add More</button></td>
                        </tr>
                    </table>
                    <!-- <input type="button" name="submit" id="attrsubmit" class="btn btn-sm btn-info" value="Submit" />
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button> -->
                </div>

             </form>
            </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="AttrProductModalSave" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>



<!-- modal for update course -->
<div class="modal fade" id="UpdateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Course</h5>
        <h5 id="UpdateCourseId"> </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div id="UpdateLoader" class="container">
        <div class="row">
          <div class="col-md-12 text-center p-5">
            <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
          </div>
        </div>
      </div>

      <div id="WrongUpdate" class="container d-none">
        <div class="row">
          <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
          </div>
        </div>
      </div>


      <div class="modal-body d-none text-center" id="updateModalDNone">

       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="UpdateCourseNameId" type="text" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="UpdateCourseDesId" type="text" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="UpdateCourseFeeId" type="text" class="form-control mb-3" placeholder="Course Fee">
     			<input id="UpdateCourseEnrollId" type="text" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="UpdateCourseClassId" type="text" class="form-control mb-3" placeholder="Total Class">
     			<input id="UpdateCourseLinkId" type="text" class="form-control mb-3" placeholder="Course Link">
     			<input id="UpdateCourseImgId" type="text" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>


<!-- modal for adding product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-center">Add New Product</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
       <div class="container">
         <div class="row">
           <div class="col-md-6 col-12">

             <input id="ProductNameId" type="text" class="form-control mb-3" placeholder="Product Name">
             <!-- <input id="ProductDesId" type="text" class="form-control mb-3" placeholder="Product Description"> -->
             <textarea id="ProductDesId" rows="5" class="form-control mb-3" placeholder="Product Description"></textarea>
             <!-- <input id="ProductPriceId" type="number" class="form-control mb-3" placeholder="Product Price">
              <input id="ProductDiscountId" type="number" class="form-control mb-3" placeholder="Product Discount Price"> -->

             <select id="ProductCatSelect" class="w-100 mb-3" style="height:36px" name="Category">
               <option value="">Select Category</option>
               @foreach($cat as $cat)
               <option value="{{ $cat->id }}" >{{$cat->cat_name}}</option>
               @endforeach
             </select>

             <select id="ProductSubCatSelect" class="w-100 mb-3" style="height:36px" name="subcat">
               <option value="">Select Sub Category</option>
               @foreach($subcat as $catsub)
               <option value="{{ $catsub->id }}" >{{$catsub->name}}</option>
               @endforeach
             </select>

              

           </div>
           <div class="col-md-6 col-12">
             <!-- brand -->
             <select id="ProductBrandSelect" class="w-100 mb-3" style="height:36px" name="brand">
               <option value="">Select Brand</option>
               @foreach($brand as $bran)
               <option value="{{ $cat->id }}" >{{$bran->name}}</option>
               @endforeach
             </select>
             <!-- brandend -->

             <!-- color -->
             <!-- <select id="ProductColorSelect" size="4" class="w-100 mb-3" multiple="multiple" name="color[]">
               <option selected>Select Color</option>
               @foreach($color as $col)
               <option value="{{ $col->id }}" >{{$col->name}}</option>
               @endforeach
             </select> -->
             <!-- colorend -->
             <!-- size -->
             <!-- <select id="ProductSize" class="w-100 mb-3" size="4" name="size[]" multiple="multiple">
               <option selected>Select Size</option>
               @foreach($sizes as $siz)

                 <option value="{{ $siz->id }}" >{{$siz->name}}</option>

               @endforeach

             </select> -->
             <!-- sizeend -->

             <!-- unit -->
             <select id="ProductUnitSelect" class="w-100 mb-3" style="height:36px" name="unit">
               <option value="">Select Unit</option>
               @foreach($unit as $ut)
               <option value="{{ $ut->id }}" >{{$ut->name}}</option>
               @endforeach
             </select>
             <!-- unitend -->

             <!-- <input id="ProductQtnId" type="number" class="form-control mb-3" placeholder="Product Quantity"> -->

            
             <!-- select status -->
             <select name="status" id="status" class="status form-control">
              <option value="0">Inactive</option>
              <option value="1">Active</option>
             </select>

              <!-- <div class="">
                <label for="is_featured">Is Featured</label><br>
                <input type="checkbox" class="form-control" name='is_featured' id='is_featured' value='1' checked> Yes                        
              </div> -->

              <div class="my-2 text-start-important">
                <input class="form-check-input form-control" name='is_featured' type="checkbox" value="1" id="is_featured" checked>
                <label class="form-check-label" for="is_featured">
                Is Featured
                </label>
              </div>

              <!-- condition -->
              <select name="condition" id="condition" class="condition form-control">
              <option value="">--Select Condition--</option>
              <option value="default">Default</option>
              <option value="new">New</option>
              <option value="hot">Hot</option>
             </select>

            <input id="ProductImage" type="text" class="form-control my-3" placeholder="Product image url">


            <!-- select image from image gallery -->
            <button onclick="filemanager.bulkSelectFile('myBulkSelectCallback')">Choose Images</button>

           </div>
          </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button  id="ProductAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')
<script type="text/javascript">

// multiple image pick using haruncpi filemanger

var imgArray=[];
window.myBulkSelectCallback = function (data) {
  // the JSON data will come here
  // console.log(data);
  data.map(d=>imgArray.push(d.absolute_url))
};
console.log(imgArray);



// delete productDeleteBtn


// add new product
$('#addNewProduct').click(function(){
  $('#addProductModal').modal('show');
})


$('#ProductAddConfirmBtn').click(function(){
  var pName = $('#ProductNameId').val();
  var pDes = $('#ProductDesId').val();
  // var pPrice = $('#ProductPriceId').val();
  // var pdiscount = $('#ProductDiscountId').val();
  var pCat = $('#ProductCatSelect').val();
  var pSubCat = $('#ProductSubCatSelect').val();
  var pBrand = $('#ProductBrandSelect').val();
  // var pColor = $('#ProductColorSelect').val();
  // var pSize = $('#ProductSize').val();
  var pUnit = $('#ProductUnitSelect').val();
  // var pQtn = $('#ProductQtnId').val();
  // var pImg = $('#ProductImage').val();
  var pImg = imgArray;
  var feature = $('#is_featured').val();
  var condition = $('#condition').val();
  var status = $('#status').val();
  // console.log(pName,pDes,pPrice,pdiscount,pCat,pSubCat,pBrand,pColor,pSize,pUnit,pQtn,pImg,feature,condition,status);
  addProduct(pName,pDes,pCat,pSubCat,pBrand,pUnit,pImg,feature,condition,status);
  // addProduct(pName,pDes,pPrice,pdiscount,pCat,pSubCat,pBrand,pColor,pSize,pUnit,pQtn,pImg,feature,condition,status);
})


// function addProduct(pName,pDes,pPrice,pdiscount,pCat,pSubCat,pBrand,pColor,pSize,pUnit,pQtn,pImg,feature,condition,status) {
function addProduct(pName,pDes,pCat,pSubCat,pBrand,pUnit,pImg,feature,condition,status) {
  $('#ProductAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  axios.post('/products',{
    name:pName,
    des:pDes,
    // price:pPrice,
    // discount:pdiscount,
    cat:pCat,
    subcat:pSubCat,
    brand:pBrand,
    // color:pColor,
    // size:pSize,
    unit:pUnit,
    // qtn:pQtn,
    img:pImg,
    feature:feature,
    condition:condition,
    status:status,
  }).then(function(response){
    $('#ProductAddConfirmBtn').html("Save");
    if (response.status==200) {
        if (response.data==1) {
          $('#addProductModal').modal('hide');
          toastr.success('Product Add successfully!!');
          getAllProducts();
        }else{
          $('#addProductModal').modal('hide');
          toastr.error('Product Add Fail!!');
          getAllProducts();
        }
    } else {
      $('#addProductModal').modal('hide');
      toastr.error('Product Add Fail!!');
    }
  }).catch(function(error){
    $('#addProductModal').modal('hide');
    toastr.error('Something Went Wrong!!');
  })
}
getAllProducts();

function getAllProducts(){
  axios.get('/allproducts').then(function(response){

    if (response.status==200) {
        $('#ProductMainDiv').removeClass('d-none');
        $('#loaderProductDiv').addClass('d-none');

        $('#ProductDataTable').DataTable().destroy();
        $('#ProductTableBody').empty();

        var data = response.data;

        $.each(data, function(i, item){
            if (data[i].status==1) {
                var status= 'Active';
                var finalStatus = "<a class='catStatusBtns btn btn-sm btn-success' data-id=" + data[i].id + ">"+ status +"</a>"
            }else{
                  var status= 'Inactive';
                   var finalStatus = "<a class='catStatusBtns btn btn-sm btn-danger' data-id=" + data[i].id + ">"+ status +"</a>"
            }

            // console.log(JSON.parse(data[i].product_img));
            let jsonImageArray = JSON.parse(data[i].product_img);
            console.log(jsonImageArray[0]);
            // jsonImageArray.map(img=>{
            //   console.log(img);
            // })

          $('<tr>').html(
            "<td>"+data[i].id+"</td>"+
            "<td>"+data[i].product_name+"</td>"+
            "<td>"+data[i].product_des.substr(0,30)+"....</td>"+
            "<td>"+data[i].product_cat+"</td>"+
            "<td>"+data[i].subcat_id+"</td>"+
            "<td>"+data[i].brand_id+"</td>"+
            // "<td>"+data[i].size_id+"</td>"+

            // $.each(data[i].color_id, function(key, value) {
            //   +"<td>"+value+"</td>"+
            // })



            // "<td>"+data[i].color_id+"</td>"+
            "<td>"+data[i].unit_id+"</td>"+
            // "<td>"+data[i].product_price+"</td>"+
            // "<td>"+data[i].discount+"</td>"+
            // "<td>"+data[i].product_quantity+"</td>"+
            // "<td><img class='table-img' src=" + data[i].product_img + "></td>"+
            "<td><img class='table-img' src=" + jsonImageArray[0] + "></td>"+

            "<td>"+finalStatus+"</td>" +


            "<td><a style='font-size:11px' class='PeroductAddAttrBtn btn btn-sm btn-primary px-1 m-0' data-id=" + data[i].id + ">Add-Attr <i class='fas fa-plus-circle'></i></a></td>" +
            
            // "<td><a class='PeroductAddAttrBtn' data-id=" + data[i].id + "><i style='font-size:24px' class='fas fa-plus-circle fa-xl'></i></a></td>" +
            "<td><a  class='PeroductEditBtn' data-id=" + data[i].id + "><i class='fas fa-edit'></i></a></td>" +
            "<td><a  class='PeroductDeleteBtn'  data-id=" + data[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#ProductTableBody');
        });

        // add attribute modal show
        $('.PeroductAddAttrBtn').click(function(){

          var id = $(this).data('id');
          $('#AttrProductModalId').val(id);
          $('#AttrProductModal').modal('show');
        })


        $('#ProductDataTable').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

    } else {
      $('#loaderProductDiv').addClass('d-none');
      $('#WrongProductDiv').removeClass('d-none');
    }
  }).catch(function(error){
    $('#loaderProductDiv').addClass('d-none');
    $('#WrongProductDiv').removeClass('d-none');
  })
}



$(document).ready(function(){
      var postURL = "<?php echo url('/productattr'); ?>";
      var i=1;

      $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select id="ColorAttrSelect" class="w-100 form-control" name="color[]"><option selected>Color</option>@foreach($color as $col)<option value="{{ $col->id }}" >{{$col->name}}</option>@endforeach</select></td><td><select id="SizeAttrSelect" class="w-100 form-control" name="size[]"><option selected>Size</option>@foreach($sizes as $size)<option value="{{ $size->id }}" >{{$size->name}}</option>@endforeach</select></td><td><input type="text" id="AttrQuantity" name="quantity[]" placeholder="Product Quantity" class="form-control name_list" /></td><td><input type="text" id="AttrPrice" name="price[]" placeholder="Product Price" class="form-control name_list" /></td><td><input type="text" id="AttrDiscount" name="discount[]" placeholder="Discount Price" class="form-control name_list" /></td> <td><select id="AttributeStatus" class="form-control w-100" name="attrStatus[]"><option value="">Select Status</option><option value="1" >Active</option><option value="0" >Inctive</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-sm btn-danger btn_remove">X</button></td></tr>');
      });

      $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id");
          $('#row'+button_id+'').remove();
      });


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#AttrProductModalSave').click(function(){
         $.ajax({
              url:postURL,
              method:"POST",
              data:$('#add_attr').serialize(),
              type:'json',
              success:function(data)
              {
                  if(data.error){
                      printErrorMsg(data.error);
                    $('#AttrProductModal').modal('hide');
                      toastr.error('Something Went Wromg');
                  }else{
                    if(data.success=='Already Have Data'){
                      toastr.warning('Already Have Data');
                    }
                     else{
                      i=1;
                      $('.dynamic-added').remove();
                      $('#add_attr')[0].reset();
                        $('#AttrProductModal').modal('hide');
                      toastr.success('Add Success');
                     }
                  }
              }

         });


    });


  });



</script>
@endsection
