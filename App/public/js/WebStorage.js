document.addEventListener("DOMContentLoaded", ready);
function ready() {
let valueArray = new Array();
    function sumAllValues() {
        let sumValues = 0;
        for (let i = 0; i < valueArray.length; i++) {
        let valueOneArray = valueArray[i];
        let sumLocal = sessionStorage.getItem(valueOneArray);
        let valueOne = JSON.parse(sumLocal);
        let valueOneSize =  valueOne.valueSize;
        if (valueOneSize.search(/^[0-9],[0-9]/) == 0){
          valueOneSize = valueOneSize.match(/^[0-9],[0-9]/).toString().replace(",", ".");
        }
        sumValues = +sumValues + parseFloat(valueOneSize);
        sumValues = sumValues.toFixed(2);
        $("#sumAValues").replaceWith($("#sumAValues").text(sumValues));
      }
    }

    function createOutlayPar(keyCost) {
      let localArray = sessionStorage.getItem(keyCost);
      let value = JSON.parse(localArray);

      let tr = document.createElement('tr');
      let tbody = document.createElement('tbody');
      tbody.append(tr);

      let namberRow = valueArray.length;
      let tdNamberRow = document.createElement('td');
      tdNamberRow.innerHTML = namberRow;
      tr.append(tdNamberRow);

      let tdValueName = document.createElement('td');
      let tdValueNameInput = document.createElement('input');
      //value.valueName;
      nameAttribute = "name" + namberRow;
      tdValueNameInput.setAttribute("name", nameAttribute);
      tdValueNameInput.setAttribute("readonly", "true");
      tdValueNameInput.setAttribute("form", "outlay");
      tdValueNameInput.setAttribute("value", value.valueName);
      tdValueNameInput.style.background = "none";
      tdValueNameInput.style.border = "none";
      tdValueName.append(tdValueNameInput);
      tr.append(tdValueName);

      let tdValueSizeSize = document.createElement('td');
      let tdValueSizeInput = document.createElement('input');

      nameAttributeSize = "size" + namberRow;
      tdValueSizeInput.setAttribute("name", nameAttributeSize);
      tdValueSizeInput.setAttribute("readonly", "true");
      tdValueSizeInput.setAttribute("form", "outlay");
      tdValueSizeInput.setAttribute("value", value.valueSize);
      tdValueSizeInput.style.background = "none";
      tdValueSizeInput.style.border = "none";
      tdValueSizeSize.append(tdValueSizeInput);
      tr.append(tdValueSizeSize);

      $("#table").append(tbody);

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
          let keyCost = "keyCost" + Date.now();
          let costObj = {
            "valueName": valueNameCost,
            "valueSize": valueSizeCost
          };
        if(sessionStorage.getItem("valueArray") == null){
            valueArray.push(keyCost);
            sessionStorage.setItem("valueArray", JSON.stringify(valueArray));
          }else {
          let changeValueArray = sessionStorage.getItem("valueArray");
          valueArray = JSON.parse(changeValueArray);
          valueArray.push(keyCost);
          sessionStorage.setItem("valueArray", JSON.stringify(valueArray));

        }
        sessionStorage.setItem(keyCost, JSON.stringify(costObj));
        createOutlayPar(keyCost);
        sumAllValues();

      }else{
        $("#size_cost").addClass("is-invalid");
        $("#size_cost").val('');
        $( "#size_cost" ).focus(function(){$("#size_cost").removeClass("is-invalid");});
      }
    }

  if(sessionStorage.getItem("valueArray") == null){
  $("#button_Add").click(function() {
    addingRows();});
    }else{
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
