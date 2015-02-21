Game.Item = DS.Model.extend({
	name: DS.attr('string'),
	isEquipped: DS.attr('boolean'),
	isUsed: DS.attr('boolean')
});

Game.Item.FIXTURES = [
	{
		id: 1,
		name: 'Sword',
		isEquipped: true,
		isUsed: false
	},
	{
		id: 2,
		name: 'Shield',
		isEquipped: false,
		isUsed: false
	},
	{
		id: 3,
		name: 'Potion',
		isEquipped: false,
		isUsed: true
	}
];