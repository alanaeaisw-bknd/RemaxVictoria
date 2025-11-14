<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas Generales</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style9.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head> 

<body>
    <header>
        @include('nav')
    </header>

    <div class="search">
    <form id="filterForm" action="{{ route('filtrarRegistros') }}" method="GET" class="buscador">
        @csrf
        <label for="fechaInicio" class="fechas">Fecha Inicio</label>
        <input class="inputt" type="date" id="fechaInicio" name="fechaInicio"
               value="{{ request('fechaInicio', date('Y-01-01')) }}" required>

        <label for="fechaFin" class="fechas">Fecha Fin</label>
        <input class="inputt" type="date" id="fechaFin" name="fechaFin"
               value="{{ request('fechaFin', date('Y-12-31')) }}" required>

        <button type="submit" class="lupa-cuad">
            <svg class="lupa" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </form>

    <button type="button" class="btn btn-warning" onclick="window.location.href='{{ url('/registros-cierre') }}'">EDITAR DATOS</button>
</div>
<div class="hit-the-floor">
    <h1>ANALITICAS DE CIERRES</h1>
</div>
<div class="cierres">
    <div class="estadisticas-1">
        <div class="grafica">
            <div class="cabecera">
                <p class="parametro">ESTADISTICAS COMO CERRADOR</p>
            </div>
            <div class="programming-stats">
                <div class="chart-container-mod">
                    <canvas class="my-chart" id="grafica"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="estadisticas-1">
        <div class="grafica">
            <div class="cabecera">
                <p class="parametro">ESTADISTICAS COMO INGRESOS</p>
            </div>
            <div class="programming-stats">
                <div class="chart-container-mod">
                    <canvas class="my-chart" id="graficaIngreso"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="estadisticas">
    <div class="grafica">
        <div class="cabecera">
            <p class="parametro">HISTÓRICO DE OFICINA</p>
        </div>
        <div class="programming-stats">
            <div class="chart-container">
                <canvas class="my-chart" id="graficaOficina"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="estadisticas">
    <div class="grafica">
        <div class="cabecera">
            <p class="parametro">HISTORICO DE CIERRES ACUMULADO</p>
        </div>
        <div class="programming-stats">
            <div class="chart-container">
                <canvas class="my-chart" id="graficaMes"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="estadisticas-1">
    <div class="grafica">
        <div class="cabecera">
            <p class="parametro">ESTADISTICAS COMO DESARROLLADOR</p>
        </div>  
        <div class="programming-stats">
            <div class="chart-container-mod">
                <canvas class="my-chart" id="graficadesarrollador"></canvas>
            </div>
        </div>
    </div>
</div>
    
<br>
<br>
<div class="hit-the-floor">
    <h1>INTELIGENCIA DE MERCADO</h1>
