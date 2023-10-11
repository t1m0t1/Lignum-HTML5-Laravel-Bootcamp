
$(document).ready(function() {
  
  $('#actorID').select2({
  placeholder: "Select Actor fot Cast",
  dropdownParent: $('#ModalEdit')
});

});


function editMovie(id)
{
    $("#movieID").val(id);

    $.ajax
    ({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'GET',
        url: '/movie/'+id,
        success: (res)=>
        {
        

        $('#imageMovie').attr('src','images/movies/' + res.imageMovie);   
        $('#title').val(res.title);   
        $('#year').val(res.year);   
        $('#duration').val(res.duration);   
        $('#synopsis').val(res.synopsis);      
        
        
        $.ajax
        ({
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'GET',
          url: '/searchCast/'+res.id,
          success: (res)=>
          {

            let actors = res;
            let actorList = $('#listCast');
            for (let i = 0; i < actors.length; i++) {
              let actor = actors[i];
              
              let listItem = $('<li>').text(actor[0].name);
              let buttonDelete = $('<input type="button" value="x" />');
              buttonDelete.css("color","red");
              buttonDelete.css("border","none");
              buttonDelete.css("background-color","white");
              buttonDelete.on("click",function()
              {
                deleteActorToCast(actor[0].id);
              })
              
              listItem.prepend(buttonDelete);
              actorList.append(listItem); }

          }
          
        })
      }
        
    })

}

function addCast()
    {
      let actorID= $("#actorID").select2('val');
      let movieId = $("#movieID").val();
     
      $.ajax(
      {
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: "/addCast/" + movieId + "/" + actorID,
        success: (res)=>
        {
          
        }
      })

    }

function deleteActorToCast(actorID)
    {
      console.log(actorID);
    }

