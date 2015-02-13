@extends('default')


@section('content')

	<link rel="stylesheet" href="../piechart/demo/style.css"/>		
		<center>
		    <h1 style='font-size: 38px;'> Резултати от теста</h1>
		</center>
	
		<!--МАХНИ горния ред и ОТКОМЕНТИРАЙ долния ред (даже може да го оправиш, ако е грешно) -->
		<span class="chart" data-percent="{{$correct/$count*100}}">
			<span class="percent"></span>
			</span>

			<script src="../piechart/dist/easypiechart.js"></script>
			<script>
			document.addEventListener('DOMContentLoaded', function() {
				var chart = window.chart = new EasyPieChart(document.querySelector('span'), {
					easing: 'easeOutElastic',
					delay: 3000,
					barColor: '#3EE835',
					trackColor: '#F24033',
					scaleColor: false,
					lineWidth: 20,
					trackWidth: 16,
					lineCap: 'butt',
					onStep: function(from, to, percent) {
						this.el.children[0].innerHTML = Math.round(percent);
					}
				});


			});
			</script>
		</span>
		
		<font> Верни отговори: {{$correct}}/{{$count}}</font>

		
@stop


