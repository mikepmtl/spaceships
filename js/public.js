
var Public = Public || {};

Public.namespace = function (ns_string) {

	var parts = ns_string.split('.');
	var parent = Public;
	var i;

	if (parts[0] === 'Public') {
		parts = parts.slice(1);
	}

	for (i = 0; i < parts.length; i += 1) {

		if (typeof parent[parts[i]] === 'undefined') {
			parent[parts[i]] = {};
		}

		parent = parent[parts[i]];
	}

	return parent;
};
