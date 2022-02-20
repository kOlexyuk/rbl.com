const selected_service_id =  $('#selected_service_id');
const selected_service_area_id =  $('#selected_service_area_id');
const selected_region_id =  $('#selected_region_id');

const cbService = $("#cbService");
const cbServiceArea =  $("#cbServiceArea");
const cbRegion =   $("#cbRegion");

const radioPersonType = $('input[name="rb_person_type"]');

$(document).ready(function() {

    cbService.on('select2:select', function (e) {
        // var data = e.params.data;
        selected_service_id.val(e.params.data.id);
        selected_service_id.attr('data-label',e.params.data.text);
        // console.log(data);
    });

    cbServiceArea.on('select2:select', function (e) {
        // var data = e.params.data;
        selected_service_area_id.val(e.params.data.id);
        selected_service_area_id.attr('data-label',e.params.data.text);
        // console.log(data);
    });

    cbRegion.on('select2:select', function (e) {
        // var data = e.params.data;
        selected_region_id.val(e.params.data.id);
        selected_region_id.attr('data-label',e.params.data.text);
        // console.log(data);
    });



    cbServiceArea.on('select2:unselect', function (e) {
     //   var data = e.params.data;
      //  $('#selected_region_id').val(e.params.data.id);
      //    console.log(e);
        selected_service_area_id.val('');
        selected_service_area_id.attr('data-label',"");

    });

    cbRegion.on('select2:unselect', function (e) {
        //   var data = e.params.data;
         selected_region_id.val('');
        selected_region_id.attr('data-label',"");
        // console.log(e);
    });

    cbService.on('select2:unselect', function (e) {
        //   var data = e.params.data;
        selected_service_id.val('');
        selected_service_id.attr('data-label',"");
        // console.log(e);
    });

    $('.btn-user-favorite').on('click',handleFavorite);

});



function handleFavorite(e){


     const hiddenFavorite= this.id.split('_')[1];

     const btn = this;
     let lang = document.documentElement.lang ;

    // const url = '/user-favorite/'+hiddenFavorite+'/update';
    $.ajax({
        url: "/"+lang+"/main/user-favorite/set",
        type : "post",
        data: {hiddenFavorite:hiddenFavorite},
        // dataType: 'json',
        success: function(data){
            let res = JSON.parse(data);
           // btn.innerText = res.txt;
            // btn.classList.push();
            let lastClass = $(btn).attr('class').split(' ').pop();
            $(btn).removeClass(lastClass);
            btn.classList.add(res.btn);

        },
        error: function (err) {
            console.log(err);
        }
    });
    return false;
}




var isPopularService  = false;

$('.popular_service').on('click',function(event){
//    event.preventDefault();
   if(this.id !== undefined) {
       // const service_id = this.id.replace('popular_service', '').replace('popular_service_', '');
       const service_id =   this.dataset.serv;
       $('#selected_service_area_id').val('');
       $('#startform-service_area').val('');
       $('#startform-service').val('');
       $('#selected_service_id').val(service_id);
       $('#selected_region_id').val('');
       cbService.val('').trigger('change');
       cbServiceArea.val('').trigger('change');
       cbRegion.val('').trigger('change');

       isPopularService  = true;
         $('#start-search-form').submit();
   }
});

radioPersonType.on('click',function (e){
    // console.log(e);
     let id = e.target.value;

    $('#start-search-form').submit();
});

$('#start-search-form').on('beforeSubmit', function (e){

let lang =document.documentElement.lang ;

if(isPopularService === false){
    selected_service_id.val(cbService.val());
    selected_service_area_id.val(cbServiceArea.val());
    selected_region_id.val(cbRegion.val());}
    isPopularService = false;
    let person_type = $('input[name="rb_person_type"]:checked').val();

    $("#global-loader").show();

    $.ajax({
        url: '/'+lang+'/profile-list',
        dataType: "html",
        type: 'POST',
        data: { service_id: selected_service_id.val(),service_area_id:selected_service_area_id.val()
            ,region_id:selected_region_id.val()
            ,person_type:person_type},

        success: function(data){
            $("#div_profile_list").html(data);
            $("#span_popular_profile_cnt").text($("#cnt_profList").val());
            $('.btn-user-favorite').on('click',handleFavorite);
        },
        error: function (err) {
            $("#conteiner").html("ERROR"+ err.message);
        },
        complete: function (jqXHR,  textStatus){
            $("#global-loader").fadeOut("slow");
        }

    });

    e.preventDefault();
    return false;

})


$(".searchclear").click(function(e){
   const inp = $(this).prev().children('input');
   const id = inp.attr('id').replace('startform-','');
    $('#selected_'+id+'_id').val('');
    inp.val('');
});





