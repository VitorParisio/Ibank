@if($message = Session::get('accept'))
	<div id="accept"></div>
	<script type="text/javascript">
		document.getElementById("accept").innerHTML = "<span class='accept'>{{$message}}</span>";
		setInterval(() => {
			document.getElementById("accept").innerHTML = "";
		}, 3000)
	</script>
@endif

@if($message = Session::get('error'))
	<div id="error"></div>
	<script type="text/javascript">
		document.getElementById("error").innerHTML = "<span class='error'>{{$message}}</span>";
		setInterval(() => {
			document.getElementById("error").innerHTML = "";
		}, 3000)
	</script>
@endif