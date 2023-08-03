class Movie extends EventEmitter {
    constructor(titulo, año, duracion) {
      super(); // Llamar al constructor de la clase padre (EventEmitter)
      this.titulo = titulo;
      this.año = año;
      this.duracion = duracion;
    }
  
    play() {
      console.log(`Reproduciendo ${this.titulo}`);
      this.emit('play'); 
    }
  
    pause() {
      console.log(`Pausando ${this.titulo}`);
      this.emit('pause'); 
    }
  
    resume() {
      console.log(`Resumiendo ${this.titulo}`);
      this.emit('resume'); 
    }
  
    addCast(data) {
      if (Array.isArray(data)) {
        console.log(`Se han agregado los siguientes actores al elenco de : ${this.titulo}`)
        data.forEach( (actor) => {
          if (actor instanceof Actor) {
            console.log(`- ${actor.nombre}`);
          } else {
            console.error('Error: Se intentó agregar un objeto que no es instancia de la clase Actor');
          }
        });
      } else if (data instanceof Actor) {
        console.log(`Se ha agregado al actor ${data.nombre} al elenco de ${this.titulo}`);
      } else {
        console.error('Error: Se intentó agregar un objeto que no es instancia de la clase Actor');
      }
    }
  }