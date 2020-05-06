$("#update_button").css("cursor", "pointer");

$("#update_button").click(function() {
  if($( "#title" ).is("input")){
  $("#button-update").attr("class","d-none");
  $("#title").replaceWith(function() {
    return $('<h3 id="name-outlay">').text($("#title").val());
  });
  $(".valueName").each(function(index) {
    $(this).children().replaceWith( $(this).children().val());
  });
  $(".valueCost").each(function(index) {
    $(this).children().replaceWith( $(this).children().val());
  });
  }else {
    $("#name-outlay").replaceWith(function() {
      return $('<input name="title" id="title" form="outlay" class="h3">').prop( "value",  $("#name-outlay").html());
    });
    $(".valueName").each(function(index) {
      $('<input form="outlay" class="col" style="background: none; border: solid 1px white;">').prop( "value",   $(this).text()).appendTo($(this).empty().attr( "name", function(){  return "name" + index; }));
    });
    $(".valueCost").each(function(index) {
      $('<input form="outlay" class="col" style="background: none;  border: solid 1px white;">').prop( "value",  $(this).text()).appendTo($(this).empty().attr( "name", function(){  return "size" + index; }));
    });
    $("#button-update").removeAttr("class");
    }
});
