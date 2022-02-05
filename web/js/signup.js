//
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
//
// $("#confirm-form").on('beforeSubmit', function (event) {
//     event.preventDefault();
//     let frm = $(this);
//     let data = $(this).serialize();
//     $.ajax({
//         url: frm.attr('action'),
//         type: 'POST',
//         data: data
//     }).done(function(data) {
//         if (data.error == null) {
//             console.log(data);
//             // $("#tokenId").val(data);
//             // $("#divSignUp").toggleClass('hidden');
//             // $("#divPhoneConfirm").toggleClass('hidden');
//         } else {
//             // Если при обработке данных на сервере произошла ошибка
//             console.log(data);
//         }
//     });
//
//     // $("#divSignUp").toggleClass('hidden');
//     // $("#divPhoneConfirm").toggleClass('hidden');
// });