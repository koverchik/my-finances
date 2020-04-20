document.addEventListener("DOMContentLoaded", ready);
function ready() {
  let valueArray = new Array();
  //Выводит сумму
  let sumValues = 0;
  function sumAllValues() {
  //  alert($("#sumAValues").text());

    for (let i = 0; i < valueArray.length; i++) {
      let sumLocal = sessionStorage.getItem(valueArray[i]);
      let valueOne = JSON.parse(sumLocal);
      let valueOneSize =  valueOne.valueSize;
      if (valueOneSize.search(/^[0-9],[0-9]/) == 0){
        valueOneSize = valueOneSize.match(/^[0-9],[0-9]/).toString().replace(",", ".");
      }
      sumValues = +sumValues + parseFloat(valueOneSize);
      sumValues = sumValues.toFixed(2);
    }
    return sumValues;
  }

  function createOutlayPar(keyCost) {
    //Получение значения одной записи по ключу
    let localArray = sessionStorage.getItem(keyCost);
    let value = JSON.parse(localArray);
    //Создание строки таблциы
    let tr = document.createElement('tr');
    let tbody = document.createElement('tbody');
    tbody.append(tr);
    let namberRow = valueArray.length;
    let tdNamberRow = document.createElement('td');
    tdNamberRow.innerHTML = namberRow;
    tr.append(tdNamberRow);

    let tdValueName = document.createElement('td');
    tdValueName.innerHTML = value.valueName;
    tr.append(tdValueName);

    let tdValueSizeSize = document.createElement('td');
    tdValueSizeSize.innerHTML = value.valueSize;
    tr.append(tdValueSizeSize);
    $("#table").append(tbody);
    //Удаление значений value из дом документа
    $("#name_cost").val('');
    $("#size_cost").val('');
  }

  function addingRows() {
    let valueNameCost =document.getElementById('name_cost').value;
    let valueSizeCost = document.getElementById('size_cost').value;
    let regex = (/^([0-9]|[0-9(,|.)0-9])/);
    if(valueNameCost == ""){
      $("#name_cost").addClass("is-invalid");
      $("#name_cost" ).focus(function(){$("#name_cost").removeClass("is-invalid");});
    } else if (valueSizeCost.search(regex) == 0){
      //Копируются данные value в локальное хранилище storage.setItem(названиеКлюча, значениеКлюча);
      //Создание массива значений
      let keyCost = "keyCost" + Date.now();
      let costObj = {
        "valueName": valueNameCost,
        "valueSize": valueSizeCost
      };
      //Вставляется ключ и значение для строк
      sessionStorage.setItem(keyCost, JSON.stringify(costObj));
      //Добавляется ключк к массиву
      let haneValueArray = sessionStorage.getItem("valueArray");
      valueArray = JSON.parse(haneValueArray);
      valueArray.push(keyCost);
      //Обновляется массив

      sessionStorage.setItem("valueArray", JSON.stringify(valueArray));
      //Вставляется строка со значениями из локального хранилица
      //Добавление ячеек создания элементов
      createOutlayPar(keyCost);
      sumValues = sumAllValues();
      $("#sumAValues").replaceWith($("#sumAValues").text(sumValues));
    }else{
      $("#size_cost").addClass("is-invalid");
      $("#size_cost").val('');
      $( "#size_cost" ).focus(function(){$("#size_cost").removeClass("is-invalid");});
    }
  }



if(sessionStorage.getItem("valueArray") == null){
$("#button_Add").click(function() {
  alert("нет массива");
  addingRows();});
}else{
      alert("есть массив");
      let sumValuesLocal = 0;
      let viewArray = sessionStorage.getItem("valueArray");
      viewArray = JSON.parse(viewArray);
      for (let i = 0; i < viewArray.length; i++) {
      let value = viewArray[i];
      value = sessionStorage.getItem(value);
      value = JSON.parse(value);
      //Создание строки таблциы
      let tr = document.createElement('tr');
      let tbody = document.createElement('tbody');
      tbody.append(tr);
      let namberRow = i+1;
      let tdNamberRow = document.createElement('td');
      tdNamberRow.innerHTML = namberRow;
      tr.append(tdNamberRow);

      let tdValueName = document.createElement('td');
      tdValueName.innerHTML = value.valueName;
      tr.append(tdValueName);

      let tdValueSizeSize = document.createElement('td');
      tdValueSizeSize.innerHTML = value.valueSize;
      tr.append(tdValueSizeSize);
       $("#table").append(tbody);

       sumValuesLocal = +sumValuesLocal + parseFloat(value.valueSize);
       $("#sumAValues").replaceWith($("#sumAValues").text(sumValuesLocal));

       $("#button_Add").click(function() {
        addingRows();
      })
    }


  }

}
