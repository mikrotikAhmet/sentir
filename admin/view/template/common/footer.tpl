<?php if ($this->user->isLogged()) { ?>
<!-- BEGIN FOOTER -->
<footer>
    <?php echo $text_footer?><br />
</footer>
<!-- END FOOTER -->

</div><!-- /.page-content -->
</div><!-- /.wrapper -->
<!-- END PAGE CONTENT -->
<?php } ?>


<?php if ($this->user->isLogged()) { ?>
<!-- BEGIN BACK TO TOP BUTTON -->
<div id="back-top">
    <a href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<!-- END BACK TO TOP -->
<?php } ?>
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

<!-- PLUGINS -->
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>

<!-- MAIN APPS JS -->
<script src="view/assets/js/apps.js"></script>
<script src="view/assets/js/common.js"></script>

<script type="text/javascript">
//-----------------------------------------
// Confirm Actions (delete, uninstall)
//-----------------------------------------
$(document).ready(function(){
    // Confirm Delete
    $('#form').submit(function(){
        if ($(this).attr('action').indexOf('delete',1) != -1) {
            if (!confirm('<?php echo $text_confirm; ?>')) {
                return false;
            }
        }
    });
    // Confirm Uninstall
    $('a').click(function(){
        if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
            if (!confirm('<?php echo $text_confirm; ?>')) {
                return false;
            }
        }
    });
        });
    </script>
