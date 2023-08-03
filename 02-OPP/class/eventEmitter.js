class EventEmitter {
  constructor() {
    this.events = [];
  }

  on(nombreEvento, callback) {
    if (!this.events[nombreEvento]) {
      this.events[nombreEvento] = [];
    }
    this.events[nombreEvento].push(callback);
  }

  emit(nombreEvento) {
    if (this.events[nombreEvento]) {
      this.events[nombreEvento].forEach((callback) => callback());
    }
  }

  off(nombreEvento, callback) {
    if (this.events[nombreEvento]) {
      this.events[nombreEvento] = this.events[nombreEvento].filter(
        (cb) => cb !== callback
      );
    }
  }
}
