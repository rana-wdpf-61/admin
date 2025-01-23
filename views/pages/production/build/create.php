<?php
echo Page::title(["title"=>"Create Build"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"build", "text"=>"Manage Build"]);
echo Page::context_open();
echo Form::open(["route"=>"build/save"]);
	echo Form::input(["label"=>"Production Detail","name"=>"production_detail_id","table"=>"production_details"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Build Step","type"=>"text","name"=>"build_step"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);
	echo Form::input(["label"=>"Worker Assigned","type"=>"text","name"=>"worker_assigned"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
	echo Form::input(["label"=>"Materials Used","type"=>"textarea","name"=>"materials_used"]);
	echo Form::input(["label"=>"Notes","type"=>"textarea","name"=>"notes"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
