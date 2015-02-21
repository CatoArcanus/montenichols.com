/*global Ember, DS, Todos:true */
window.Todos = Ember.Application.create();

//Hard coded data for testing
//Todos.ApplicationAdapter = DS.FixtureAdapter.extend();

// dynamic data using models
///*
Todos.ApplicationAdapter = DS.LSAdapter.extend({
	namespace: 'todos-emberjs'
});
//*/