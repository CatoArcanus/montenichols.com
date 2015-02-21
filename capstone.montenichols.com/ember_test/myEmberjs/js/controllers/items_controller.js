Game.ItemsController = Ember.ArrayController.extend({
	actions: {
		createItem: function() {
			// Get the item name set by the "New Item" text field
			var name = this.get('newName');
			if (!name.trim()) { return; }

			// Create the new Item model
			var item = this.store.createRecord('item', {
				name: name,
				isUsed: false
			});

			// Clear the "New Item" text field
			this.set('newName', '');

			// Save the new model
			item.save();
		},

		clearUsed: function() {
			console.log('clearUsed');
			var usedItem = this.filterBy('isUsed', true);
			usedItem.invoke('deleteRecord');
			usedItem.invoke('save');	
		}
	},
		
	numRemaining: function() {
		return this.filterBy('isUsed', false).get('length');
	}.property('@each.isUsed'),
	
	numUsed: function() {
		return this.filterBy('isUsed', true).get('length');
	}.property('@each.isUsed'),
	
	hasUsed: function() {
		return (this.get('numUsed') > 0); 
	}.property('numUsed'),
		
	inflection: function() {
		var remaining = this.get('remaining');
		return remaining === 1 ? 'item' : 'items';
	}.property('remaining')
});