<script src="<?= base_url('assets/js/app.js') ?>"></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var flashdata = JSON.parse(document.getElementById('flashdata').innerHTML.trim());

		if ('failed' in flashdata) {
			window.notyf.open({
				type: 'error',
				message: flashdata.failed,
				duration: 5000,
				ripple: false,
				dismissible: true,
				position: {
					x: 'right',
					y: 'top'
				}
			});
		}

		if ('success' in flashdata) {
			window.notyf.open({
				type: 'success',
				message: flashdata.success,
				duration: 5000,
				ripple: false,
				dismissible: true,
				position: {
					x: 'right',
					y: 'top'
				}
			});
		}
	});
</script>
