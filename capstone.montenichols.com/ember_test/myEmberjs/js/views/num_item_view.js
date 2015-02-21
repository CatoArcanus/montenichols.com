Game.NumItemView = Game.View.extend({
	templateName: 'num_inventory_view',
	
	init: function() {
		this.super();
		this.poll();
		this.set('context', {});
	},
	
	poll: function() {
		var self = this;
		$.ajax({
			type: 'post',
			url: '/get_inv.json',
			contentType: "application/json",
			dataType: 'json',
			data: "{}"		
		}).done(function(data) {
			self.set('context.calendar', data);
			setTimeout(function() { self.poll() }, 1000);			
		})
	}
});

$(document).ready(function() {
	
});