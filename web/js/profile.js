function addRowRegion(event){
    const tbody = document.getElementById('t_region');
    let row = document.createElement("tr");
    row.setAttribute('id', 'row_region_'+ event.params.data.id);
    let td1 = document.createElement("td");
    td1.appendChild(document.createTextNode(event.params.data.element.text));
    let td2 = document.createElement("td");
    let num = document.createElement('input');
    num.setAttribute('type', 'number');
    num.setAttribute('min', '1');
    num.setAttribute('value', '10');
    num.classList.add('w-100');
    td2.appendChild (num);
    row.appendChild(td1);
    row.appendChild(td2);
    tbody.appendChild(row);
}

function deleteRowRegion(event){
    let row = document.querySelector('#row_region_'+ event.params.data.id);
    if(row != null)
    row.remove();

}

// 'id' => 'profile-update-form'

 $(document).ready(function() {

     $('#profile-update-form').on('beforeSubmit', function(event){
         event.preventDefault();
             // let frm = $(this);
             // let data = $(this).serialize();

             let region_radius = getRegionRadius();
               document.querySelector('#added_region_ids').value = region_radius;

     });

 });

 function getRegionRadius(){
     const tbody = document.getElementById('t_region');
     let rows = tbody.querySelectorAll('tr[id^="row_region_"]');
     let reg_r = {};
     rows.forEach( function (item){
          reg_r[item.id.replace('row_region_','')] =  item.querySelector('input[type="number"]').value;
      });

     return  JSON.stringify(reg_r);
 }

// $("#signup-form").on('beforeSubmit', function (event) {
//     event.preventDefault();
//     let frm = $(this);
//     let data = $(this).serialize();
//     $.ajax({
//         url: frm.attr('action'),
//         type: 'POST',
//         data: data
//     }).done(function(data){
//         if (data.error == null) {
//             console.log(data);
//             $("#tokenId").val(data);
//             $("#divSignUp").toggleClass('hidden');
//             $("#divPhoneConfirm").toggleClass('hidden');
//         } else {
//             // Если при обработке данных на сервере произошла ошибка
//             console.log(data);
//         }
//
//     });
//     return false;
//
// });


// $(document).ready(function() {
//
//     const cbService = $("#cbService");
//     // const cbServiceArea =  $("#cbServiceArea");
//     const cbRegion =   $("#cbRegion");
//
//     cbService.on('select2:select', function (e) {
//         // var data = e.params.data;
//         $('#selected_service_id').val(e.params.data.id);
//         // console.log(data);
//     });
//
//     // cbServiceArea.on('select2:select', function (e) {
//     //     // var data = e.params.data;
//     //     $('#selected_service_area_id').val(e.params.data.id);
//     //     // console.log(data);
//     // });
//
//     cbRegion.on('select2:select', function (e) {
//         // var data = e.params.data;
//         $('#selected_region_id').val(e.params.data.id);
//         // console.log(data);
//     });
//
//     // cbServiceArea.on('select2:unselect', function (e) {
//     //     //   var data = e.params.data;
//     //     //  $('#selected_region_id').val(e.params.data.id);
//     //     //    console.log(e);
//     //     $('#selected_service_area_id').val('');
//     // });
//
//     cbRegion.on('select2:unselect', function (e) {
//         //   var data = e.params.data;
//         $('#selected_region_id').val('');
//         // console.log(e);
//     });
//
//     cbService.on('select2:unselect', function (e) {
//         //   var data = e.params.data;
//         $('#selected_service_id').val(e.params.data.id);
//         // console.log(e);
//     });
// });



