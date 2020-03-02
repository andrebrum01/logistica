
var pos = $(".pos");
for(var i=0;i<pos.length;i++){
    $(".pos").eq(i).html(i);
}
$(".equipe").first().addClass("celestial");


$(".pessoa").hover(function () {
        $(this).css("box-shadow","inset 0px -3px "+$(this).find(".equipe").css("background-color"));
    },
    function(){
        $(this).css("box-shadow","");
    }
);