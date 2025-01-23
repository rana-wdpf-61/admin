<?php
echo Page::title(["title"=>"Edit Build"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"build", "text"=>"Manage Build"]);
echo Page::context_open();
echo Form::open(["route"=>"build/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$build->id"]);
	echo Form::input(["label"=>"Production Detail","name"=>"production_detail_id","table"=>"production_details","value"=>"$build->production_detail_id"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials","value"=>"$build->material_id"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$build->uom_id"]);
	echo Form::input(["label"=>"Build Step","type"=>"text","name"=>"build_step","value"=>"$build->build_step"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date","value"=>"$build->start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date","value"=>"$build->end_date"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status","value"=>"$build->status_id"]);
	echo Form::input(["label"=>"Worker Assigned","type"=>"text","name"=>"worker_assigned","value"=>"$build->worker_assigned"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty","value"=>"$build->qty"]);
	echo Form::input(["label"=>"Materials Used","type"=>"textarea","name"=>"materials_used","value"=>"$build->materials_used"]);
	echo Form::input(["label"=>"Notes","type"=>"textarea","name"=>"notes","value"=>"$build->notes"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$build->product_id"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost","value"=>"$build->total_cost"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
