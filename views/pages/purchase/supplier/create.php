<?php
echo Page::title(["title"=>"Create Supplier"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"supplier", "text"=>"Manage Supplier"]);
echo Page::context_open();
echo Form::open(["route"=>"supplier/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Mobile","type"=>"text","name"=>"mobile"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
