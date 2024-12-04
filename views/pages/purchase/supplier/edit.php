<?php
echo Page::title(["title"=>"Edit Supplier"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"supplier", "text"=>"Manage Supplier"]);
echo Page::context_open();
echo Form::open(["route"=>"supplier/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$supplier->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$supplier->name"]);
	echo Form::input(["label"=>"Mobile","type"=>"text","name"=>"mobile","value"=>"$supplier->mobile"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$supplier->email"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
