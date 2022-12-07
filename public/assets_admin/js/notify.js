(function($) {
    "use strict";
	
	$('#right').on("click", function(e){
		Notify('Default notification');
	});

	$('#random').on("click", function(e){
		Notify({
			content: '<h5 class="font-weight-semibold">Random Notification</h5><p class="mb-0">Lorem Ipsum available but the majority have suffered</p>',
			color: 'black'
		});
	});

	$('#left').on("click", function(e){
		Notify({
			content: '<h5 class="font-weight-semibold">Left notification</h5><p class="mb-0">Lorem Ipsum available but the majority have suffered</p>',
			position: 'left',
			color: 'green'
		});
	});

	$('#rounded').on("click", function(e){
		Notify({
			content: '<h5 class="font-weight-semibold">Rounded notification</h5><p class="mb-0">Lorem Ipsum available but the majority have suffered</p>',
			rounded: true,
			color: 'blue'
		});
	});

	$('#callback').on("click", function(e){
		Notify({
			content: '<h5 class="font-weight-semibold">Callback Notification</h5><p class="mb-0">Lorem Ipsum available but the majority have suffered</p>',
			color: 'red',
			callback: function () {
				alert('This is a callback');
			}
		});
	});

})(jQuery);