// $("#profileupdateform-photo").on('change', function () {
//     return;
//     try {
//         let imgPath = $(this)[0].value;
//         let extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
//         let MAX_IMG_SIZE = 50000 * 4;
//         if ($(this)[0].files[0].size > MAX_IMG_SIZE) {
//             alert("Max size of image - 200 kB.");
//             return;
//         }
//         if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {
//             if (typeof (FileReader) != "undefined") {
//                 let image_holder = $("#profile-image-holder");
//                 image_holder.empty();
//                 let reader = new FileReader();
//                 reader.onload = function (e) {
//                     $("<img />", {
//                         "src": e.target.result,
//                         // "ng-src": e.target.result,
//                         "class": "img-fluid img-thumbnail float-right",
//                         "id": 'profile_img'
//                     }).appendTo(image_holder);
//                     document.getElementById("contact_photo").value = e.target.result;
//                 }
//                 image_holder.show();
//                 reader.readAsDataURL($(this)[0].files[0]);
//             } else {
//                 alert("This browser does not support FileReader.");
//             }
//         } else {
//             alert("Pls select only images");
//         }
//     }
//     catch (e) {
//          console.log(e);
//     }
// });


// $('#btnDeleteProfilePhoto').on('click', function (){
// $('#profile_img').attr('src', $('#empty_photo').val());
// $('#profileupdateform-photo').val('');
// });

//
// $('#service-add').on('click', function() {
// return;
//     const selected_service = $('#selected_service_id');
//     const added_service = $('#added_service_ids');
//
//     const  added_id = selected_service.val();
//     const  added_name = selected_service.attr('data-label');
//     if(added_id > 0){
//         added_service.val(added_service.val() + ','+added_id);
//
//
//         $('#service_list').append(`<li id='serviceId${added_id}' class='list-group-item d-flex justify-content-between lh-condensed'>
//             <div class='row filters-applied__link js-gtm-layer js-filter popular_servicefilters-applied__link js-gtm-layer js-filter mx-1 w-100'>
//             <div class='col-md-8 col-lg-8 col-sm-8 col-8'>
//         ${added_name}
//     </div>
//         <div class='col-md-4 col-lg-4 col-sm-4 col-4'>
//             <a href='#' class='service-delete btn btn-primary'>Delete</a>
//         </div>
//     </div>
//     </li>`);
//
//         selected_service.attr('data-label','')
//         selected_service.val(0);
//         $('#profileupdateform-service_empty').val('');
//     }
// });
// $('.service-delete').on('click', function(){
//     const li = $(this).parents('.list-group-item')[0];
//     const del_service_id = li.id.replace('serviceId','');
//     const deleted_service_ids = $('#deleted_service_ids');
//     deleted_service_ids.val(deleted_service_ids.val() + ','+del_service_id);
//     li.remove();
// });

// $('#region-add').on('click', function() {
//
//     const selected_region_id = $('#selected_region_id');
//     const added_region_id =  $('#added_region_ids');
//
//     const  added_id = selected_region_id.val();
//     const  added_name = selected_region_id.attr('data-label');
//     if(added_id > 0){
//         added_region_id.val(added_region_id.val() + ','+added_id);
//
//
//         $('#region_list').append(`<li id='regionId${added_id}' class='list-group-item d-flex justify-content-between lh-condensed'>
//             <div class='row filters-applied__link js-gtm-layer js-filter mx-1 w-100'>
//             <div class='col-md-8 col-lg-8 col-sm-8 col-8'>
//         ${added_name}
//     </div>
//         <div class='col-md-4 col-lg-4 col-sm-4 col-4'>
//             <a href='#' class='region-delete btn btn-primary'>Delete</a>
//         </div>
//     </div>
//     </li>`);
//
//         selected_region_id.attr('data-label','')
//         selected_region_id.val(0);
//         $('#profileupdateform-region_empty').val('');
//     }
// });
// $('.region-delete').on('click', function(){
//     const deleted_region_ids = $('#deleted_region_ids');
//     const li = $(this).parents('.list-group-item')[0];
//     const del_region_id = li.id.replace('regionId','');
//     deleted_region_ids.val(deleted_region_ids.val() + ','+del_region_id);
//     li.remove();
// });