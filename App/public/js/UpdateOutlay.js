$("#update_button").css("cursor", "pointer");

$("#update_button").click(function() {
  if($( "#title" ).is("input")){
  $("#button-update").attr("class","d-none");
  $("#button-add").attr("class","d-none");
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
    }
});
