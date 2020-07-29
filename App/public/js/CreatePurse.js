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


  // $("#valuePurse");
  
