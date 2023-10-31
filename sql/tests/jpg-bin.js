const fs = require("fs");

// Obtiene las rutas de los archivos JPG y de destino desde los argumentos de la línea de comandos
const rutaArchivoJPG = process.argv[2];
const rutaArchivoBinario = process.argv[3];

if (!rutaArchivoJPG || !rutaArchivoBinario) {
  console.error(
    "Debes proporcionar las rutas de los archivos JPG y de destino.",
  );
  console.log("Uso: node tu_programa.js ruta_a_imagen.jpg ruta_a_archivo.bin");
  process.exit(1);
}

// Lee el archivo JPG
fs.readFile(rutaArchivoJPG, (error, data) => {
  if (error) {
    console.error("Error al leer el archivo JPG:", error);
    return;
  }

  // Escribe los datos binarios en un archivo binario
  fs.writeFile(rutaArchivoBinario, data, "binary", (error) => {
    if (error) {
      console.error("Error al escribir el archivo binario:", error);
      return;
    }

    console.log("Archivo binario creado con éxito en", rutaArchivoBinario);
  });
});
