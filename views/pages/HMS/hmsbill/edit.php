<?php
echo Page::title(["title"=>"Edit HmsBill"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"hmsbill", "text"=>"Manage HmsBill"]);
echo Page::context_open();
echo Form::open(["route"=>"hmsbill/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$hmsbill->id"]);
	echo Form::input(["label"=>"Patient","name"=>"patient_id","table"=>"patients","value"=>"$hmsbill->patient_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
