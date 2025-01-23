<?php
echo Page::title(["title"=>"Create ProductionDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productiondetail", "text"=>"Manage ProductionDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"productiondetail/save"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Production","name"=>"production_id","table"=>"productions"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date"]);
	echo Form::input(["label"=>"Worker Assigned","type"=>"text","name"=>"worker_assigned"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);
	echo Form::input(["label"=>"Unit Cost","type"=>"text","name"=>"unit_cost"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost"]);
	echo Form::input(["label"=>"Notes","type"=>"text","name"=>"notes"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
