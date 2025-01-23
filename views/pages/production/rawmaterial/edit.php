<?php
echo Page::title(["title"=>"Edit RawMaterial"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"rawmaterial", "text"=>"Manage RawMaterial"]);
echo Page::context_open();
echo Form::open(["route"=>"rawmaterial/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$rawmaterial->id"]);
	echo Form::input(["label"=>"Material Name","type"=>"text","name"=>"material_name","value"=>"$rawmaterial->material_name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$rawmaterial->description"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$rawmaterial->quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$rawmaterial->uom_id"]);
	echo Form::input(["label"=>"Cost Per Unit","type"=>"text","name"=>"cost_per_unit","value"=>"$rawmaterial->cost_per_unit"]);
	echo Form::input(["label"=>"Supplier Id","type"=>"text","name"=>"supplier_id","value"=>"$rawmaterial->supplier_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
