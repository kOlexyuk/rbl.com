$('#send_message').on('beforeSubmit', function (e){
  let $form = $(this);
    e.preventDefault();

    $.ajax({
        url: $form.attr('action'),
        type : $form.attr('method'),
        data: $form.serializeArray(),
        // dataType: 'json',
        success: function(data){
            $('#row_message_form').addClass('hidden');
            $('#row_not_mesage').removeClass('hidden');
            $('#usermessages-message').val('');

        },
        error: function (err) {
            console.log(err);
        }
    });
    return false;
})

// $('#btn_send_message').on('click',function (e){
//
//     $('#row_message_form').removeClass('hidden');
//     $('#usermessages-is_review').val(0);
//     $('#div_stars').addClass('hidden');
//
// })

$('#btn_send_review').on('click',function (e){

    $('.row_review_div').removeClass('hidden');
    // $('#row_review_form').removeClass('hidden');
    $('#div_message_button').addClass('hidden');
  //  $('#usermessages-is_review').val(1);
    $('#div_stars').removeClass('hidden');
})

$('#btn_send_message').on('click',function (e){
    $('#row_message_form').removeClass('hidden');
    $('#div_message_button').addClass('hidden');
    //$('#usermessages-is_review').val(1);
   // $('#div_stars').removeClass('hidden');
})

$('#form_user_favorite').on('beforeSubmit',function (e){
    e.preventDefault();
    let $form = $(this);
    // const hiddenFavorite= document.getElementById('hiddenFavorite').value;

    // const url = '/user-favorite/'+hiddenFavorite+'/update';
    $.ajax({
        url: $form.attr('action'),
        type : $form.attr('method'),
        data: $form.serializeArray(),
        // dataType: 'json',
        success: function(data){
            const btn = $('#btnFavorite');
            let res = JSON.parse(data);
            btn.text(res.txt);
            let lastClass = btn.attr('class').split(' ').pop();
            btn.removeClass(lastClass);
            btn.addClass(res.btn);

        },
        error: function (err) {
            console.log(err);
        }
    });
    return false;
    })


$('#btn_submit_message').on('click', function (e){
    e.preventDefault();
    const btn = e.currentTarget.id;
    const is_review =0;
   // const text = $('#txt_review').val();

    const textArea = $('#message_txtarea');
    textArea.removeClass('error');
    const text = textArea.val().trim();
    if(text === '') {
        textArea.addClass('error');
        return;
    }

    const user_id_to =$('#message_user_id_to').val();
    const stars =  0;

    const url =  '/en/main/message/sendm';
    $.ajax({
        url: url,
        type: 'POST',
        data: {user_id_to: user_id_to , text:text , review:is_review, stars:stars},
        success: function (data) {
            const ul =  $('#chat_messages');
            ul.append(data);
            $('#message_txtarea').val('');

            ul.scrollTop(ul[0].scrollHeight - ul[0].clientHeight);
        },
        error: function (err) {
            $("#conteiner").html("ERROR" + err.message);
        }
    });

})


$('#btn_submit_review').on('click', function (e){
    e.preventDefault();
    const btn = e.currentTarget.id;
    const is_review = 1;
    // const text = $('#txt_review').val();

    const textArea = $('#review_txtarea');
    textArea.removeClass('error');
    const text = textArea.val().trim();
    if(text === '') {
        textArea.addClass('error');
        return;
    }

    const user_id_to =$('#review_user_id_to').val();
    const stars = $('#usermessages-stars').val();

    const url =  '/en/main/message/send' ;
    $.ajax({
        url: url,
        type: 'POST',
        data: {user_id_to: user_id_to , text:text , review:is_review, stars:stars},
        success: function (data) {
            // const ul =  $('#chat');
            // ul.append(data);
            $('#review_txtarea').val('');
            if(is_review === 1)
                $('#review_stars').addClass('hidden');
            $('#row_review_form').addClass('hidden');
            $('#senk_review').removeClass('hidden');
           //  ul.scrollTop(ul[0].scrollHeight - ul[0].clientHeight);
        },
        error: function (err) {
            $("#conteiner").html("ERROR" + err.message);
        }
    });

})


