$(document).ready(function() {
    $('#addCategoriaForm').on('submit', function(event) {
      event.preventDefault();
      
      const categoriaNombre = $('#categoriaNombre').val().trim();
      const categoriaDescripcion = $('#categoriaDescripcion').val().trim();
      
      if (categoriaNombre !== '' && categoriaDescripcion !== '') {
        // Datos a enviar
        const formData = {
          nombre: categoriaNombre,
          descripcion: categoriaDescripcion
        };
        
        // Enviar solicitud POST a la API
        $.ajax({
          url: './php/addCategorias.php',
          type: 'POST',
          data: formData,
          success: function(response) {
            try {
              const data = JSON.parse(response);
              if (data.success) {
                // Añadir nueva categoría a la interfaz de usuario si la solicitud fue exitosa
                const newTabId = categoriaNombre.toLowerCase().replace(/\s+/g, '-') + '-tab';
                const newTabContentId = categoriaNombre.toLowerCase().replace(/\s+/g, '-');
                
                const newNavItem = document.createElement('li');
                newNavItem.classList.add('nav-item');
                newNavItem.setAttribute('role', 'presentation');
                
                const newButton = document.createElement('button');
                newButton.classList.add('nav-link');
                newButton.setAttribute('id', newTabId);
                newButton.setAttribute('data-bs-toggle', 'tab');
                newButton.setAttribute('data-bs-target', `#${newTabContentId}`);
                newButton.setAttribute('type', 'button');
                newButton.setAttribute('role', 'tab');
                newButton.setAttribute('aria-controls', newTabContentId);
                newButton.setAttribute('aria-selected', 'false');
                newButton.innerHTML = `<img src="img/pictogramas.png" width="30"> ${categoriaNombre}`;
                
                newNavItem.appendChild(newButton);
                
                document.getElementById('myTab').appendChild(newNavItem);
                
                const newTabContent = document.createElement('div');
                newTabContent.classList.add('tab-pane', 'fade');
                newTabContent.setAttribute('id', newTabContentId);
                newTabContent.setAttribute('role', 'tabpanel');
                newTabContent.setAttribute('aria-labelledby', newTabId);
           
                
                document.querySelector('.tab-content').appendChild(newTabContent);
                
                // Reset the form
                $('#addCategoriaForm')[0].reset();
                
                // Close the modal
                const addCategoriasModal = bootstrap.Modal.getInstance(document.getElementById('addCategoriasModal'));
                addCategoriasModal.hide();
              } else {
                console.error('Error:', data.error);
              }
            } catch (error) {
              console.error('Error parsing JSON:', error);
            }
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
      }
    });
  });
  