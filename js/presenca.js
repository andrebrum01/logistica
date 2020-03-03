
var pos = $(".pos");
for(var i=0;i<pos.length;i++){
    $(".pos").eq(i).html(i);
}

$(".pessoa").hover(function () {
        $(this).css("box-shadow","inset 0px -3px "+$(this).find(".equipe").css("background-color"));
    },
    function(){
        $(this).css("box-shadow","");
    }
);
$(".admin").width($(".admin").height());
$(window).resize(function () { 
    $(".admin").width($(".admin").height());
});
$(".admin").click(function (e) { 
    window.location = "admin.php";     
});
a = $(".time").val();
$(".time").addClass($(".time").val());
$('.time').change(function(){ 
    $(".time").removeClass(a);
    $(".time").addClass($(".time").val());
});
$('.time').click(function(){ 
    a = $(".time").val();
});

$(".close").click(function (e) { 
    $(".alerta").hide();
    window.location = "presenca.php";     
});
$(".presenca").click(function (e) { 
    window.location = "presenca.php";     
});
