$(function(){
    var clicked=0;
    var institution=$("#institution");
    $("#new_institution").click(function(event){
        if(clicked===0)
        {
            $("#new_inst").css("display","block");
            institution.val('0');
            $("#new_inst_confirm").attr('value','new');
            institution.attr('disabled','disabled');
            event.preventDefault();
            clicked=1;
        }
        else
        {
            $("#new_inst").css("display","none");
            institution.attr('disabled',false);
            $("#new_inst_confirm").attr('value','');
            event.preventDefault();
            clicked=0;
        }

    });
});


function smeni_pacient(maticen){
    $("#pacient > option").each(function() {
        if(this.id!==maticen.value)
            $(this).attr("hidden",true);
        else
            $(this).attr("hidden",false);
    });
}

/*
$('#maticen').on('change',function(){
    alert("pero");
    $('#pacient').each(function(){
        console.log($(this).id);
        if($(this).id!==$('#maticen:selected').id)
        {
            $(this).attr("hidden");
        }
    });
});*/