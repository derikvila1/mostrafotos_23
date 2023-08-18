@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
<br>
<div class="ui container">
    <h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Início</h1>


    <div style="width: 400px;">
        <canvas id="myChart" width="200" height="150"></canvas>
        <br><br>
    </div>
</div>

<script>
    inscricao = '{{$inscricao}}';
    console.log(inscricao);

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Inscritos', 'Habilitados', 'Avaliação 1', 'Avaliação 2', 'Recursos'],
            datasets: [{
                label: 'Grafico de Estado',
                data: [inscricao, 0, 0, 0, 0, 0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection