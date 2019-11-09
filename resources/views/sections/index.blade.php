<html>
	<body>
	<div id='app'>
		Select Sections:
		<select v-on:change='fetchSection' v-model="selectedSect">
		@foreach($sections as $section)
			<option value="{{ $section->id }}">
				{{ $section->name }}
			</option>
		@endforeach
		</select><br><br>
		Students
		<ul>
			<li v-for="student in students">
				@{{ student.last_name }} @{{ student.first_name }} 
			</li>
		</ul>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script>
	var vm = new Vue({
	el: '#app',
  data:{
  	selectedSect: '',
  	students: []
  },
  methods: {
  	fetchSection(){
  		axios.get('/students?section_id='+this.selectedSect)
  		.then(function(response){
  			console.log(response.data);
  			vm.students = response.data;
  		});
  	},
  	computed:{
  		paidS(){
  			return this.students.filter(function(student){
  				return student.id == payment.student_id ;
  			});
  		}
  	}
  }
})
</script>
</html>

