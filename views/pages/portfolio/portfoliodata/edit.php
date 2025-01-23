<?php
echo Page::title(["title"=>"Edit PortfolioData"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"portfoliodata", "text"=>"Manage PortfolioData"]);
echo Page::context_open();
echo Form::open(["route"=>"portfoliodata/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$portfoliodata->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$portfoliodata->name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$portfoliodata->email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone","value"=>"$portfoliodata->phone"]);
	echo Form::input(["label"=>"Message","type"=>"text","name"=>"message","value"=>"$portfoliodata->message"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
