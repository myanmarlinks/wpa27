<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script>
		"use strict";

		var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

		function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

		var Cat = function () {
			function Cat(catName) {
				_classCallCheck(this, Cat);

				this.catName = catName;
			}

			_createClass(Cat, [{
				key: "catRun",
				value: function catRun(act) {
					console.log("CAT " + act);
				}
			}, {
				key: "catEat",
				value: function catEat(thing) {
					console.log("CAT EAT " + thing);
				}
			}]);

			return Cat;
		}();

		var cat = new Cat("Shwe War");
		console.log(cat.catName);
		cat.catRun("FAST");
		cat.catEat("FISH");
		
	</script>
</body>
</html>