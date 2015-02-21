/*global Buttons, DS */
(function () {
	'use strict';

	Todos.Button = DS.Model.extend({
		name: DS.attr('string')//,
	});
	
	Todos.Button.FIXTURES = 
	[
		{
			id: 1,
			name: 'Button1'
		},
		{
			id: 2,
			name: 'button2',
			isCompleted: false
		}
	];
	
})();
