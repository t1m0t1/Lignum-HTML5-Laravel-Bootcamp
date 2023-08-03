
function pintarTabla(matriz){
    
    const tabla= document.createElement('table');
    const encabezado= document.createElement('thead');
    const lineaEncabezado = document.createElement('tr');
    for (const item in matriz[0]){
        const col= document.createElement('th');
        const text= document.createTextNode(item);
        col.appendChild(text);
        lineaEncabezado.appendChild(col);
    }
    
    encabezado.appendChild(lineaEncabezado);
    tabla.appendChild(encabezado);
    
    const cuerpo= document.createElement('tbody');
    
    matriz.forEach(element => {
        const tupla= document.createElement('tr');
        
        for(const key in element){
            const data= document.createElement('td');
            const textTupla = document.createTextNode(element[key]);
            data.appendChild(textTupla);
            tupla.appendChild(data);
        }
        cuerpo.appendChild(tupla);
    });

    tabla.appendChild(cuerpo);
    
    return tabla;

};


var matriz = [
    { nombre: 'Juan', edad: 30, ciudad: 'Madrid' },
    { nombre: 'María', edad: 25, ciudad: 'Barcelona' },
    { nombre: 'Carlos', edad: 28, ciudad: 'Valencia' },
  ];



document.addEventListener("DOMContentLoaded",()=>{
    const tabla = pintarTabla(matriz);
    document.body.appendChild(tabla);
})