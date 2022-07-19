anychart.onDocumentReady(function() {
    // crear el grafico
    var chart = anychart.pie();
 
    // verificar data
    chart.data([
        ["Expañol", 90],
        ["Matematicas", 85],
        ["Ciencias Sociales", 70],
        ["Ciencias Naturales", 100],
        ["Musica", 85]
    ]);
 
    // configurar titulo
    chart.title('Resultados de Evaluaciones por Materia');
    
    // set container id for the chart
    chart.container('container2');
 
    // initiate chart drawing
    chart.draw();
});