</div>
<div class="estadisticas">
    <div class="grafica">
        <div class="cabecera">
            <p class="parametro">FUENTES DE CONTACTO</p>
        </div>
        <div class="programming-stats">
            <div class="chart-container">
                <canvas class="my-chart" id="graficaFuenteContacto"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="cierres">
    <div class="estadisticas">
        <div class="grafica">
            <div class="cabecera">
                <p class="parametro">ESTADO CIVIL</p>
            </div>
            <div class="programming-stats2">
                <div class="chart-container-cir">
                    <canvas class="my-chart" id="graficaEstadoCivil"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="estadisticas">
        <div class="grafica">
            <div class="cabecera">
                <p class="parametro">GENERO</p>
            </div>
            <div class="programming-stats2">
                <div class="chart-container-cir">
                    <canvas class="my-chart" id="graficaGenero"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="estadisticas">
        <div class="grafica">
            <div class="cabecera">
                <p class="parametro">RANGO DE EDAD</p>
            </div>
            <div class="programming-stats2">
                <div class="chart-container-cir">
                    <canvas class="my-chart" id="graficaRangoEdad"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="estadisticas">
        <div class="grafica">
            <div class="cabecera">
                <p class="parametro">RECURSOS</p>
            </div>
            <div class="programming-stats2">
                <div class="chart-container-cir">
                    <canvas class="my-chart" id="graficaRecurso"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Obtén los datos para la gráfica de barras desde el backend
    var statsData = <?php echo json_encode($stats); ?>;

    // Ordena los datos por el monto total de cierres de mayor a menor
    statsData.sort(function (a, b) {
        return b.total_monto - a.total_monto;
    });

    // Preparar los datos para la gráfica de barras
    var labels = statsData.map(function (stat) {
        return stat.nombre;
    });

    var cierresCount = statsData.map(function (stat) {
        return stat.cierres_count;
    });

    var totalMonto = statsData.map(function (stat) {
        return stat.total_monto;
    });

    // Crear la gráfica de barras vertical
    var ctx = document.getElementById('grafica').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Numero Total',
                    data: cierresCount,
                    backgroundColor: '#2a00b4ff',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Monto Total',
                    data: totalMonto,
                    backgroundColor: '#e74c3c',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';
                        label += ': ' + tooltipItem.yLabel;
                        if (tooltipItem.datasetIndex === 0) {
                            label += ' cierres';
                        } else {
                            label += ' monto: $' + tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        }
                        return label;
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Obtén los datos para la gráfica de barras de "Fuente de Contacto" desde el backend
    var fuenteContactoData = <?php echo json_encode($fuenteContactoStats); ?>;

    // Preparar los datos para la gráfica de barras de "Fuente de Contacto"
    var labelsFuenteContacto = fuenteContactoData.map(function (stat) {
        return stat.fuente_contacto;
    });

    var fuenteContactoCount = fuenteContactoData.map(function (stat) {
        return stat.count;
    });

    // Crear la gráfica de barras para "Fuente de Contacto"
    var ctxFuenteContacto = document.getElementById('graficaFuenteContacto').getContext('2d');
    var myChartFuenteContacto = new Chart(ctxFuenteContacto, {
        type: 'bar',
        data: {
            labels: labelsFuenteContacto,
            datasets: [
                {
                    label: 'Numero de Contactos',
                    data: fuenteContactoCount,
                    backgroundColor: '#3498db',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

   // Obtén los datos para la gráfica de barras de "Ingreso" desde el backend
    var ingresoData = <?php echo json_encode($ingresoStats); ?>;

    // Preparar los datos para la gráfica de barras de "Ingreso"
    var labelsIngreso = ingresoData.map(function (stat) {
        return stat.ingreso;
    });

    var ingresoCount = ingresoData.map(function (stat) {
        return stat.count;
    });

    var montoTotalIngreso = ingresoData.map(function (stat) {
        return stat.monto_total || 0; // Asegurar que monto_total esté definido y manejar el caso en que sea nulo
    });

// Crear la gráfica de barras para "Ingreso"
var ctxIngreso = document.getElementById('graficaIngreso').getContext('2d');
var myChartIngreso = new Chart(ctxIngreso, {
    type: 'bar',
    data: {
        labels: labelsIngreso,
        datasets: [
            {
                label: 'Número Total',
                data: ingresoCount,
                backgroundColor: '#3498db',
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Monto Total',
                data: montoTotalIngreso,
                backgroundColor: '#2121f3ff',
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// === GRÁFICA DE DESARROLADOR ===
var desarrolladorData = <?php echo json_encode($desarrolladorStats); ?>;

// Ordenar por monto total
desarrolladorData.sort(function (a, b) {
    return b.total_monto_desarrollador - a.total_monto_desarrollador;
});

var labelsdesarrollador = desarrolladorData.map(function (stat) {
    return stat.nombre;
});

var desarrolladorCount = desarrolladorData.map(function (stat) {
    return stat.desarrollador_count;
});

var desarrolladorMonto = desarrolladorData.map(function (stat) {
    return stat.total_monto_desarrollador;
});

var ctxdesarrollador = document.getElementById('graficadesarrollador').getContext('2d');
var myChartdesarrollador = new Chart(ctxdesarrollador, {
    type: 'bar',
    data: {
        labels: labelsdesarrollador,
        datasets: [
            {
                label: 'Número Total',
                data: desarrolladorCount,
                backgroundColor: '#8e44ad',
                borderColor: '#5e3370',
                borderWidth: 1
            },
            {
                label: 'Monto Total',
                data: desarrolladorMonto,
                backgroundColor: '#9b59b6',
                borderColor: '#5e3370',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});

    // Obtén los datos para la gráfica de pastel de "Estado Civil" desde el backend
    var estadoCivilData = <?php echo json_encode($estadoCivilStats); ?>;

    // Preparar los datos para la gráfica de pastel de "Estado Civil"
    var labelsEstadoCivil = estadoCivilData.map(function (stat) {
        return stat.estado_civil;
    });

    var estadoCivilCount = estadoCivilData.map(function (stat) {
        return stat.count;
    });

    // Crear la gráfica de pastel para "Estado Civil"
    var ctxEstadoCivil = document.getElementById('graficaEstadoCivil').getContext('2d');
    var myChartEstadoCivil = new Chart(ctxEstadoCivil, {
        type: 'pie',
        data: {
            labels: labelsEstadoCivil,
            datasets: [
                {
                    data: estadoCivilCount,
                    backgroundColor: ['#3498db', '#e74c3c', '#e74c3c', '#f39c12']
                }
            ]
        }
    });

    // --- GRÁFICA DE MES ---
    var mesData = <?php echo json_encode($mesStats); ?>;

    // Preparar los datos para la gráfica de barras por mes
    var labelsMes = mesData.map(function (stat) {
        return stat.month_name; // Utilizar el nombre del mes en lugar del número
    });

    var mesCount = mesData.map(function (stat) {
        return stat.cierres_count;
    });

    // Crear la gráfica de barras por mes
    var ctxMes = document.getElementById('graficaMes').getContext('2d');
    var myChartMes = new Chart(ctxMes, {
        type: 'bar',
        data: {
            labels: labelsMes,
            datasets: [{
                label: 'Cierres Mensuales',
                data: mesCount,
                backgroundColor: '#0a29f4ff',
            }]
        }
    });

    // Obtén los datos para la gráfica de pastel de "Género" desde el backend
    var generoData = <?php echo json_encode($generoStats); ?>;

    // Preparar los datos para la gráfica de pastel de "Género"
    var labelsGenero = generoData.map(function (stat) {
        return stat.genero;
    });

    var generoCount = generoData.map(function (stat) {
        return stat.count;
    });

    // Crear la gráfica de pastel para "Género"
    var ctxGenero = document.getElementById('graficaGenero').getContext('2d');
    var myChartGenero = new Chart(ctxGenero, {
        type: 'pie',
        data: {
            labels: labelsGenero,
            datasets: [
                {
                    data: generoCount,
                    backgroundColor: ['#3498db', '#e74c3c', '#e74c3c', '#f39c12']
                }
            ]
        }
    });

    // Obtén los datos para la gráfica de pastel de "Rango de Edad" desde el backend
    var rangoEdadData = <?php echo json_encode($rangoEdadStats); ?>;

    // Preparar los datos para la gráfica de pastel de "Rango de Edad"
    var labelsRangoEdad = rangoEdadData.map(function (stat) {
        return stat.rango_edad;
    });

    var rangoEdadCount = rangoEdadData.map(function (stat) {
        return stat.count;
    });

    // Crear la gráfica de pastel para "Rango de Edad"
    var ctxRangoEdad = document.getElementById('graficaRangoEdad').getContext('2d');
    var myChartRangoEdad = new Chart(ctxRangoEdad, {
        type: 'pie',
        data: {
            labels: labelsRangoEdad,
            datasets: [
                {
                    data: rangoEdadCount,
                    backgroundColor: ['#3498db', '#e74c3c', '#e74c3c', '#f39c12', '#9b59b6']
                }
            ]
        }
    });
    // Obtén los datos para la gráfica de pastel de "Recurso" desde el backend
    var recursoData = <?php echo json_encode($recursoStats); ?>;

    // Preparar los datos para la gráfica de pastel de "RecurSO"
    var labelsRecurso = recursoData.map(function (stat) {
        return stat.recurso;
    });

    var recursoCount = recursoData.map(function (stat) {
        return stat.count;
    });

    // Crear la gráfica de pastel para "Recurso"
    var ctxRecurso = document.getElementById('graficaRecurso').getContext('2d');
    var myChartRecurso = new Chart(ctxRecurso, {
        type: 'pie',
        data: {
            labels: labelsRecurso,
            datasets: [
                {
                    data: recursoCount,
                    backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#f39c12']
                }
            ]
        }
    });
    
    
    // =================================================================
    // === SECCIÓN DE GRÁFICA "HISTÓRICO DE OFICINA" ===
    // =================================================================

    // 1. Obtener los datos (la variable $oficinaStats que pasamos desde el controlador)
    var oficinaData = <?php echo json_encode($oficinaStats); ?>;

    // 2. Preparar los datos para Chart.js
    var labelsOficina = oficinaData.map(function (stat) {
        return stat.month_name; // Nombres de los meses (ej: "Enero")
    });

    var dataOficina = oficinaData.map(function (stat) {
        return parseFloat(stat.total_ganado_oficina) || 0; 
    });

    // 3. Calcular la suma total
    const sumaTotalOficina = dataOficina.reduce(function(acumulador, valorActual) {
        return acumulador + valorActual;
    }, 0); // Inicia el acumulador en 0

    // 4. Formatear la suma como moneda
    const formatterOficina = new Intl.NumberFormat('es-MX', {
        style: 'currency',
        currency: 'MXN', // O la moneda que uses (ej: 'USD')
        minimumFractionDigits: 2
    });
    const totalFormateadoOficina = formatterOficina.format(sumaTotalOficina);
    
    // 5. Crear la etiqueta para la leyenda
    const leyendaConTotal = `Monto Total : ${totalFormateadoOficina})`;


    // 6. Crear la gráfica de la Oficina 
    var ctxOficina = document.getElementById('graficaOficina').getContext('2d');
    var myChartOficina = new Chart(ctxOficina, {
        type: 'bar',
        data: {
            labels: labelsOficina,
            datasets: [{
                label: leyendaConTotal, 
                data: dataOficina,
                backgroundColor: '#000000ff',
                borderColor: '#ffffffff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Formatear el eje Y como moneda
                        callback: function(value, index, values) {
                            return '$' + value.toLocaleString('es-MX');
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        // Formatear el tooltip (al pasar el mouse) como moneda
                        label: function(context) {
                            let label = context.dataset.label || '';
                            
                            if (label.includes('(')) {
                                label = 'Monto Total Ganado por Mes';
                            }

                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('es-MX', {
                                    style: 'currency',
                                    currency: 'MXN' // Puedes cambiar MXN si usas otra moneda
                                }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
    
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>