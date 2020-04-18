document.addEventListener("DOMContentLoaded", ready);
function ready() {

let valueArray = new Array();

$("#button_Add").click(function() {
  let valueSizeCost = document.getElementById('size_cost').value;
  let regex = (/^([0-9]|[0-9(,|.)0-9])/);
     if (valueSizeCost.search(regex) == 0){

      //Копируются данные value в локальное хранилище storage.setItem(названиеКлюча, значениеКлюча);
      //Создание массива значений
      let keyCost = "keyCost" + Date.now();
      let valueNameCost =document.getElementById('name_cost').value;

      let costObj = {
        "valueName": valueNameCost,
        "valueSize": valueSizeCost
      };

      localStorage.setItem(keyCost, JSON.stringify(costObj));

      let localvalueArray = valueArray.push(keyCost);

      //Вставляется строка со значениями из локального хранилица
      //Добавление ячеек создания элементов
      function createOutlayPar(keyCost) {
        //Получение значения одной записи по ключу
        let localArray = localStorage.getItem(keyCost);
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
      createOutlayPar(keyCost);

      //Выводит сумму
      function sumAllValues() {
        let sumValues = 0;
        for (let i = 0; i < valueArray.length; i++) { // выведет 0, затем 1, затем 2
          let sumLocal = localStorage.getItem(valueArray[i]);
          let valueOne = JSON.parse(sumLocal);
            let valueOneSize =  valueOne.valueSize;
          if (valueOneSize.search(/^[0-9],[0-9]/) == 0){
            valueOneSize = valueOneSize.match(/^[0-9],[0-9]/).toString().replace(",", ".");
              }
            sumValues = sumValues + parseFloat(valueOneSize);
        }
        return sumValues;
      }

      sumValues = sumAllValues();
      $("#sumAValues").replaceWith($("#sumAValues").text(sumValues));

  }else{
alert("Пожалуйста введите числовое значение в поле сумма");
  }
}
);

}
