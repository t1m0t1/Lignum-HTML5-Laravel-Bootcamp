//creamos una funcion de alerta
function mensaje() {
  alert("osea hello!!");
}
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
      request.open('GET', 'https://api.chucknorris.io/jokes/random');
      //utilizamos el manejador onload que nos permite ejecutar una funcion apenas cargue la pagina
      request.onload = function () {
        //verificamos el estado de la peticion
        if (request.status === 200) {
          //en caso de se correcta parseamos el resultado a formato JSON
          const data = JSON.parse(request.responseText);
          //mostramos el resultado por consola para verificar si es el esperado
          console.log(data)
          //seteamos la respuesta con el valor de la peticion
          res(data.value);
        } else {
          //en caso de que el estado sea distinto a 200 (correcto) emitimos un mensaje de error
          err(new Error('Error al conectar con la API'));
        }
      };
      //creamos una funcion para verificar si hay un error de red
      request.onerror = function () {
        err(new Error('Error de red'));
      };
      //enviamos la peticion
      request.send();
    });
  }

//tomamos el elemento con el id "broma-btn" y le agregamos un evento onclick
  document.getElementById('broma-btn').addEventListener('click', () => {
    chucknorris()
    //creamos una promesa que va a obtener un valor
      .then((broma) => {
        //en caso de que esta se ejectute correctamente
        //insertamos el formato de texto en el parrafo y le aplicamos un color negro
        document.getElementById('broma').textContent = broma;
        document.getElementById('broma').style.color = 'black';
      })
      .catch((err) => {
        //si esta trae un error. insertamos el mensaje de error con un color rojo
        document.getElementById('broma').textContent = err.message;
        document.getElementById('broma').style.color = 'red';
      });
  });