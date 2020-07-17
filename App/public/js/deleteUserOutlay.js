$(document).ready(function () {
  $('.deleteName').click(function(){
     let query = {data: $(this).attr("id")};
     let targetRespons = $('#deleteName'+ $(this).attr("id"));
       $.ajaxSetup({
           headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         })
       $.ajax({
           dataType: "json",
           method: "post",
           url: "all/deleteName/",
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
