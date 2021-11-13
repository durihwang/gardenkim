new Swiper('.swiper-container', {
    autoplay: {
        delay: 3000,
    },
});

$(document).ready(function(){
    var cont = $('#contents>article');
    $(window).scroll(function(){
        var st = $(this).scrollTop();
        for(var i = 0 ; i <cont.length; i++){
            if(st >= cont.eq(i).offset().top - $(window).height()/1.5 ){
                cont.eq(i).addClass("show");
            }
        }
    })
});

$(function() {
    $('#income, #debt').keypress(function(e) {
        return (!(e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)));
    });

    $('.popbtn').click(function () {
        $("#modal-content").bPopup();
    });

});

function form_submit(form) {
    if (!form.agree.checked) {
        alert("개인정보취급방침에 동의 하셔야합니다.");
        return false;
    }

    document.getElementById('submit_button').disabled = true;
    return true;
}


document.getElementById('tel2').addEventListener('keydown',function(e){
    if(!((e.keyCode > 47 && e.keyCode < 58) ||
        e.keyCode == 8 || e.keyCode == 37 || e.keyCode == 39)) {
        e.preventDefault();
    }

    if(this.value.length >= 4){
        e.preventDefault();
    }
});

document.getElementById('tel3').addEventListener('keydown',function(e){
    if(!((e.keyCode > 47 && e.keyCode < 58) ||
        e.keyCode == 8 || e.keyCode == 37 || e.keyCode == 39)) {
        e.preventDefault();
    }

    if(this.value.length >= 4){
        e.preventDefault();
    }
});


