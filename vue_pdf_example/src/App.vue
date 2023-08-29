<template>
  <div>
    <button @click="generatePDF">Generar PDF</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  methods: {
    generatePDF() {
      const data = {
        id: 123,
        nombre: 'Nombre del PDF',
        version: '1.0',
        cg: ['Componente 1', 'Componente 2'],
        trabajo_tarea: ['Trabajo 1', 'Trabajo 2'],
      };
      console.log(data);

      axios.post('http://localhost:8000/api/generate-pdf', { data }, {
        responseType: 'blob',
        headers: {
          'Content-Type': 'application/json',
        },
      })
      .then(response => {        
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'mi-archivo.pdf';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
      })
      .catch(error => {
        console.error(error);
      });
    },
  },
};
</script>
