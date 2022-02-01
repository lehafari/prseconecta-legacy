<?php if (!empty($data['dashboard-dark'])) { ?>
</section>
<?php } ?>


<script>
const base_url = '<?= base_url() ?>'
</script>

<?php if (!empty($data['jquery'])) { ?>
<script src="<?= media() ?>/js/plugins/jquery.js"></script>
<script src="<?= media() ?>/js/plugins/bootstrap.bundle.js"></script>
<?php } ?>

<?php if (!empty($data['datatable'])) { ?>
<script src="<?= media() ?>/js/plugins/jquery.dataTables.min.js"></script>
<script src="<?= media() ?>/js/plugins/dataTables.bootstrap.min.js"></script>
<?php } ?>
<?php if (isset($data['swal'])) { ?>
<script src="<?= media() ?>/js/plugins/sweetalert2.min.js"></script>
<?php } ?>
<script src="<?= media() ?>/js/plugins/sweetalert.min.js"></script>

<?php if (!empty($data['selectpicker'])) { ?>
<script src="<?= media() ?>/js/plugins/bootstrap-select.min.js"></script>
<?php } ?>

<?php if (!empty($data['clipboard'])) { ?>
<script src="<?= media() ?>/js/plugins/clipboard.js"></script>
<?php } ?>
<?php if (!empty($data['tinymce'])) { ?>
<script src="<?= media() ?>/js/tinymce/tinymce.min.js"></script>
<?php } ?>

<?php if (isset($data['dropzone'])) { ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js">
</script>
<?php } ?>

<?php if (isset($data['datepickerjquery'])) { ?>
<script src="<?= media() ?>/js/datepicker/jquery-ui.min.js"></script>

<?php } ?>
<?php if (isset($data['highcharts'])) { ?>
<script src="<?= media() ?>/js/highcharts/compress-hightcharts.js"></script>
<?php } ?>
<?php if (isset($data['fileinput'])) { ?>
<script src="<?= media() ?>/js/plugins/fileinput.min.js"></script>
<?php } ?>
<?php if (!empty($data['axios'])) { ?>
<script src="<?= media() ?>/js/plugins/axios.js"></script>
<?php } ?>
<?php if (!empty($data['sortable'])) { ?>
<script src="<?= media() ?>/js/plugins/sortable.js"></script>
<?php } ?>
<?php if (!empty($data['dashboard-dark'])) { ?>
<script src="<?= media() ?>/js/helpers-admin.js"></script>
<script src="<?= media() ?>/js/main.js"></script>
<?php } else { ?>
<script src="<?= media() ?>/js/helpers.js"></script>
<?php } ?>



<?php if (!empty($data['page_functions_js'])) { ?>
<script src="<?= media() ?>/js/<?= $data['page_functions_js'] ?>"></script>
<?php } ?>

</body>

</html>