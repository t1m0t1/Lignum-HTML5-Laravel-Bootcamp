$("#select2MovieID").select2({
    dropdownParent: $("#modalEditActor"),
});

window.addEventListener('instanciar-select2',function(){
    $("#select2MovieID").select2({
        dropdownParent: $("#modalEditActor"),
    });
})


function editMovie(id) {
    /* $("#actorID").select2("val", " "); */
    $("#movieID").val(id);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "GET",
        url: "/movie/" + id,
        success: (res) => {
            $("#imageMovie").attr("src", "images/movies/" + res.imageMovie);
            $("#title").val(res.title);
            $("#year").val(res.year);
            $("#duration").val(res.duration);
            $("#synopsis").val(res.synopsis);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                method: "GET",
                url: "/searchCast/" + res.id,
                success: (res) => {
                  let data= res[1];

                    $.each(data, function(indice,fila){
                        $("#actorID").append('<option value="'+fila.id+'">'+fila.name +'</option>')
                    })

                  $("#actorID").select2({
                    placeholder: "Select Actor fot Cast",
                    dropdownParent: $("#ModalEdit"),
                });

                    let actors = res[0];
                    let actorList = $("#listCast");
                    actorList.empty();

                    for (let i = 0; i < actors.length; i++) {
                        let actor = actors[i];

/*                         $("#actorID")
                            .find("option[value=" + actor[0].id + "]")
                            .remove(); */

                        let listItem = $("<li>").text(actor[0].name);
                        listItem.attr("id", "li-actor-" + actor[0].id);

                        let buttonDelete = $(
                            '<input type="button" value="x" />'
                        );
                        buttonDelete.css("color", "red");
                        buttonDelete.css("border", "none");
                        buttonDelete.css("background-color", "white");
                        buttonDelete.on("click", function () {
                            deleteActorToCast(actor[0].id);
                        });

                        listItem.prepend(buttonDelete);
                        actorList.append(listItem);
                    }

                    $("#actorID").select2("val", " ");
                },
            });
        },
    });
}

function addCast() {
    let actorID = $("#actorID").select2("val");
    let movieId = $("#movieID").val();

    if (actorID != null) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            method: "POST",
            url: "/addCast/" + movieId + "/" + actorID,
            success: (res) => {
                console.log("addCast " + res);
                editMovie(movieId);
            },
        });
    }
}

function deleteActorToCast(actorID) {
    let movieID = $("#movieID").val();
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "DELETE",
        url: "/deleteActorToCast/" + movieID + "/" + actorID,
        success: (res) => {
            /* $("#li-actor-" + actorID).remove(); */
            console.log(res);
            editMovie(movieID);
        },
    });
}

