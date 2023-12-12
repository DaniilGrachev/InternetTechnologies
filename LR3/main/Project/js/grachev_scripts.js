$(function(){
    $('#scroll_bottom').click(function(){
        $('html, body').animate({scrollTop: $(document).height() - $(window).height()}, 600);
        return false;
    });
});


document.getElementById('checkRequired').addEventListener("click", check);
function check(e){
    const pass1= document.getElementById('pass1')
    const pass2= document.getElementById('pass2')

    if (pass1.value !== pass2.value){
        alert("Incorrect passwords")
        e.preventDefault()
    }
}