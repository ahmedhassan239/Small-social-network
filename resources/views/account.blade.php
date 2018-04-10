@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
<form action="{{ route('ajaxImageUpload') }}" id='form' enctype="multipart/form-data" method="POST">
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label>Alt Title:</label>
      <input type="text" name="title" class="form-control" placeholder="Add Title">
    </div>


    <div class="form-group">
      <label>Image:</label>
      <input type="file" name="image" class="form-control">
    </div>


    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">Upload Image</button>
    </div>


  </form>
@endsection
@section('footer')
<script type="text/javascript">
  $("#form").on("submit",function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var res = "Image Upload Successfully" ;
    console.log(formData);
    var action = $(this).attr('action');
    $.ajax({
      url: action,
      type: 'POST',
      data: formData,
      processData: false,
        contentType: false,
      success: function(res){
        // console.log(res);
        alert('Image Upload Successfully');
      }
    });
  });

  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script>
@endsection