<?php
	echo Menu::item([
		"name"=>"Hmsbill",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"hmsbill/create","text"=>"Create Hmsbill","icon"=>"far fa-circle nav-icon"],
			["route"=>"hmsbill","text"=>"Manage Hmsbill","icon"=>"far fa-circle nav-icon"],
		]
	]);
