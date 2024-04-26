document.addEventListener('DOMContentLoaded', () => {
  const barraProgreso = document.getElementById('barra-progreso');
  const playBtn = document.getElementById('play-btn');
  const limpiarUltimoBtn = document.getElementById('limpiar-ultimo-btn');
  const limpiarTodosBtn = document.getElementById('limpiar-todos-btn');
  let frase = '';

  // Evento click para el botón Play
  playBtn.addEventListener('click', () => {
    hablar(frase);
  });

  // Función para agregar un pictograma al contenedor
  document.addEventListener('DOMContentLoaded', () => {
    const barraProgreso = document.getElementById('barra-progreso');
    let frase = '';
  
    function agregarPictograma(src) {
      // Crear un elemento de imagen
      const img = document.createElement('img');
      img.src = src;
      img.alt = 'Pictograma';
      img.className = 'pictograma';
    
      // Crear un elemento span para el símbolo "+"
      const span = document.createElement('span');
      span.textContent = '+';
      span.className = 'plus';
    
      // Agregar los elementos al contenedor de la barra de progreso
      const barraProgreso = document.getElementById('barra-progreso');
      barraProgreso.appendChild(img);
      barraProgreso.appendChild(span);
    
      // Agregar la palabra al texto de la frase
      const palabra = src.substring(src.lastIndexOf('/') + 1, src.lastIndexOf('.'));
      frase += palabra + ' ';
    }
    

  // Evento click para el botón Limpiar último
  limpiarUltimoBtn.addEventListener('click', () => {
    limpiarUltimoPictograma();
  });

  // Evento click para el botón Limpiar todos
  limpiarTodosBtn.addEventListener('click', () => {
    limpiarTodosPictogramas();
  });


    document.addEventListener('DOMContentLoaded', () => {
      const buttons = document.querySelectorAll('.boton-palabra');
    
      buttons.forEach(button => {
        button.addEventListener('click', () => {
          const palabra = button.getAttribute('data-palabra');
          hablar(palabra);
        });
      });
    
      function hablar(texto) {
        const utterance = new SpeechSynthesisUtterance(texto);
        window.speechSynthesis.speak(utterance);
      }
    });
  

  function limpiarUltimoPictograma() {
    // Eliminar último pictograma de la frase y de la barra de progreso
    const ultimaPalabra = frase.split(' ').pop();
    frase = frase.replace(ultimaPalabra + ' ', '');
    const pictogramas = barraProgreso.querySelectorAll('span');
    if (pictogramas.length > 0) {
      barraProgreso.removeChild(pictogramas[pictogramas.length - 1]);
    }
  }

  function limpiarTodosPictogramas() {
    // Limpiar todos los pictogramas de la frase y de la barra de progreso
    frase = '';
    barraProgreso.innerHTML = '';
  }
});
});