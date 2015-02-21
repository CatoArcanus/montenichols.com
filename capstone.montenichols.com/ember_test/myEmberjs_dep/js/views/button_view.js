App.ButtonView = App.View.extend({
	templateName : 'Button',
	
	init: function() {
		this._super();
		this._poll();
	},
	
	_poll: function() {
		var self = this;
		$.ajax({
			type: 'post',
			url: 'button/get_btn.php',
			contentType: 'application/json',
			dataType: 'json',
			data: "{}"			
		}).done(function(data) {
			self.set('context', data);
			setTimeout(function() { self.poll()}, 1000);
		})
	}
});