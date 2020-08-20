let now = new Date();
let nowMonth = now.getMonth();
let nowDate = now.getDate();

if(nowMonth < 10){
  nowMonth = "0" + nowMonth;
}
if(nowDate < 10){
  nowDate = "0" + nowDate;
}
let dataToDay = now.getFullYear() + "-"+ nowMonth +"-"+ nowDate;
$("#dataNow").val(dataToDay);

$( "#wasteNewRow" ).click(function(){

  let namberRows = $(".namberRow").length;
  $("#lastLineNumber").text(namberRows+1);
  let nameUsers = $("#nameUsers").text();

  function timeNow(){
    let time = new Date();
    let timeHours = time.getHours();
    if(timeHours < 10){
      timeHours = "0" + timeHours;

    }
    let timeMinutes = time.getMinutes();
    if(timeMinutes < 10){
      timeMinutes = "0" + timeMinutes;

    }
    let timeSeconds = time.getSeconds();
    if(timeSeconds < 10){
      timeSeconds = "0" + timeSeconds;
      }
    let timeForDataBases = timeHours+":"+timeMinutes+":"+timeSeconds;
    return timeForDataBases;
  }
  let timeNowForData = timeNow();

  let cost = $("#cost").val();
  let nameRow = $("#nameRow").val();

if(nameRow.length >99){
  $("#nameRow").tooltip("show");
  $("#nameRow").addClass('border-danger');
  $("#nameRow").on('keyup', function () {
    $("#nameRow").tooltip("hide");
    $("#nameRow").removeClass('border-danger');
  })
}else if(cost.search(/^([(\d+)|(\d+)(,|.)(\d+)])/)!== -1){
    if(cost.search(/^((\d+)(,|.)(\d+))/) == 0){
      let result = cost.match(/^((\d+)(,|.)(\d+))/);
      cost = result[0];
    }

    if(cost.search(/^((\d+),(\d+))/) == 0){
      cost = cost.match(/^((\d+),(\d+))/);
      cost = cost[0].toString().replace(",", ".");
    }
    queryAjax();
  }else {
    $("#cost").tooltip("show");
    $("#cost").addClass('border-danger');
    $("#cost").on('keyup', function () {
      $("#cost").tooltip("hide");
      $("#cost").removeClass('border-danger');
    })
  }

function queryAjax() {
  let dataRow = $("#dataNow").val() + " " + timeNowForData;
  let idPurse = $("#idPurse").val();
  let idUsers = $("#nameUsers").val();

  let query = {
    name: nameRow,
    amount: cost,
    createdTime: dataRow,
    namePurseId: idPurse,
    userId: idUsers
  };

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  $.ajax({
    url: "add",
    method: "POST",
    dataType: "JSON",
    data: query,
    success: function (data){
      $("#dataPurse").append("<tr id='nameRowPurse"+data['msg']+"'><th class='namberRow'>" + namberRows + "</th><th>" + $("#dataNow").val() +"</th><th>" + nameRow +"</th><th>" + nameUsers + "</th><th class='valueCost'>"+ cost +"</th><th class='trashRow h4 m-0 p-0 pt-1 pr-2  d-flex justify-content-end'  data-toggle='tooltip' title='Что-то пошло не так попробуйте перезагрузить страницу' id='trash"+ data['msg']+"'>&#128465;</th></tr>")
      $("#nameRow").val("");
      $("#cost").val("");
      $( ".trashRow" ).css("cursor", "pointer");
      let trashElementId = document.getElementById('trash'+ data['msg']);
      trashElementId.addEventListener( "click" , {handleEvent: deleteOneRow, elementId: data['msg']});

      let summCost = 0;
      $(".valueCost").each(function(elem){
        let valueOneElem = + $(this).text();
        summCost = +summCost + valueOneElem;
        return summCost;
      });
      $("#countValue").text(summCost);

    },
    error: function (){
      $("#valuePurse").tooltip("show");
      $("#valuePurse").addClass('border-danger');
      $("#valuePurse").on('keyup', function () {
        $("#valuePurse").tooltip("hide");
        $("#valuePurse").removeClass('border-danger');
      })
    }

  })

}

function deleteOneRow(event) {
  let targetRespons = this.elementId;
  let deleteNamberRow = {name: this.elementId}
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
    $.ajax({
      url: "deleterow",
      method: "POST",
      dataType: "JSON",
      data: deleteNamberRow,
      context: targetRespons,
      success: function (data){
      $("#nameRowPurse"+data['msg']).remove();
      $(".namberRow").each(function (index) {
        let numberRow  = index + 1;
        $(this).text(numberRow);
      });

      let summCost = 0;
      $(".valueCost").each(function(elem){
        let valueOneElem = + $(this).text();
        summCost = +summCost + valueOneElem;
        return summCost;
      });
      $("#countValue").text(summCost);
      },
      error: function (){
          $("#trash"+ targetRespons).tooltip("show");
      }
    })
}

})
