		<script src="/forum/js/jquery.min.js"></script>
		<script src="/forum/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$(".confirm").on("click", function(e) {
				if(!confirm("Você confirma a sua ação?")) {
					e.preventDefault();
				}
			});
		</script>
	</body>
</html>
