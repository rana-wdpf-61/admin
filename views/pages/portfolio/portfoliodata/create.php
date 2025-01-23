<?php
echo Page::title(["title"=>"Create PortfolioData"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"portfoliodata", "text"=>"Manage PortfolioData"]);
echo Page::context_open();
echo Form::open(["route"=>"portfoliodata/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone"]);
	echo Form::input(["label"=>"Message","type"=>"text","name"=>"message"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
