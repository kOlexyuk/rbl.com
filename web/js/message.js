$(document).ready(function() {
        $('.btnMsg').on('click', function (item) {
            const id = this.id.split('_')[1];
            $.ajax({
                url: 'update-read',
                // dataType: "html",
                type: 'POST',
                data: {id: id},

                success: function (data) {

                    // const prof = JSON.parse(data)
                    if (data === 'ok') {
                        $("#btnRead_" + id).removeClass('btn-success');
                        $("#btnRead_" + id).addClass('btn-info');
                    }


                },
                error: function (err) {
                    $("#conteiner").html("ERROR" + err.message);
                }
            });
        });


    $('#send-msg').on('click', function (e) {
        e.preventDefault();
        const text = $('#message-text').val();
        const  user_id_to = $('#message_to_user_id').val();
        $.ajax({
            url: '/en/main/message/sendm',
            // dataType: "html",
            type: 'POST',
            data: {user_id_to: user_id_to , text:text},
            success: function (data) {
                const ul =  $('#my-msg-ul');
                ul.append(data);
                $('#message-text').val('');
                ul.scrollTop(ul[0].scrollHeight - ul[0].clientHeight);
            },
            error: function (err) {
                $("#conteiner").html("ERROR" + err.message);
            }
        });
    });



    $('.card-body.last-message').on('click', function (item) {

            const btn = item.currentTarget;
            let url  = "";
            if(btn.id.startsWith('last_message_') ) {
                const user_id = item.currentTarget.id.split('_')[2];
                $('#message_to_user_id').val(user_id);
                 url = 'main/message/' + user_id + '/person';
            }
            else{
                url = 'main/message/'+ btn.id;
                $('#my_send_message').addClass('hidden');
            }
            $.ajax({
                url: url,
                // dataType: "html",
                type: 'POST',
                success: function (data) {
                    const ul =  $('#my-msg-ul');
                    ul.children('li').remove();
                    ul.append(data);

                    ul.scrollTop(ul[0].scrollHeight - ul[0].clientHeight);

                    if(btn.id.startsWith('last_message_') )
                     $('#my_send_message').removeClass('hidden');

                    const last_message_sel = document.querySelector('.last-message.last-message-selected');
                    if(last_message_sel != null)
                        last_message_sel.classList.remove('last-message-selected');

                    item.currentTarget.classList.add('last-message-selected');

                },
                error: function (err) {
                    $("#conteiner").html("ERROR" + err.message);
                }
            });
            // fetch('main/message/'+user_id+'/person')
            //     .then((response) => {
            //         return response.json();
            //     })
            //     .then((data) => {
            //         console.log(data);
            //     });
        });


    $('#btn_send_message,#btn_send_review').on('click', function (e){
        e.preventDefault();
        const btn = item.currentTarget.id;
        const is_review = btn === 'btn_send_review';
       const textArea = $('#txt_review');
        textArea.removeClass('error');
        const text = textArea.val().trim();
        if(text === '') {
            textArea.addClass('error');
            return;
        }
        const user_id_to =$('user_id_to').val();
        $.ajax({
            url: '/en/main/message/send',
            // dataType: "html",
            type: 'POST',
            data: {user_id_to: user_id_to , text:text , review:is_review},
            success: function (data) {
                const ul =  $('#ul_review');
                ul.append(data);
                $('#txt_review').val('');
                ul.scrollTop(ul[0].scrollHeight - ul[0].clientHeight);
            },
            error: function (err) {
                $("#conteiner").html("ERROR" + err.message);
            }
        });

    });

       $('#my_send_message').style = "display:none";
    }
);

// function scrollToBottom(element) {
//     element.scroll({ top: element.scrollHeight, behavior: 'smooth' });
// }