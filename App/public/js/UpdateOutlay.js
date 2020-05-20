$("#update_button").css("cursor", "pointer");
$(".trash").css("cursor", "pointer");
function apdateOutlay() {
  $("#name-outlay").replaceWith(function() {
    return $('<input name="title" id="title" form="outlay" class="h3">').prop( "value",  $("#name-outlay").html());
  });
  $(".valueName").each(function(index) {
    $('<input form="outlay" form="outlay" class="col" style="background: none; border: solid 1px white;">').prop( "value",   $(this).text()).attr( "name", function(){  return "name" + index; }).appendTo($(this).empty());
  });
  $(".valueCost").each(function(index) {
    $('<input form="outlay" form="outlay" class="col" style="background: none;  border: solid 1px white;">').prop( "value",  $(this).text()).attr( "name", function(){  return "size" + index; }).appendTo($(this).empty());
  });
  $("#button-update").removeAttr("class");
  $("#button-add").removeAttr("class");
  $("#empty-row").removeAttr("class");
  $(".trash").removeClass("d-none");
}
if($( "#errors-message" ).is("div")){
  apdateOutlay();
}
$("#update_button").click(function() {
  if($( "#title" ).is("input")){
  $("#button-update").attr("class","d-none");
  $("#button-add").attr("class","d-none");
  $("#empty-row").attr("class","d-none");
  $(".trash").addClass("d-none");
  $("#title").replaceWith(function() {
    return $('<h3 id="name-outlay">').text($("#title").val());
  });
  $(".valueName").each(function(index) {
    $(this).children().replaceWith( $(this).children().val());
  });
  $(".valueCost").each(function(index) {
    $(this).children().replaceWith($(this).children().val());
  });
  }else {
  apdateOutlay();
    }
});

$("#table").on('change','.valueCost', function() {
  let sum=0;
    if ($(this).children().val() == ""){
    $(this).children().focus();
    $(this).children().addClass("border border-danger");
    let namberRow = $(this).siblings(".valueNamber").html();
    let stringDanger = "<div class='col alert alert-danger danger-message"+namberRow+"'>Пожалуйста, укажите значение в строке &#171;"+ namberRow+ "&#187 в колонке	&#171;Стоимость&#187</div>";
    $("#table").after(stringDanger);
  }else{
    let namberDelete = "danger-message" + $(this).siblings(".valueNamber").html(); + $(this).siblings(".valueNamber").html();
      if(($(".alert-danger").hasClass(namberDelete)) &&($(this).children().val().search(/^([0-9](,|.)[0-9])|[0-9]/) == 0)){
        $("."+namberDelete).remove();
    }
    $(".valueCost input").each(function () {
          if($(this).hasClass("border border-danger")){
          $(this).removeClass("border border-danger");
          }
          if ($(this).val().search(/^[0-9],[0-9]/) == 0){
            $(this).val($(this).val().match(/^[0-9],[0-9]/).toString().replace(",", "."));
          }
      sum += parseFloat($(this).val());
      return sum;
    });

    $( "#summ-all").text(sum.toFixed(2));
  }

});
