/**
 * Funciones auxiliares de javascripts 
 */
 function confirmarBorrar(nombre,id){
    if (confirm("¿Quieres eliminar el Producto:  "+nombre+"?"))
    {
     document.location.href="?orden=Borrar&id="+id;
    }
  }