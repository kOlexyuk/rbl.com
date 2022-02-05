
function handleFavorite(e){

    // e.preventDefault();
    // let $form = $(this);
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
            btn.innerText = res.txt;
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