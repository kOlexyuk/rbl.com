$(document).ready(function() {
    $('.btn-user-favorite_page').on('click',deleteFavorite);
});

function deleteFavorite(e){

    // e.preventDefault();
    // let $form = $(this);
    const  id = this.id.split('_')[1];

    const btn = this;


    let lang = document.documentElement.lang ;

    // const url = '/user-favorite/'+hiddenFavorite+'/update';
    $.ajax({
        url: "/"+lang+"/main/user-favorite/set",
        type : "post",
        data: {hiddenFavorite:id},
        // dataType: 'json',
        success: function(data){
            let res = JSON.parse(data);

            btn.parentElement.parentElement.remove();

            // btn.innerText = res.txt;
            // // btn.classList.push();
            // let lastClass = $(btn).attr('class').split(' ').pop();
            // $(btn).removeClass(lastClass);
            // btn.classList.add(res.btn);

        },
        error: function (err) {
            console.log(err);
        }
    });
    return false;
}