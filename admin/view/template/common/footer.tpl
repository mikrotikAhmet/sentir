<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="view/assets/js/jquery.min.js"></script>
		<script src="view/assets/js/bootstrap.min.js"></script>
		<script src="view/assets/plugins/retina/retina.min.js"></script>
		<script src="view/assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="view/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="view/assets/plugins/backstretch/jquery.backstretch.min.js"></script>
                
                <?php foreach ($scripts as $script) { ?>
                    <script type="text/javascript" src="<?php echo $script; ?>"></script>
                <?php } ?>

		
</body>
</html>