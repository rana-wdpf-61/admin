<?php
echo Page::title(["title"=>"Create RawMaterial"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"rawmaterial", "text"=>"Manage RawMaterial"]);
echo Page::context_open();
echo Form::open(["route"=>"rawmaterial/save"]);
	echo Form::input(["label"=>"Material Name","type"=>"text","name"=>"material_name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Cost Per Unit","type"=>"text","name"=>"cost_per_unit"]);
	echo Form::input(["label"=>"Supplier Id","type"=>"text","name"=>"supplier_id"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
