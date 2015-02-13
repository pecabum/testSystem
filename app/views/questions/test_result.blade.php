@extends('default')


@section('content')

	<link rel="stylesheet" href="../piechart/demo/style.css"/>		
		<!--Пешо, тук трябва да подадеш параметри. $correct_answers, $question_count. 
			Виж дали правилно сме ги използвали по коментарите -->
		<center>
		    <h1 style='font-size: 38px;'> Резултати от теста</h1>
		</center>
	
		<span class="chart" data-percent="45">
		<!--МАХНИ горния ред и ОТКОМЕНТИРАЙ долния ред (даже може да го оправиш, ако е грешно) -->
		<!--<span class="chart" data-percent="{{$correct_answers/$question_count*100}}">-->
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
		
		<!--Тук също се използват същите параметри-->
		<font style="padding-left:2.5em"> Верни отговори: 9/20</font>
		<!--<font> Верни отговори: {{$correct_answers}}/{{$question_count}}</font>-->

		
@stop


