 $("#txtReSms").on('click', function (event) {
     event.preventDefault();
     $.ajax({
         url: 're-sms',
         type: 'POST'
     }).done(function(data){
         if (data.error == null) {
             console.log(data);

         } else {
             // Если при обработке данных на сервере произошла ошибка
             console.log(data);
         }

     });
     return false;

 });