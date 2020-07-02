$(document).ready(function () {
                  $('.searchName').on('keyup',function() {
                    let targetRespons = $(this).next('.result-search-names');
                    let query = {
                            data: $(this).val()}

                      $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                      $.ajax({
                        dataType: "json",
                        method: "get",
                        url: "all/searchName",
                        context: targetRespons,
                        data: query,
                        success: function (data) {
                            if($(this).children().length > 0){
                              $(this).html("");
                          }

                          for (let key in data){
                            $(this).append("<ol id='elemId"+data[key]['id']+"'>"+ data[key]['name'] + " | " + data[key]['email']+"</ol>");
                            $(this).css({position:'absolute', background:'white', overflow:'auto', width:'93%', "max-height":'140%', "padding-left": '0'});
                            $(this).children().css('padding-top', '10px');
                            $(this).children().addClass('dropdown-item border border-top-0');
                              }
                            let idOutlay = $(this).parents(".modal").attr("id").substr(13);
                            let existingPowersUsers = $('input').filter(function() {
                              return this.name.match(/(nameId)\d+/);
                            });
                            existingPowersUsers.each(function(index, value){
                              let elemId = "#elemId" + value['value'];
                              if($('.result-search-names').children(elemId).is(elemId)==true){
                                $('.result-search-names').children(elemId).remove();
                              }
                            });
                        }
                    });
                });
            });

            $('.result-search-names').on('click', 'ol', function(){
                  var value = $(this).text();
                  $('.searchName').val(value);
                  $('.result-search-names').children().remove();

              });
