anychart.onDocumentReady(function () {
    //crear grafico de columna
    var chart = anychart.column();  

    //Titulo
    chart.title("Resultado de Evaluaciones por Materia");
 
    //datos de grafico
    chart.data([
        {x: 'Espanol', value: 90},
        {x: 'Matematica', value: 85},
        {x: 'Naturales', value: 80},
        {x: 'Sociales', value: 90},
        {x: 'Musica', value: 100}
    ]);
    
//configurar el id donde encontramos el grafico
  chart.container('container');
  //inicializar el grafico
    chart.draw();
});