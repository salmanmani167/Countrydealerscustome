$(document).ready(function () {
    // validate the comment form when it is submitted
    $(".form-validate").validate({
      // set the errorClass as a random string to prevent label disappearing when valid
      errorClass : "text-danger",
    });

    $('#profile_img').change(function(){
      const file = this.files[0];
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          $('#previewImageIcon').attr('src', event.target.result);
          $('#previewImageIcon').show();
        temp_image = event.target.result;
        $('.temp_img').val(temp_image);
        }
        reader.readAsDataURL(file);
      }
    });
});

(function($) {
  'use strict';

  if ($(".js-example-basic-single").length) {
    $(".js-example-basic-single").select2();
  }
  if ($(".js-example-basic-multiple").length) {
    $(".js-example-basic-multiple").select2();
  }
})(jQuery);


// Role  Chekbox For All //

$('.selectall').click(function() {
  if ($(this).is(':checked')) {
      $('input:checkbox').prop('checked', true);
  } else {
      $('input:checkbox').prop('checked', false);
  }
});

$("input[type='checkbox'].justone").change(function(){
  var a = $("input[type='checkbox'].justone");
  if(a.length == a.filter(":checked").length){
      $('.selectall').prop('checked', true);
  }
  else {
      $('.selectall').prop('checked', false);
  }
});

// Role Chekbox For Specif Block//

 function checkChild(parentId)
 {
  var isParentChecked =  $(".parent_"+parentId).is(':checked');
  if(isParentChecked==true)
  {
    $(".child_"+parentId).prop('checked', true);
  }
  else
  {
    $(".child_"+parentId).prop('checked', false);
  }
 }

 function checkParent(parentId){
  var chhild = $(".child_"+parentId);
  if(chhild.length == chhild.filter(":checked").length){
    $(".parent_"+parentId).prop("checked",true)
  }
  else{
    $(".parent_"+parentId).prop("checked",false)

  }
}


$('.delete_form').on('click',function(e) {
  var form = this;
    swal({
    title: "Are you sure?",
    text: "All data related to this AMC ID will be parmanently deleted",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, DELETE it!",
    cancelButtonText: "No, cancel please!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
    function(isConfirm){
      if (isConfirm) {
        form.submit();
        } else {
          swal.close()

      }
    });
  });


  // Confromation Model For All//
  function editGeneral(el)
  {
    Swal.fire({
      text: "Are you sure to select all ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#1F3BB3',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!',
      cancelButtonText: 'No'
   }).then((result) => {
      if(result.isConfirmed) {
        if ($(this).is(':checked'))
            $('input:checkbox').prop('checked', true);
      }else{
        $('input:checkbox').prop('checked', false);
          Swal.fire({
              timer: 10,
              showCancelButton: false,
              showConfirmButton: false,
          }).then((hasil) => {
          });
      }
  });
  }


// Model For checkbox for minmum one role //

  $('#submit_form').on('click',function(e) {
    e.preventDefault();
    var totalCheckboxes = $('input:checkbox:checked').length;
    console.log(totalCheckboxes);
    if(totalCheckboxes == 2 )
    {
      swal({
        title: "Pleas selcet",
        text: "Make sure you have select at least one checkbox",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok",
        closeOnConfirm: false,
      });
    }
    else{
      $( "#roles_from" ).submit();
    }


    });
