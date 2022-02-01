</section>



<script>
const base_url = '<?= base_url() ?>'
</script>
<script src="<?= media() ?>/js/helpers.js"></script>
<script src="<?= media() ?>/js/helpers-login.js"></script>
<script src="<?= media() ?>/js/plugins/sweetalert.min.js"></script>

<?php if(isset($data['page_functions_js'])) { ?>
<script src="<?= media() ?>/js/<?= $data['page_functions_js'] ?>"></script>
<?php } ?>

</body>

</html>