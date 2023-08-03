 class Pelicula {
    constructor(titulo, año, duracion) {
      this.titulo = titulo;
      this.año = año;
      this.duracion = duracion;
    }
  
    play() {
      console.log(`La pelicula ${this.titulo} se esta reproduciendo`);
    }
    pause() {
      console.log(`La pelicula ${this.titulo} se ha pausado`);
    }
    resume() {
      console.log(`La pelicula ${this.titulo} se ha reanudado su reproduccion`);
    }
  }