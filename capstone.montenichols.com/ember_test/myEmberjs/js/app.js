window.Game = Ember.Application.create();

/*Game.ApplicationAdapter = DS.RESTAdapter.extend({
	host: 'http://localhost/myEmberJs',

	suffix: '.json',

	pathForType: function(type) {
		return this._super(type) + this.get('suffix');
	}
});*/

Game.ApplicationAdapter = DS.LSAdapter.extend({
	namespace: 'items-emberjs'
});

//Game.ApplicationAdapter = DS.FixtureAdapter.extend();