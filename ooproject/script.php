<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<script>
		var dog = new Object() // prototype
		dog.color = "Black" // property
		dog.run = function(act) { // method
			console.log(act + " RUN!");
		}

		dog.eat = function(thing) { // method
			console.log("Dog eat " + thing);
		}
		console.log(dog.color)
		dog.run("FAST")
		dog.eat("BONE")

		var cat = {
			color : "Yellow",
			run: function(act) {
				console.log(act + " RUN!")
			},
			eat: function(thing) {
				console.log("Cat eat " + thing)	
			}
		}

		console.log(cat.color)
		cat.run("SLOW")
		cat.eat("FISH")
	</script>
</body>
</html>