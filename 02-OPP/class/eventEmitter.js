class EventEmitter {
  constructor() {
    this.events = [];
  }

  on(nombreEvento, callback) {
    //Se preguntas si el nombre de evento no existe, 
    if (!this.events[nombreEvento]) {
      // En caso de no existir se agrega el nombre de el evento como atributo y un array vacio para contener sus respectivos cb
      this.events[nombreEvento] = [];
    }
    //luego se agrega el cb al array con el nombre del evento
    this.events[nombreEvento].push(callback);
  }

  emit(nombreEvento) {
    // Se consulta si el evento existe dentro de events
    if (this.events[nombreEvento]) {
      //Se ejecuta cada uno de los cb asociados a estet evento
      this.events[nombreEvento].forEach((callback) => callback());
    }
  }

  off(nombreEvento, callback) {
    if (this.events[nombreEvento]) {
      // Se remplaza el array del evento por otro array que no contenga los cb pasados por parametro
      this.events[nombreEvento] = this.events[nombreEvento].filter(
        (cb) => cb !== callback
      );
    }
  }
}
