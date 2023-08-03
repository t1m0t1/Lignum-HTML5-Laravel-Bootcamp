//creamos una funcion de alerta
function mensaje() {
  alert("osea hello!!");
}

//se agrega un evento de "escucha" a la espera de un DOMContentLoaded.
//el cual nos informa cuando el contenido del DOM(Document Object Model) este cargado completamente.
//este asegura que la funcion se ejecute despues de que todos los elementos html y css se hayan cargado.
document.addEventListener("DOMContentLoaded", () => {

    //tomamos el elemtno con el id "hello" y le agregamos la clase "fade"
    document.getElementById("hello").classList.add("fade");

});

//fuentes
//https://www.freecodecamp.org/espanol/news/javascript-dom-events-onclick-and-onload/
//https://developer.mozilla.org/es/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest
//https://developer.mozilla.org/es/docs/Web/API/XMLHttpRequest
//creamos una funcion para obtener los datos de la API (interfaz de programaciono de aplicaciones)
function chucknorris() {
  return new Promise((res, err) => {
    //instaciamos XMLHttpRequest
    const request = new XMLHttpRequest();
    //configuramos la peticion con su respectivo metodo y url de la api a la qque llama
    request.open("GET", "https://api.chucknorris.io/jokes/random");
    //utilizamos el manejador onload que nos permite ejecutar una funcion apenas cargue la pagina
    request.onload = function () {
      //verificamos el estado de la peticion
      if (request.status === 200) {
        //en caso de se correcta parseamos el resultado a formato JSON
        const data = JSON.parse(request.responseText);
        //mostramos el resultado por consola para verificar si es el esperado
        console.log(data);
        //seteamos la respuesta con el valor de la peticion
        res(data.value);
      } else {
        //en caso de que el estado sea distinto a 200 (correcto) emitimos un mensaje de error
        err(new Error("Error al conectar con la API"));
      }
    };
    //creamos una funcion para verificar si hay un error de red
    request.onerror = function () {
      err(new Error("Error de red"));
    };
    //enviamos la peticion
    request.send();
  });
}

//tomamos el elemento con el id "broma-btn" y le agregamos un evento onclick
document.getElementById("broma-btn").addEventListener("click", () => {
  chucknorris()
    //creamos una promesa que va a obtener un valor
    .then((broma) => {
      //en caso de que esta se ejectute correctamente
      //insertamos el formato de texto en el parrafo y le aplicamos un color negro
      document.getElementById("broma").textContent = broma;
      document.getElementById("broma").style.color = "black";
    })
    .catch((err) => {
      //si esta trae un error. insertamos el mensaje de error con un color rojo
      document.getElementById("broma").textContent = err.message;
      document.getElementById("broma").style.color = "red";
    });
});
/* let query= "JavaScript"; */
function search(query) {
  return new Promise((res, err) => {
    const request = new XMLHttpRequest();
    request.open(
      "GET",
      `https://api.github.com/search/repositories?q=${query}`
    );

    request.onload = () => {
      if (request.status === 200) {
        const data = JSON.parse(request.responseText);

        res(data.items);
      } else {
        err(new Error("error"));
      }
    };
    request.onerror = function () {
      err(new Error("Error de red"));
    };
    request.send();
  });
}

function listarRepos() {
  const query = document.getElementById("search").value;
  const lista = document.getElementById("lista-repos");
  lista.innerHTML = "";

  search(query).then((repositorios) => {
    repositorios.forEach((repo) => {
      console.log(repo.name);
      const li = document.createElement("li");
      li.textContent = repo.name;
      lista.appendChild(li);
    });
  });
}
