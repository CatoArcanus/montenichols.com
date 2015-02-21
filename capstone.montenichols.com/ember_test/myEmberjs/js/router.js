Game.Router.map(function () {
	this.resource('items', { path: '/' }, function () {
		// additional child routes
		this.route('equipped'); 
		this.route('used');   
	});
});

Game.ItemsRoute = Ember.Route.extend({
	model: function () {
		return this.store.find('item');
	}
});

Game.ItemsIndexRoute = Ember.Route.extend({
	model: function () {
		return this.modelFor('items');
	}
});

Game.ItemsEquippedRoute = Ember.Route.extend({
	model: function() {
		return this.store.filter('item', function(item) {
			return item.get('isEquipped');
		});
	},

	renderTemplate: function(controller) {
		this.render('items/index', {controller: controller});
	}
});

Game.ItemsUsedRoute = Ember.Route.extend({
	model: function() {
		return this.store.filter('item', function(item) {
			return item.get('isUsed');
		});
	},

	renderTemplate: function(controller) {
		this.render('items/index', {controller: controller});
	}
});