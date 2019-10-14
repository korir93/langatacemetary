function l(d){
    console.log(d);
}
function j(json) {
   return JSON.parse(json) ;
}
function serializeForm(form) {
    return $(form).serializeArray()
}
function showResponse(response){
    response = JSON.parse(response);
    var type = new String(response.Type);
    if(type == "ERROR"){
        type = "DANGER";
    }
    $("#status").html("<div class='my-2 text-"+type.toLowerCase()+"'>"+response.Message+"</div>")
    .show()
    /* .easeOut(5000, () => {
        $(this).hide();
    }) */;
}
