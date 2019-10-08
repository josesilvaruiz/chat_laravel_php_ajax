function scroll(){
    var objDiv = document.getElementById("divrefresh");
    objDiv.scrollTop = objDiv.scrollHeight;
}
scroll();
//SEARCH
$('#buscador').submit(function(e){
    let url = 'http://chat.test';
    $(this).attr('action',url+'/'+$('#search').val());
});
/*
function enviar(){
$("#formtext").submit(function(e) {
    e.preventDefault();

    var form = $(this)
    var url = form.attr('action');
    $.ajax({
        type:'POST',
        url:$(this).attr("action"),
        data:$(this).serialize(),
        success:function(data){
            $("#resultado").html(data);
        }
    }
})
}

 */
$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});


$("#formtext").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    $.ajax({

        type:'POST',

        url:url,

        data:$(this).serialize(),

        success : function(data){
            console.log(data);
            var mensajeinput = document.getElementById("inputchat").value;
            document.getElementById("inputchat").value = "";
            let now = new Date();
            var msg = "<div class='outgoing_msg'><div class='sent_msg'><p>" + mensajeinput + "</p> <span class='time_date'>"+ now + "</span></div></div>";
            $("#divrefresh").append(msg).after(scroll());
        },

        error: function(error) {
            var msgerror= "<div class='alert alert-danger'  role='alert'>  This is a danger alert—check it out!  </div>"
            $('#menu').append(msgerror);
        }

    });
});
/*$("#formtext").submit(function(e) {
    e.preventDefault();

    var form = $(this)
    var url = form.attr('action');
    $.ajax({
        type:'POST',
        url:$(this).attr("action"),
        data:$(this).serialize(),
        success:function(data){
            $("#resultado").html(data);*/
