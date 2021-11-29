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

// -------- 해당 부분 부터 수정되었습니다 -----------------
function form_submit(form) {
    var tel2 = document.getElementById('tel2').value;
    var tel3 = document.getElementById('tel3').value;


    if(tel2.length !== 4) {
        alert("핸드폰 번호 8자리를 모두 입력해주세요.");
        return false;
    }

    if(tel3.length !== 4) {
        alert("핸드폰 번호 8자리를 모두 입력해주세요.");
        return false;
    }

    if (!form.agree.checked) {
        alert("개인정보취급방침에 동의 하셔야합니다.");
        return false;
    }

    document.getElementById('submit_button').disabled = true;
    return true;
}


document.getElementById('tel2').addEventListener('keydown',function(e){
    if(!((e.key > 47 && e.key < 58) || e.key !== 'number')) {
        e.preventDefault();
    }

    if(this.value.length >= 4){
        if(e.key !== 'Backspace')
            e.preventDefault();
    }
});

document.getElementById('tel3').addEventListener('keydown',function(e){
    if(!((e.key > 47 && e.key < 58) || e.key !== 'number')) {
        e.preventDefault();
    }

    if(this.value.length >= 4){
        if(e.key !== 'Backspace')
            e.preventDefault();
    }
});
// -------- 해당 부분 까지 수정되었습니다. -----------------

