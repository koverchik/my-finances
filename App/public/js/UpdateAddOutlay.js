$("#button-add-update").click(function() {
  if($('.valueCost input').last().val() == ""||$('.valueName input').last().val()== ""){

    if(!$("div").is('#danger-message')){
      $("#table").after("<div id='danger-message' class='col alert alert-danger'>Поля обязательны для заполненния</div>");
    }

    if($('.valueCost input').last().val() == ""){
      $('.valueCost input').last().addClass("border-danger");
      $('.valueCost input').last().focus(function(){$(this).removeClass("border-danger");});
    }
    if($('.valueName input').last().val() == ""){
      $('.valueName input').last().addClass("border-danger");
      $('.valueName input').last().focus(function(){$(this).removeClass("border-danger");});
    }

  }else if($('.valueCost input').last().val().search(/^([0-9]|[0-9(,|.)0-9])/) == -1){
      $("#table").after("<div id='danger-message-cost' class='col alert alert-danger'>Стоимость необходимо ввести в числовом формате</div>");

  }else {
    //Удаление предупредительных сообщений
    if($("div").is('#danger-message')){
      $("div #danger-message").remove();
    }
    if($("div").is('#danger-message-cost')){
      $("div #danger-message-cost").remove();
    }
    //Замена запятой
    let valueSizeCost = $('.valueCost input').last().val();
    if (valueSizeCost.search(/^[0-9],[0-9]/) == 0){
      valueSizeCost = valueSizeCost.match(/^[0-9],[0-9]/).toString().replace(",", ".");
      $('.valueCost input').last().val(valueSizeCost);
    }

    //Создание строки
    let theadElem = document.createElement('thead');
    theadElem.classList.add("thead-light");
    let trElem = document.createElement('tr');

    let thElem = document.createElement('th');
    thElem.classList.add("valueNamber");
    thElem.append(parseInt($('.valueNamber').last().html()) + 1);
    trElem.append(thElem);
    theadElem.append(trElem);

    let trElemName = document.createElement('tr');
    let thElemName  = document.createElement('th');
    thElemName.classList.add("valueName");
    let thElemNameInput = document.createElement('input');
    thElemNameInput.classList.add("col");
    thElemNameInput.style.background = "none";
    thElemNameInput.style.border = "solid 1px white";
    thElemNameInput.setAttribute("form", "outlay");
    let valueNameName = + $('.valueName input').last().attr('name').slice(4) +1;
    valueNameName = "name"+valueNameName;
    thElemNameInput.setAttribute("name", valueNameName);
    thElemName.append(thElemNameInput);
    trElem.append(thElemName);

    let thElemCost  = document.createElement('th');
    let thElemCostInput = document.createElement('input');
    thElemCostInput.classList.add("col");
    thElemCost.classList.add("valueCost");
    thElemCostInput.style.background = "none";
    thElemCostInput.style.border = "solid 1px white";
    thElemCostInput.setAttribute("form", "outlay");
    let valueCostName = + $('.valueCost input').last().attr('name').slice(4) +1;
    valueCostName = "size"+valueCostName;
    thElemCostInput.setAttribute("name", valueCostName);
    thElemCost.append(thElemCostInput);
    trElem.append(thElemCost);
    $('.thead-light').last().after(theadElem);
  }
})
