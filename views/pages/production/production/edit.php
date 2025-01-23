<?php
echo Page::title(["title"=>"Edit Production"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"production", "text"=>"Manage Production"]);
echo Page::context_open();
echo Form::open(["route"=>"production/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$production->id"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials","value"=>"$production->material_id"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$production->uom_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$production->product_id"]);
	echo Form::input(["label"=>"Production Date","type"=>"text","name"=>"production_date","value"=>"$production->production_date"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty","value"=>"$production->qty"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status","value"=>"$production->status_id"]);
	echo Form::input(["label"=>"Unit Cost","type"=>"text","name"=>"unit_cost","value"=>"$production->unit_cost"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost","value"=>"$production->total_cost"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
