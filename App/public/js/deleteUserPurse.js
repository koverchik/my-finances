$(document).ready(function () {
  $('.deleteName').click(function(){

    let idUser = $(this).siblings("input[name='idUser']").val();
    let idPurse = $(this).siblings("input[name='idPurse']").val();
     let query = {idUser: idUser,
                  idPurse: idPurse}
     let targetRespons = $('#deleteName'+ idUser+idPurse);

       $.ajaxSetup({
           headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         })
       $.ajax({
           dataType: "json",
           method: "post",
           url: "http://127.0.0.1:8001/home/purse/userDelete",
           context: targetRespons,
           data: query,
           success: function (data) {
              
              let targetId = targetRespons.attr("id");
              $(targetRespons).on('hidden.bs.modal', function() {
              $('div[data-target ="#'+ targetId +'"]').parent().replaceWith("<div class='row'><div class='text-center col-12 pt-2 pb-2'> Пользователь из таблицы «"+ data['name'] + "» удален</div></div>");
              });
             }
           });
         })
       })
