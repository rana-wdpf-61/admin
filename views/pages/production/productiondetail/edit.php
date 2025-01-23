<?php
echo Page::title(["title"=>"Edit ProductionDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productiondetail", "text"=>"Manage ProductionDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"productiondetail/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productiondetail->id"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials","value"=>"$productiondetail->material_id"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$productiondetail->uom_id"]);
	echo Form::input(["label"=>"Production","name"=>"production_id","table"=>"productions","value"=>"$productiondetail->production_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$productiondetail->product_id"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty","value"=>"$productiondetail->qty"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date","value"=>"$productiondetail->start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date","value"=>"$productiondetail->end_date"]);
	echo Form::input(["label"=>"Worker Assigned","type"=>"text","name"=>"worker_assigned","value"=>"$productiondetail->worker_assigned"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status","value"=>"$productiondetail->status_id"]);
	echo Form::input(["label"=>"Unit Cost","type"=>"text","name"=>"unit_cost","value"=>"$productiondetail->unit_cost"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost","value"=>"$productiondetail->total_cost"]);
	echo Form::input(["label"=>"Notes","type"=>"text","name"=>"notes","value"=>"$productiondetail->notes"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
