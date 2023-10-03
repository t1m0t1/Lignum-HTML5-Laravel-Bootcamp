function addCast(movieId)
    {
      let actorID= $("#actorID-" + movieId).select2('val');

      $.ajax(
      {
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: "/addCast/" + movieId + "/" + actorID,
        success: (res)=>
        {
          console.log(res);
        }
      })

    }

function editMovie(id)
{
    
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
        }

    })
}
