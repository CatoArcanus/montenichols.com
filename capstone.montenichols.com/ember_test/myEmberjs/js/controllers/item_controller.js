Game.ItemController = Ember.ObjectController.extend({
	actions: {
		editItem: function() {
	 		this.set('isEditing', true);
		},
		acceptChanges: function() {
			this.set('isEditing', false);
			if (Ember.isEmpty(this.get('model.name'))) {
				this.send('removeItem');
			} else {
				this.get('model').save();
			}
		},
		removeItem: function() {
			var item = this.get('model');
			item.deleteRecord();
			item.save();
		}
	},

	isEditing: false,
	
	isCompleted: function(key, value){
		var model = this.get('model');

		if (value === undefined) {
			// property being used as a getter
			return model.get('isUsed');
		} else {
			// property being used as a setter
			model.set('isUsed', value);
			model.save();
			return value;
		}
	}.property('model.isUsed'),
	
	suggestedFilename: function() {
		return this.get("model.name").toLowerCase() + ".json";
	}.property("model.name"),

	dataURI: function() {
	return ("data:application/json;charset=UTF-8," + encodeURIComponent(JSON.stringify(this.get("model"))));
	}.property("model")
	
});